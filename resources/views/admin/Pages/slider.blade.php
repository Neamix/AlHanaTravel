@extends('admin.layouts.admin')


@section('title')
Slider
@endsection

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Slider</li>
</ol>
<div class="box_general">
    <div class="header_box">
        <h2 class="d-inline-block">Slider</h2>
        <i class="fa fa-plus ml-3" data-toggle="modal" data-target="#add_new_slider"></i>
    </div>
    <div class="list_general">
            @if(!count($sliders))
                <p class="w-100 text-center out_content mb-3 mt-3 pb-3 empty_text">No sliders to view</p>
            @endif
           <ul class="slider_list">
           @foreach($sliders as $slider)
            <li class="pl-3 mb-4 slider_element" id="{{ $slider->id }}">
                <ul class="booking_list">
                    <div class="row">
                        <div class="col-md-2">
                            <img class="preview" src="@if($slider->image) {{ asset('/images/small/'.$slider->image->name) }} @else {{ asset('img/no-image.jpg') }} @endif">
                        </div>
                        <div class="col-md-6">
                            <li><strong>id</strong> #{{$slider->id}}</li>
                            <li><strong>Text</strong> {{ substr(strip_tags($slider->text),0,100) }}</li>
                            <li><strong>Title</strong> {{$slider->title}}</li>
                        </div>
                    </div>
                </ul>
                <div class="d-flex">
                    <a href="#0" class="btn_1 gray edit_btn" data-toggle="modal" data-target="#edit_slider" modal="slider" modal_class=".edit_slider" modal_id="{{ $slider->id }}">
                        <i class="fa fa-fw fa-pencil"></i> Edit slider
                    </a>

                    <a href="#0" class="btn_1 gray delete_btn ml-2" data-toggle="modal" data-target="#delete_modal" modal_id="{{ $slider->id }}" modal="slider">
                        <i class="fa fa-trash"></i> Delete slider
                    </a>
                </div>
            </li>
            @endforeach
           </ul>
    </div>
</div>
<div class="pagination" container_class=".slider_list" action="empty_fill" modal="slider" load="loadAdminSlider" url="{{ route('slider.filter') }}"></div>
<input class="page-indicator" value="1" type="hidden">
@include('admin.models')
@endsection

@section('script')
<script>
    console.log('summernote');
   $('.summernote').summernote({
        toolbar: [],
   });
</script>
@include('admin.js-blades.js-slider')
@endsection