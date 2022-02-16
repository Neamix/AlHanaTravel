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
                <p class="w-100 text-center out_content mb-3 mt-3 pb-3 empty_text">No cities to view</p>
            @endif
           <ul class="city_list">
           @foreach($cities as $city)
            <li class="pl-3 mb-4 city_element" id="{{ $city->id }}">
                <ul class="booking_list">
                    <div class="row">
                        <div class="col-md-2">
                            <img class="preview" src="@if($city->image) {{ asset('/images/small/'.$city->image->name) }} @else {{ asset('img/no-image.jpg') }} @endif">
                        </div>
                        <div class="col-md-6">
                            <li><strong>id</strong> #{{$city->id}}</li>
                            <li><strong>Name</strong> {{$city->name}}</li>
                        </div>
                    </div>
                </ul>
                <div class="d-flex">
                    <a href="#0" class="btn_1 gray edit_btn" data-toggle="modal" data-target="#edit_city" modal="city" modal_class=".edit_city" modal_id="{{ $city->id }}">
                        <i class="fa fa-fw fa-pencil"></i> Edit city
                    </a>

                    <a href="#0" class="btn_1 gray delete_btn ml-2" data-toggle="modal" data-target="#delete_modal" modal_id="{{ $city->id }}" modal="city">
                        <i class="fa fa-trash"></i> Delete Hotel
                    </a>
                </div>
            </li>
            @endforeach
           </ul>
    </div>
</div>
<div class="pagination" container_class=".city_list" action="empty_fill" modal="city" load="loadAdminCity" url="{{ route('city.filter') }}"></div>
<input class="page-indicator" value="1" type="hidden">
@include('admin.models')
@endsection

@section('script')
@include('admin.js-blades.js-city')
@endsection