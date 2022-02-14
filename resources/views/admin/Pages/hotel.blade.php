@extends('admin.layouts.admin')


@section('title')
Hotels
@endsection

@section('css')
<link href="{{ asset('vendor/dropzone.css') }}" rel="stylesheet">
@endsection

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
                <ul class="booking_list">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="@if($hotel->previewImage()->count()){{ asset('images/small/'.$hotel->previewImage[0]->name) }}@else {{ asset('img/no-image.jpg') }} @endif" class="w-100 preview">
                        </div>
                        <div class="col-md-4">
                            <li><strong>Name</strong> {{ $hotel->name }} </li>
                            <li><strong>Stars</strong> {{ $hotel->stars }} Stars</li>
                            <li><strong>Meal Plane</strong>{{ $hotel->meal_plane }}</li>
                            <li><strong>Location</strong>{{ $hotel->location }}</li>
                            <li><strong>Min Days</strong>{{ $hotel->min_days  }} Days</li>
                        </div>
                        <div class="col-md-5">
                            <li><strong>Phone</strong> {{ $hotel->phone ?? 'Not Exist' }}</li>
                            <li><strong>Email Address</strong>{{ $hotel->email ?? 'Not Exist' }}</li>
                        </div>
                    </div>
                </ul>
                <div class="d-flex">
                    <a href="#0" class="btn_1 gray edit_btn" data-toggle="modal" data-target="#client_detail_modal" modal_class=".edit_form" modal="hotel" modal_id="{{ $hotel->id }}">
                        <i class="fa fa-fw fa-pencil"></i> Edit Hotel
                    </a>

                    <a href="#0" class="btn_1 gray edit_btn ml-2 loader_key" data-toggle="modal" data-target="#gallary_get" modal_class=".gallary_show" modal="hotel" modal_id="{{ $hotel->id }}" loader_name="hotel_gallary">
                        <i class="fa fa-th" aria-hidden="true"></i>
                        Show Gallary
                    </a>


                    <a href="#0" class="btn_1 gray gallary_btn edit_btn ml-2" data-toggle="modal" data-target="#image_upload" modal_class=".gallary_modal" modal="hotel" modal_id="{{ $hotel->id }}">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                        Gallary
                    </a>

                    <a href="#0" class="btn_1 gray delete_btn ml-2" data-toggle="modal" data-target="#delete_modal" modal_id="{{ $hotel->id }}" modal="hotel">
                        <i class="fa fa-trash"></i> Delete Hotel
                    </a>
                </div>
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
<script src="{{ asset('vendor/dropzone.min.js') }}"></script>
<script src="{{ asset('js/admin_image_upload.js') }}"></script>
@include('admin.js-blades.js-hotel')
@endsection