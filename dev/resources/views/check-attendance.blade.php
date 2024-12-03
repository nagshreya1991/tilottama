@extends('layouts.master')

@section('title', 'List of Attendees')
@section('custom-styles')
    <style>
        /* Pagination Styling */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            padding: 0;
            list-style: none;
        }

        .pagination .page-item {
            margin: 0 5px;
        }

        .pagination .page-item a,
        .pagination .page-item span {
            display: inline-block;
            padding: 12px 18px;
            font-size: 14px;
            color: #3f6ad8;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .pagination .page-item a:hover {
            background-color: #3f6ad8;
            color: #fff;
            border-color: #3f6ad8;
        }

        /* Styling the previous and next buttons */
        .pagination .page-item:first-child a,
        .pagination .page-item:last-child a {
            padding: 12px 18px;
            font-size: 14px;
            color: #3f6ad8;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .pagination .page-item:first-child a:hover,
        .pagination .page-item:last-child a:hover {
            background-color: #3f6ad8;
            color: #fff;
            border-color: #3f6ad8;
        }

        .pagination .page-item.active a{
            color: #fff;
            background-color: #3f6ad8;
            border-color: #3f6ad8;
            font-weight: bold;
        }

        .pagination .page-item.disabled a{
            color: #ccc;
            background-color: #f9f9f9;
            border-color: #ddd;
            cursor: not-allowed;
        }
        .pagination .page-item.disabled a:hover{
            color: #ccc;
            background-color: #f9f9f9;
            border-color: #ddd;
            cursor: not-allowed;
        }

        /*.pagination{ display: flex; justify-content: center; }*/
        /*.pagination svg{ width: 30px; margin-top: 6px; }*/
        /*.pagination a{padding: 0 8px;}*/
    </style>
@endsection
@section('content')
    <div class="right_body_white_box">
        <h3>List of Attendees</h3>
        <div class="table_section">
            <table class="table">
                <thead>
                <tr>
                    <th>Sl. No.</th>
                    <th>Name</th>
                    <th>Club Name</th>
                    <th class="text_center">10/01/2025</th>
                    <th class="text_center">11/01/2025</th>
                    <th class="text_center">12/01/2025</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($attendees as $index => $attendee)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $attendee->name }}</td>
                        <td>{{ $attendee->club_name }}</td>
                        <td class="text_center">
                            <button class="btn info_btn auto_btn" onclick="openModal('modal-2025-01-10-{{ $attendee->id }}')">
                                Category
                            </button>
                        </td>
                        <td class="text_center">
                            <button class="btn info_btn auto_btn" onclick="openModal('modal-2025-01-11-{{ $attendee->id }}')">
                                Category
                            </button>
                        </td>
                        <td class="text_center">
                            <button class="btn info_btn auto_btn" onclick="openModal('modal-2025-01-12-{{ $attendee->id }}')">
                                Category
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="pagination">
            <!-- Previous page -->
            <div class="page-item {{ $attendees->onFirstPage() ? 'disabled' : '' }}">
                <a href="{{ $attendees->onFirstPage() ? 'javascript:void(0);' : $attendees->previousPageUrl() }}"
                   aria-label="Previous"
                   class="{{ $attendees->onFirstPage() ? 'disabled' : '' }}"
                   onclick="{{ $attendees->onFirstPage() ? 'return false;' : '' }}">
                    Previous
                </a>
            </div>

            <!-- Page numbers -->
            @for($i = 1; $i <= $attendees->lastPage(); $i++)
                <div class="page-item {{ $attendees->currentPage() == $i ? 'active' : '' }}">
                    <a href="{{ $attendees->url($i) }}">{{ $i }}</a>
                </div>
            @endfor

            <!-- Next page -->
            <div class="page-item {{ $attendees->hasMorePages() ? '' : 'disabled' }}">
                <a href="{{ $attendees->hasMorePages() ? $attendees->nextPageUrl() : 'javascript:void(0);' }}"
                   aria-label="Next"
                   class="{{ $attendees->hasMorePages() ? '' : 'disabled' }}"
                   onclick="{{ $attendees->hasMorePages() ? '' : 'return false;' }}">
                    Next
                </a>
            </div>

        </div>
    </div>

    @foreach ($attendees as $attendee)
        {{-- Modal for 2025-01-10 --}}
        <div id="modal-2025-01-10-{{ $attendee->id }}" class="modal" style="display: none;">
            <div class="modal-content">
            <span class="close" onclick="closeModal('modal-2025-01-10-{{ $attendee->id }}')">
                <img src="{{ asset('public/images/close-icon.png') }}" alt="Close"/>
            </span>
                <div class="table_section">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text_center">Entry</th>
                            <th class="text_center">Dinner</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($attendee->flags as $flag)
                            @if($flag->event_date == '2025-01-10')
                                <tr>
                                    <td class="text_center">
                                        @if($flag->entry)
                                            <img src="{{ asset('public/images/checkmark-icon.png') }}" alt="Yes" class="img_icon"/>
                                        @else
                                            <img src="{{ asset('public/images/cross-icon.png') }}" alt="No" class="img_cross_icon"/>
                                        @endif
                                    </td>
                                    <td class="text_center">
                                        @if($flag->dinner)
                                            <img src="{{ asset('public/images/checkmark-icon.png') }}" alt="Yes" class="img_icon"/>
                                        @else
                                            <img src="{{ asset('public/images/cross-icon.png') }}" alt="No" class="img_cross_icon"/>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Modal for 2025-01-11 --}}
        <div id="modal-2025-01-11-{{ $attendee->id }}" class="modal" style="display: none;">
            <div class="modal-content">
            <span class="close" onclick="closeModal('modal-2025-01-11-{{ $attendee->id }}')">
                <img src="{{ asset('public/images/close-icon.png') }}" alt="Close"/>
            </span>
                <div class="table_section">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text_center">Breakfast</th>
                            <th class="text_center">Lottery(11AM - 12PM)</th>
                            <th class="text_center">Lunch</th>
                            <th class="text_center">Lottery(5PM - 6PM)</th>
                            <th class="text_center">Poolside Entry</th>
                            <th class="text_center">Dinner</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($attendee->flags as $flag)
                            @if($flag->event_date == '2025-01-11')
                                <tr>
                                    <td class="text_center">
                                        @if($flag->breakfast)
                                            <img src="{{ asset('public/images/checkmark-icon.png') }}" alt="Yes" class="img_icon"/>
                                        @else
                                            <img src="{{ asset('public/images/cross-icon.png') }}" alt="No" class="img_cross_icon"/>
                                        @endif
                                    </td>
                                    <td class="text_center">
                                        @if($flag->lottery_11_12)
                                            <img src="{{ asset('public/images/checkmark-icon.png') }}" alt="Yes" class="img_icon"/>
                                        @else
                                            <img src="{{ asset('public/images/cross-icon.png') }}" alt="No" class="img_cross_icon"/>
                                        @endif
                                    </td>
                                    <td class="text_center">
                                        @if($flag->lunch)
                                            <img src="{{ asset('public/images/checkmark-icon.png') }}" alt="Yes" class="img_icon"/>
                                        @else
                                            <img src="{{ asset('public/images/cross-icon.png') }}" alt="No" class="img_cross_icon"/>
                                        @endif
                                    </td>
                                    <td class="text_center">
                                        @if($flag->lottery_5_6)
                                            <img src="{{ asset('public/images/checkmark-icon.png') }}" alt="Yes" class="img_icon"/>
                                        @else
                                            <img src="{{ asset('public/images/cross-icon.png') }}" alt="No" class="img_cross_icon"/>
                                        @endif
                                    </td>
                                    <td class="text_center">
                                        @if($flag->poolside_entry)
                                            <img src="{{ asset('public/images/checkmark-icon.png') }}" alt="Yes" class="img_icon"/>
                                        @else
                                            <img src="{{ asset('public/images/cross-icon.png') }}" alt="No" class="img_cross_icon"/>
                                        @endif
                                    </td>
                                    <td class="text_center">
                                        @if($flag->dinner)
                                            <img src="{{ asset('public/images/checkmark-icon.png') }}" alt="Yes" class="img_icon"/>
                                        @else
                                            <img src="{{ asset('public/images/cross-icon.png') }}" alt="No" class="img_cross_icon"/>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Modal for 2025-01-12 --}}
        <div id="modal-2025-01-12-{{ $attendee->id }}" class="modal" style="display: none;">
            <div class="modal-content">
            <span class="close" onclick="closeModal('modal-2025-01-12-{{ $attendee->id }}')">
                <img src="{{ asset('public/images/close-icon.png') }}" alt="Close"/>
            </span>
                <div class="table_section">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text_center">Lottery 11-12</th>
                            <th class="text_center">Gift</th>
                            <th class="text_center">Lunch</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($attendee->flags as $flag)
                            @if($flag->event_date == '2025-01-12')
                                <tr>

                                    <td class="text_center">
                                        @if($flag->lottery_11_12)
                                            <img src="{{ asset('public/images/checkmark-icon.png') }}" alt="Yes" class="img_icon"/>
                                        @else
                                            <img src="{{ asset('public/images/cross-icon.png') }}" alt="No" class="img_cross_icon"/>
                                        @endif
                                    </td>
                                    <td class="text_center">
                                        @if($flag->gift)
                                            <img src="{{ asset('public/images/checkmark-icon.png') }}" alt="Yes" class="img_icon"/>
                                        @else
                                            <img src="{{ asset('public/images/cross-icon.png') }}" alt="No" class="img_cross_icon"/>
                                        @endif
                                    </td>
                                    <td class="text_center">
                                        @if($flag->lunch)
                                            <img src="{{ asset('public/images/checkmark-icon.png') }}" alt="Yes" class="img_icon"/>
                                        @else
                                            <img src="{{ asset('public/images/cross-icon.png') }}" alt="No" class="img_cross_icon"/>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endforeach
@endsection

@push('scripts')
    <script>

        function openModal(id) {
            document.getElementById(id).style.cssText = "display: flex; opacity: 1;transform: scale(1);";
        }


        function closeModal(id) {
            document.getElementById(id).style.display = "none";
        }

        // $(document).ready(function () {
        //
        //
        //     $('#openModal1').click(function () {
        //         openModal('#modal1');
        //     });
        //     $('#openModal2').click(function () {
        //         openModal('#modal2');
        //     });
        //     $('#openModal3').click(function () {
        //         openModal('#modal3');
        //     });
        //
        //     $('.close').click(function () {
        //         closeModal('.modal');
        //     });
        //
        //     $(window).click(function (e) {
        //         if ($(e.target).hasClass('modal')) closeModal('.modal');
        //     });
        //
        //     $('#toggleButton').click(function () {
        //         $('.left_sidebar').toggleClass('sidebar_visible');
        //     });
        // });
    </script>
@endpush
