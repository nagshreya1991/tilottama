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
    <div class="right_body_header" style="display: flex; flex-direction: row-reverse; margin-bottom: 10px;">
            <a class="btn info_btn auto_btn" href="{{ route('attendees.downloadAllPdfs') }}">Attendee List</a>
        </div>
        <h3>List of Attendees</h3>

        <div class="table_section">

            <table class="table">

                <thead>

                <tr>

                    <th>Sl. No.</th>

                    <th>Name</th>

                    <th>Club Name</th>

                    <th>QR</th>

                </tr>

                </thead>

                <tbody>

                @foreach ($attendees as $index => $attendee)

                    <tr>

                        <td>{{ $attendees->firstItem() + $index }}</td> <!-- Adjust for pagination -->

                        <td>{{ $attendee->name }}</td>

                        <td>{{ $attendee->club_name }}</td>

                        <td>

                            <a href="javascript:void(0);" onclick="openModal('{{ asset('public/'.$attendee->qr_code) }}')">

                                <img src="{{ asset('public/'.$attendee->qr_code) }}" width="32" />

                            </a>

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



    <!-- Modal -->

    <div id="qrModal" class="modal" style="display: none;">

        <div class="modal-content" style="width: 450px;">

            <span class="close" onclick="closeModal()">

                <img src="{{ asset('public/images/close-icon.png') }}" alt="Close"/>

            </span>

            <div class="" style="display:flex; flex-direction: column;">

                <img id="qrModalImage" src="" width="" />

            </div>

        </div>

    </div>

@endsection



@push('scripts')

    <script>

        function openModal(qrImage) {

            const modal = document.getElementById('qrModal');

            const modalImage = document.getElementById('qrModalImage');



            modalImage.src = qrImage;

            modal.style.display = 'flex';



            // Add animation

            modal.style.opacity = 0;

            let opacity = 0;

            const fadeIn = setInterval(() => {

                if (opacity >= 1) {

                    clearInterval(fadeIn);

                }

                opacity += 0.1;

                modal.style.opacity = opacity;

            }, 50);

        }



        function closeModal() {

            const modal = document.getElementById('qrModal');



            // Add fade-out animation

            let opacity = 1;

            const fadeOut = setInterval(() => {

                if (opacity <= 0) {

                    clearInterval(fadeOut);

                    modal.style.display = 'none';

                }

                opacity -= 0.1;

                modal.style.opacity = opacity;

            }, 50);

        }

    </script>

@endpush

