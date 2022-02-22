@extends('layouts.app')

@section('content')
<div class="container" dir="rtl">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header w-100 d-flex justify-content-center pt-4 pb-4 border-bottom-none">
                    <img src="img/logo_sticky.svg" width="150" height="36" alt="" class="logo_sticky">
                </div>

                <div class="card-body">
                    <a href="{{ route('socialite',['drive' => 'google']) }}">
                        <button class="w-100 d-flex btn-login text-left justify-content-end">
                            <p class="w-100 text-center"> التسجيل  بواسطه جوجل</p>
                            <i class="fa fa-google" aria-hidden="true"></i>
                        </button>
                    </a>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">

                            <div class="col-md-12">
                                <label for="name" class="col-md-4 col-form-label text-md-end"> اسم المستخدم</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-12">
                                <label for="email" class="col-md-4 col-form-label text-md-end">البريد الاليكتروني</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">

                            <div class="col-md-12">
                                <label for="phone" class="col-md-4 col-form-label text-md-end"> الهاتف المحمول</label>
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('email') }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">                                        
                                تسجيل حساب جديد
                            </button>
                            <div class="w-100">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link text-small d-block text-right" href="{{ route('login') }}">
                                لديك حساب بالفعل ؟
                                </a>
                            @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
