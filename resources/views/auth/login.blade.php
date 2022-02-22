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
                            <p class="w-100 text-center">تسجيل الدخول بواسطه جوجل</p>
                            <i class="fa fa-google" aria-hidden="true"></i>
                        </button>
                    </a>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="email" class="col-md-4 col-form-label text-md-end">البريد الاليكتروني</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="password" class="col-md-4 col-form-label text-md-end">كلمة السر</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 pl-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label pr-2" for="remember">
                                        تذكرني
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">                                        
                                    تسجيل الدخول
                                </button>
                                <div class="w-100">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-small d-block text-right" href="{{ route('password.request') }}">
                                        نسيت كلمة المرور؟
                                    </a>
                                    <a class="btn btn-link text-small d-block text-right" href="{{ route('register') }}">
                                        انشاء حساب جديد؟
                                    </a>
                                @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
