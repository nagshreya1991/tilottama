<?php

namespace App\Imports;

use App\Models\Attendee;
use App\Models\AttendeeFlag;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AttendeesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Create the attendee record
        $attendee = Attendee::create([
            'name' => $row['name'], // Match column names from the header row
            'club_name' => $row['club_name'],
        ]);

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

        // Generate the QR Code content
        $qrCodeContent = route('attendees.scan', ['id' => $attendee->id]);

        // Define the path for storing the QR Code
        $qrCodePath = 'qrcodes/' . $attendee->id . '.png';

        // Generate and save the QR Code as a PNG
        QrCode::format('png')->size(300)->generate($qrCodeContent, public_path($qrCodePath));

        // Update the attendee record with the QR Code path
        $attendee->update(['qr_code' => $qrCodePath]);

        return $attendee;
    }
}


