@extends('admin.layouts.admin')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Hotels</li>
</ol>
<div class="box_general">
    <div class="header_box">
        <h2 class="d-inline-block">Hotels</h2>
        <i class="fa fa-plus ml-3" data-toggle="modal" data-target="#add_new_hotel"></i>
    </div>
    <div class="list_general">
        <ul>
            @if(!count($hotels))
                <p class="w-100 text-center out_content mb-3 mt-3 pb-3">No hotels to view</p>
            @endif

            @foreach($hotels as $hotel)
            <li class="pl-3 mb-4 hotel_element" id="{{ $hotel->id }}">
                <h4>{{ $hotel->name }}</h4>
                <ul class="booking_list">
                    <div class="row">
                        <div class="col-md-6">
                            <li><strong>Stars</strong> {{ $hotel->stars }} Stars</li>
                            <li><strong>Meal Plane</strong>{{ $hotel->meal_plane }}</li>
                            <li><strong>Location</strong>{{ $hotel->location }}</li>
                            <li><strong>Min Days</strong>{{ $hotel->min_days  }} Days</li>
                        </div>
                        <div class="col-md-6">
                            <li><strong>Phone</strong> {{ $hotel->phone ?? 'Not Exist' }}</li>
                            <li><strong>Email Address</strong>{{ $hotel->email ?? 'Not Exist' }}</li>
                            <li><strong>Price</strong>{{ $hotel->price ?? 'Not Exist' }} LE</li>
                        </div>
                    </div>
                </ul>
                <div class="d-flex">
                    <a href="#0" class="btn_1 gray edit_btn" data-toggle="modal" data-target="#client_detail_modal">
                        <i class="fa fa-fw fa-pencil"></i> Edit Hotel
                    </a>

                    <a href="#0" class="btn_1 gray delete_btn ml-2" data-toggle="modal" data-target="#delete_hotel_modal" hotel_id="{{ $hotel->id }}">
                        <i class="fa fa-trash"></i> Delete Hotel
                    </a>
                </div>

                <form class="info" id="{{ $hotel->id }}">
                    <input type="hidden" value="{{ $hotel->stars }}" class="stars" name="stars">
                    <input type="hidden" value="{{ $hotel->name }}" class="name" name="name">
                    <input type="hidden" value="{{ $hotel->phone }}" class="phone" name="phone">
                    <input type="hidden" value="{{ $hotel->location }}" class="location" name="location">
                    <input type="hidden" value="{{ $hotel->meal_plane }}" class="meal_plane" name="meal_plane">
                    <input type="hidden" value="{{ $hotel->email }}" class="email" name="email">
                    <input type="hidden" value="{{ $hotel->id }}" class="id" name="id">
                    <input type="hidden" value="{{ $hotel->price }}" class="price" name="price">
                    <input type="hidden" value="{{ $hotel->description }}" class="description" name="description">
                    <input type="hidden" value="{{ $hotel->min_days }}" class="min_days" name="min_days">
                    <input type="hidden" value="{{ $hotel->main_image }}" class="main_image" name="main_image">
                </form>

            </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- /box_general-->
<!-- <nav aria-label="...">
    <ul class="pagination pagination-sm add_bottom_30">
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#">Next</a>
        </li>
    </ul>
</nav> -->
<!-- Booking/order Modal -->
@include('admin.models')
@endsection

@section('script')
@include('admin.js-blades.js-hotel')
@endsection