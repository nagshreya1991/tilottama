<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AttendeeController;

Route::get('/', [AttendeeController::class, 'index'])->name('attendees.index');
Route::get('/attendees/create', [AttendeeController::class, 'create'])->name('attendees.create');
Route::post('/attendees', [AttendeeController::class, 'store'])->name('attendees.store');
Route::get('/attendees/demo', [AttendeeController::class, 'downloadDemoFile'])->name('attendees.download.demo');
Route::get('/attendees/attendance', [AttendeeController::class, 'checkAttendance'])->name('attendees.attendance');
Route::post('/attendees/bulk-upload', [AttendeeController::class, 'bulkUpload'])->name('attendees.bulkUpload');
Route::get('/attendees/scan/{id}', [AttendeeController::class, 'scan'])->name('attendees.scan');
Route::get('/download-all-pdfs', [AttendeeController::class, 'downloadAllPdfs'])->name('attendees.downloadAllPdfs');

