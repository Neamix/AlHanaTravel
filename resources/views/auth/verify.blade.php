@extends('layouts.app')

@section('content')
<div class="container" dir="rtl">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">مرحبا بك في الهنا ترفل  </div>

                <div class="card-body w-100">
                    <p>
                    شكرا لاستخدامك خدمة الهنا ترافيل للرحلات لاستكمال حسابك برجاء اذهب لبريدك الالكتروني واتبع التعليمات المرسلة اليك
                    </p>
                    <div class="d-flex">
                        <form class="justify-content-end " method="POST" action="{{ route('verify.email') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-right text-right"> اعد ارسال التعليمات </button>.
                        </form>
                        <form class=" justify-content-end " method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-right text-right"> تسجيل خروج </button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
