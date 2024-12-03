<div class="left_sidebar">
    <ul class="left_sidebar_menu">
        <li class="{{ request()->is('attendees/create') ? 'active' : '' }}"><a href="{{ route('attendees.create') }}">Add Attendee</a></li>
        <li class="{{ request()->is('attendees/attendance') ? 'active' : '' }}"><a href="{{ route('attendees.attendance') }}">Check Attendance</a></li>
    </ul>
</div>
