<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Flag;
use App\Models\AttendeeFlag;
use Illuminate\Http\Request;
use App\Imports\AttendeesImport;
use App\Exports\DemoExport;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use ZipArchive;


class AttendeeController extends Controller
{

    public function create()
    {
        return view('add-attendee');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'club_name' => 'required|string|max:255',
            //'email' => 'required|email|unique:attendees,email',
        ]);

        $attendee = Attendee::create($request->only('name', 'club_name'));

        // Define event dates and their flags
        $eventDays = [
            '2025-01-10' => ['entry' => false, 'dinner' => false],
            '2025-01-11' => [
                'breakfast' => false,
                'lottery_11_12' => false,
                'lunch' => false,
                'lottery_5_6' => false,
                'poolside_entry' => false,
                'dinner' => false,
            ],
            '2025-01-12' => [
                'lottery_11_12' => false,
                'gift' => false,
                'lunch' => false,
            ],
        ];

        foreach ($eventDays as $date => $flags) {
            AttendeeFlag::create([
                    'attendee_id' => $attendee->id,
                    'event_date' => $date,
                ] + $flags);
        }

        // Generate QR Code
        $qrCodeContent = route('attendees.scan', ['id' => $attendee->id]);
        $qrCodePath = 'qrcodes/' . $attendee->id . '.png';
        QrCode::format('png')->size(300)->generate($qrCodeContent, public_path($qrCodePath));

        // Save QR Code Path
        $attendee->update(['qr_code' => $qrCodePath]);
         // Generate PDF for the attendee
         $pdf = Pdf::loadView('barcode', compact('attendee'));
    
        // // Save the PDF to the public/qrcodes/pdf directory
         $pdfPath = public_path('qrcodes/pdf/' . $attendee->id . '.pdf');
        // \Log::info("PDF Path: " . $pdfPath);
         $pdf->save($pdfPath);


        return redirect()->back()->with('success', 'Attendee added successfully!');
    }

    public function index()
    {
        $attendees = Attendee::paginate(30);

        return view('attendees', compact('attendees'));
    }

    public function checkAttendance()
    {
        $attendees = Attendee::with(['flags'])->paginate(30);

        $eventDays = [
            '2025-01-10' => ['entry', 'dinner'],
            '2025-01-11' => [
                'breakfast', 'lottery_11_12', 'lunch',
                'lottery_5_6', 'poolside_entry', 'dinner',
            ],
            '2025-01-12' => ['lottery_11_12', 'gift', 'lunch'],
        ];

        return view('check-attendance', compact('attendees', 'eventDays'));
    }

    // Handle bulk upload
    public function bulkUpload(Request $request)
    {
        $request->validate([
            'attendee_file' => 'required|file|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new AttendeesImport, $request->file('attendee_file'));

        return redirect()->back()->with('success', 'Attendees uploaded successfully!');
    }

    public function downloadDemoFile()
    {
        $demoData = [
            ['Name', 'Club Name'], // Headers
            ['John Doe', 'Chess Club'],
            ['Jane Smith', 'Music Club'],
        ];

        return Excel::download(new DemoExport($demoData), 'attendee_demo.xlsx');
    }

    public function scan($id)
    {
        $date = '2025-01-10';
        $flag = 'dinner';
        $attendee = Attendee::findOrFail($id);

        // Define event dates and their flags
        $eventDays = [
            '2025-01-10' => ['entry', 'dinner'],
            '2025-01-11' => [
                'breakfast', 'lottery_11_12', 'lunch',
                'lottery_5_6', 'poolside_entry', 'dinner',
            ],
            '2025-01-12' => ['lottery_11_12', 'gift', 'lunch'],
        ];

        // Check if the date exists in the predefined event days
        if (!array_key_exists($date, $eventDays)) {
            return response()->json([
                'success' => false,
                'message' => "No events scheduled for the provided date: {$date}.",
            ], 404); // Not Found
        }

        // Validate the flag for the given date
        if (!in_array($flag, $eventDays[$date])) {
            return response()->json([
                'success' => false,
                'message' => "Invalid event '{$flag}' for the event date: {$date}.",
            ], 400); // Bad Request
        }

        // Fetch or initialize the flags for the attendee on the given date
        $eventFlags = AttendeeFlag::firstOrCreate(
            ['attendee_id' => $id, 'event_date' => $date],
            array_fill_keys($eventDays[$date], false)
        );


        // Check if the flag has already been scanned
        if ($eventFlags->{$flag}) {
            return response()->json([
                'success' => false,
                'message' => "The QR code for attendee {$attendee->name} has already been scanned for the event '{$flag}' on {$date}.",
            ]);
        }

        // Update the flag to indicate it has been scanned
        $eventFlags->update([
            $flag => true,
        ]);

        return response()->json([
            'success' => true,
            'message' => "The QR code for attendee {$attendee->name} has been successfully scanned for the event '{$flag}' on {$date}.",
            'updated_flags' => $eventFlags,
        ]);
    }


    public function downloadAllPdfs()
    {
        // Create a zip file
        $zip = new ZipArchive;
        $zipFilePath = public_path('qrcodes/pdf/all_attendees.zip');
    
        // Open the zip file for writing
        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            // Fetch all attendees
            $attendees = Attendee::all();
    
            if ($attendees->isEmpty()) {
                \Log::warning('No attendees found.');
            }
    
            // Loop through each attendee and add their PDF to the zip
            foreach ($attendees as $attendee) {
              
    
                // Render the view and generate the PDF
                $pdf = Pdf::loadView('barcode', compact('attendee'));
                //return view('barcode', compact('attendee', 'fontPath'));
                // Check if PDF content is generated
                $pdfContent = $pdf->output();
                if ($pdfContent === false) {
                    \Log::error('Failed to generate PDF for attendee ID: ' . $attendee->id);
                }
    
                // Add the PDF to the zip file
                $pdfFilePath = 'qrcodes/pdf/' . $attendee->id . '.pdf';
                $zip->addFromString($pdfFilePath, $pdfContent);
                \Log::info("PDF Path1: " . $pdfFilePath);
            }
    
            // Close the zip file
            $zip->close();
          
            // Return the zip file for download
            return response()->download($zipFilePath);
        } else {
            return redirect()->back()->with('error', 'Failed to create the zip file.');
        }
    }



}
