@extends('admin.layouts.admin')


@section('title')
Users
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
    <li class="breadcrumb-item active">Users</li>
</ol>
<div class="box_general">
    <div class="header_box d-flex align-items-center">
        <h2 class="d-inline-block">Users</h2>
        <ul class="ml-auto nav">
            <li class="nav-item">
                <form class="d-flex justify-content-center align-items-center">
                    <div class="loader d-none" data-load="search_hotel_loader">
                        <span></span>
                    </div>
                    <input class="form-control search_users loader-key" placeholder="Search User" related_to="user" name="name" loader_name="search_user_loader">
                </form>
            </li>
        </ul>
    </div>
    <div class="list_general postion-relative">
        <div class="overlay w-100 h-100 position-absolute"></div>
        <ul class="user_holder">
            @if(!count($users))
                <p class="w-100 text-center out_content mb-3 mt-3 pb-3">No users to view</p>
            @endif

            @foreach($users as $user)
            <li class="pl-3 mb-4 users_element" id="{{ $user->id }}">
                <ul class="booking_list">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="@if($hotel->preview){{ asset('images/small/'.$hotel->preview->name) }}@else {{ asset('img/no-image.jpg') }} @endif" class="w-100 preview">
                        </div>
                        <div class="col-md-4">
                            <li><strong>Name</strong> {{ $user->name }} </li>
                            <li><strong>Phone</strong> {{ $user->phone ?? 'Not Exist' }}</li>
                            <li><strong>Email Address</strong>{{ $user->email ?? 'Not Exist' }}</li>
                        </div>
                    </div>
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="pagination" container_class=".list_general" action="empty_fill" modal="user" load="" url="{{ route('user.filter') }}"></div>
<input class="page-indicator" value="1" type="hidden">
@include('admin.models')
@endsection

@section('script')
<script>
$('.summernote').summernote();
</script>
<script src="{{ asset('vendor/dropzone.min.js') }}"></script>
<script src="{{ asset('js/admin/admin_image_upload.js') }}"></script>
@include('admin.js-blades.js-hotel')
@endsection