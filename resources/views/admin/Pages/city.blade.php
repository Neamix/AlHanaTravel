@extends('admin.layouts.admin')


@section('title')
Citites
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
    <li class="breadcrumb-item active">Citites</li>
</ol>
<div class="box_general">
    <div class="header_box">
        <h2 class="d-inline-block">Cities</h2>
        <i class="fa fa-plus ml-3" data-toggle="modal" data-target="#add_new_city"></i>
    </div>
    <div class="list_general">
            @if(!count($cities))
                <p class="w-100 text-center out_content mb-3 mt-3 pb-3">No cities to view</p>
            @endif
           <ul>
           @foreach($cities as $city)
            <li class="pl-3 mb-4 city_element" id="{{ $city->id }}">
                <ul class="booking_list">
                    <div class="row">
                        <div class="col-md-6">
                            <li><strong>id</strong> #{{$city->id}}</li>
                            <li><strong>Name</strong> {{$city->name}}</li>
                        </div>
                    </div>
                </ul>
                <div class="d-flex">
                    <a href="#0" class="btn_1 gray edit_btn" data-toggle="modal" data-target="#edit_city" city_id="{{ $city->id }}">
                        <i class="fa fa-fw fa-pencil"></i> Edit city
                    </a>

                    <a href="#0" class="btn_1 gray delete_btn ml-2" data-toggle="modal" data-target="#delete_city_modal" city_id="{{ $city->id }}">
                        <i class="fa fa-trash"></i> Delete city
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
@include('admin.js-blades.js-city')
@endsection