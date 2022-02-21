@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-right">مرحبا بك في الهنا ترفل  </div>

                <div class="card-body">
                    <p>
                    شكرا لاستخدامك خدمة الهنا ترافيل للرحلات لاستكمال حسابك برجاء اذهب لبريدك الالكتروني واتبع التعليمات المرسلة اليك
                    </p>
                    <form class="d-flex w-100 justify-content-end " method="POST" action="{{ route('verify.email') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-right text-right"> اعد ارسال التعليمات </button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
