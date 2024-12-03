<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    @yield('custom-styles')
</head>
<body>
@include('layouts.header')

<div class="row dashboad_body full_height">
    @include('layouts.sidebar') <!-- Sidebar -->
    <div class="right_body">
        @yield('content') <!-- Main Content -->
    </div>
</div>

@include('layouts.footer')

<script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"
></script>
@stack('scripts') <!-- Additional Scripts -->
</body>
</html>
