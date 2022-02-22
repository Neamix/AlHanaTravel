@extends('front.layouts.app')

@section('content')
<main>
    <section class="hero_in tours">
        <div class="wrapper">
            <div class="container mb-3">
                <h1 class="fadeInUp"><span></span>الصفحة الشخصية</h1>
            </div>
        </div>
    </section>
    <!--/hero_in-->

    <div class="container margin_60_35">
        
    <div class="wrapper-grid">
        <Div class="card">
            <div class="card-header">
                <h2>بيناتك الشخصية</h2>
            </div>
            <div class="card-body">
                <form class="personal_form" id="personal_form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name" class="mb-2">اسم المستخدم</label>
                                <input type="text" name="name" placeholder="اسم المستخدم" class="form-control" id="name" value="{{ Auth::user()->name }}" name="name">
                                <p class="error error_name"></p>
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="mb-2">ايميل المستخدم</label>
                                <input type="email" placeholder="ايميل المستخدم " class="form-control" value="{{ Auth::user()->email }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="mb-2">تاريخ الميلاد</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="date" value="{{Auth::user()->birthday}}" class="form-control" name="birthday">
                                <p class="error error_birthday"></p>
                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="number" value="{{Auth::user()->phone}}" class="form-control" name="phone">
                                <p class="error error_phone"></p>
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name" class="mb-2">المدينة</label>
                                <input type="text" value="{{Auth::user()->city}}" class="form-control" placeholder="المدينة التي تسكن بها" name="city">
                                <p class="error error_city"></p>
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="mb-2">الشارع</label>
                                <input type="text" value="{{Auth::user()->street}}" class="form-control" placeholder="الشارع الذي تسكن به" name="street">
                                <p class="error error_street"></p>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3 mb-3">حفظ البينات</button>
                </form>
            </div>
            <div class="card-footer">

            </div>
        </Div>
    </div>

    
</main>
@endsection

@section('custom_script')
<script>
$('.personal_form').on('submit',function(event) {
    event.preventDefault();

    let formData = new FormData(this);

    $.ajax({
        url: '{{ route("update.personal.info") }}',
        data: formData,
        contentType: false,
        cache: false,
        processData:false,
        type: 'post',
        success: (e) => {
            if(e.message == 'success') {
                window.Swal.fire({
                    icon: 'success',
                    title: 'تم تعديل بيناتك الشخصية',
                    showConfirmButton: false,
                    timer: 1500
                })
            }

            $('.error').each(function(){
                $(this).text('');
            });
        },

        error: (error_bag) => {
            let errors = error_bag.responseJSON.errors;
            $(this).find('.error').text('');
            for (error in errors ) {
                $(this).find(`p.error_${error}`).text(errors[error]);
            }
        }
    })
})
</script>
@endsection