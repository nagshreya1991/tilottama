@extends('layouts.master')

@section('title', 'Add Attendee')

@section('content')
    <div class="right_body_white_box">
        <div class="right_body_header" style="display: flex; flex-direction: row-reverse; margin-bottom: 10px;">
            <a class="btn info_btn auto_btn" href="{{ route('attendees.index') }}">Attendee List</a>
        </div>
        <!-- Display Success or Warning Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif

        <!-- Bulk Upload Section -->
        <h3>Bulk Upload Attendees</h3>
        <form action="{{ route('attendees.bulkUpload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <ul class="upload_form">
                <li>
                    <div class="upload_file_box">
                        <input type="file" name="attendee_file" class="upload_input_file" required />
                        <input type="text" class="form_control" placeholder="Upload File" readonly />
                    </div>
                    <button type="submit" class="btn info_btn auto_btn">Upload</button>
                </li>
            </ul>
        </form>
        <span class="info">Here is the link to download the demo Excel file:<a href="{{ route('attendees.download.demo') }}">Demo Example.xlsx</a></span>
    

        <!-- Add Individual Attendee Section -->
        <h3>Add Individual Attendee</h3>
        <form action="{{ route('attendees.store') }}" method="POST">
            @csrf
            <ul class="add_individual_form">
                <li>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form_control" required />
                </li>
                <li>
                    <label for="club_name">Club Name</label>
                    <input type="text" id="club_name" name="club_name" class="form_control" required />
                </li>
                <li>
                    <button type="submit" class="btn info_btn auto_btn">Add</button>
                </li>
            </ul>
        </form>

    </div>
@endsection
