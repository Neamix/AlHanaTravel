@extends('admin.layouts.admin')


@section('title')
Citites
@endsection

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Booking</li>
</ol>
<div class="box_general">
    <div class="header_box">
        <h2 class="d-inline-block">Booking</h2>
    </div>
    <div class="list_general">
        @if(!count($bookings))
        <p class="w-100 text-center out_content mb-3 mt-3 pb-3 empty_text">No booking to view</p>
        @endif
        <ul class="booking_list_container">
            @foreach($bookings as $booking)
            <li class="pl-5 booking" id="booking_{{$booking->id}}">
                <h4>{{ $booking->hotel->name }}<i class="
                @if($booking->status == 'pending')
                pending
                @elseif($booking->status == 'approve')
                approved
                @else
                cancel
                @endif
                ml-2 mr-2">{{ $booking->status }}</i></h4>
                <ul class="booking_list">
                    <li><strong>Start date</strong> {{ date('d M  y',strtotime($booking->start_date)) }}</li>
                    <li><strong>End date</strong> {{ date('d M  y',strtotime($booking->end_date)) }}</li>
                    <li><strong>Booking details</strong> People</li>
                    <li><strong>Booking details</strong> {{ $booking->price }} LE</li>
                    <li><strong>Client</strong>{{ $booking->user->name }}</li>
                    <li><strong>Client Contacts</strong> <a>{{ $booking->user->phone }}</a> - <a
                            href="mailto:{{ $booking->user->email }}">{{ $booking->user->email }}</a></li>
                </ul>
                <p> <a href="#0" class="btn_1 gray edit_btn" data-toggle="modal" data-target="#edit_booking"
                        modal_class=".edit_booking" modal="book" modal_id="{{ $booking->id }}">
                        <i class="fa fa-fw fa-pencil"></i> Edit Booking</a></p>
                <ul class="buttons">
                    @if(request()->get('status') == 'pending')
                    <li><a href="#0" class="btn_1 gray approve action_btn" action="approve"
                            booking_id="{{ $booking->id }}"><i class="fa fa-fw fa-check-circle-o"></i> Approve</a>
                    @endif
                    @if(request()->get('status') == 'approve')
                    <li><a href="#0" class="btn_1 gray approve action_btn" action="pending"
                            booking_id="{{ $booking->id }}"><i class="fa fa-fw fa-check-circle-o"></i> Pending</a>
                    @endif
                    </li>
                    @if(request()->get('status') !== 'exempted')
                    <li><a href="#0" class="btn_1 gray delete action_btn" action="exempted"
                            booking_id="{{ $booking->id }}"><i class="fa fa-fw fa-times-circle-o"></i> Cancel</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="pagination" container_class=".booking_list_container" action="empty_fill" modal="booking"
    load="loadAdminBooking" url="{{ route('booking.filter') }}"></div>
<input class="page-indicator" value="1" type="hidden">
@include('admin.models')
@endsection

@section('script')
@include('admin.js-blades.js-booking')
@endsection