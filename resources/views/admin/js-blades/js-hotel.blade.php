<script>
let price = {};
$('.input_gallary_image').on('change',function(){
    console.log($(this).files);
});

$('.add_new_price').on('click',function(){
    let form  = $(this).attr('form_class');
    let price = $(form).find('.input_price_key').val();
    let val = $(form).find('.input_price_val').val();
    $(form).find('.input_price_val').val('')
    $(form).find('.input_price_key').val('')
    insertPrice(price,val); 
});

function insertPrice(key,val) {
    $('.price_table').append(`
        <tr class="table_columns price_quota" quota="${key}">
            <td>${key}</td>
            <td>${val}</td>
            <td class="remove_price"><i class="fa fa-minus"></i></td>
        </tr>
    `);

    $('.empty_val').addClass('d-none');

    price[key] = val;
}

$('.price_table').on('click','.remove_price',function(){
    let quota = $(this).closest('.price_quota').attr('quota');
    let price_quota_length = $('.price_quota').length;
    console.log(price_quota_length);
    console.log(price[quota],quota);
    $(this).closest('.price_quota').remove();
    delete price[quota];

    if(price_quota_length) {
        $('.empty_val').addClass('d-none');
    } else {
        $('.empty_val').removeClass('d-none');
    }
})


$('.edit_form,.add_form').on('submit',function(e){
    e.preventDefault();
    let formData = new FormData(this);
    let priceJson = JSON.stringify(price);
    formData.append('price',priceJson);

    let create_state = ($(this).attr('data') == 'add') ? true : false;

    $.ajax({
        url: '{{route("hotel.upsert")}}',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: (event) => {
            let payload = event.payload;
            $('.out_content').addClass('d-none');
            $(this).trigger('reset');
            $('.close').click();

            $('.table_columns').each(function(){
                $(this).remove();
            });
            console.log(event);
            if(create_state) {
                $('.list_general').prepend(
                `
                        <ul>
                    <li class="pl-3 mb-4 hotel_element" id="${payload.id}">
                        <ul class="booking_list">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="" class="w-100 preview">
                                </div>
                                <div class="col-md-4">
                                    <li><strong>Name</strong> ${payload.name} </li>
                                    <li><strong>Stars</strong> ${payload.stars} Stars</li>
                                    <li><strong>Meal Plane</strong>${payload.meal_plane}</li>
                                    <li><strong>Location</strong>${payload.location}</li>
                                    <li><strong>Min Days</strong>${payload.min_days} Days</li>
                                </div>
                                <div class="col-md-5">
                                    <li><strong>Phone</strong>${payload.phone}</li>
                                    <li><strong>Email Address</strong>${payload.email}</li>
                                </div>
                            </div>
                        </ul>
                        <div class="d-flex">
                            <a href="#0" class="btn_1 gray edit_btn" data-toggle="modal" data-target="#client_detail_modal" modal_class=".edit_form" modal="hotel" modal_id="${payload.id}">
                                <i class="fa fa-fw fa-pencil"></i> Edit Hotel
                            </a>

                            <a href="#0" class="btn_1 gray edit_btn ml-2" data-toggle="modal" data-target="#gallary_get" modal_class=".gallary_show" modal="hotel" modal_id="${payload.id}">
                                <i class="fa fa-th" aria-hidden="true"></i>
                                Show Gallary
                            </a>

                            <a href="#0" class="btn_1 gray gallary_btn edit_btn ml-2" data-toggle="modal" data-target="#image_upload" modal_class=".gallary_modal" modal="hotel" modal_id="${payload.id}">
                                <i class="fa fa-picture-o" aria-hidden="true"></i>
                                Gallary
                            </a>


                            <a href="#0" class="btn_1 gray delete_btn ml-2" data-toggle="modal" data-target="#delete_hotel_modal" hotel_id="${payload.id}">
                                <i class="fa fa-trash"></i> Delete Hotel
                            </a>
                        </div>
                    </li>
                </ul>
                        `
                    )
            } else {
                $(`li.hotel_element#${payload.id}`).html('').append(`
                        <ul class="booking_list">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="" class="w-100 preview">
                                </div>
                                <div class="col-md-4">
                                    <li><strong>Name</strong> ${payload.name} </li>
                                    <li><strong>Stars</strong> ${payload.stars} Stars</li>
                                    <li><strong>Meal Plane</strong>${payload.meal_plane}</li>
                                    <li><strong>Location</strong>${payload.location}</li>
                                    <li><strong>Min Days</strong>${payload.min_days} Days</li>
                                </div>
                                <div class="col-md-5">
                                    <li><strong>Phone</strong>${payload.phone}</li>
                                    <li><strong>Email Address</strong>${payload.email}</li>
                                </div>
                            </div>
                        </ul>
                        <div class="d-flex">
                            <a href="#0" class="btn_1 gray edit_btn" data-toggle="modal" data-target="#client_detail_modal" modal_class=".edit_form" modal="hotel" modal_id="${payload.id}">
                                <i class="fa fa-fw fa-pencil"></i> Edit Hotel
                            </a>

                            <a href="#0" class="btn_1 gray edit_btn ml-2" data-toggle="modal" data-target="#gallary_get" modal_class=".gallary_show" modal="hotel" modal_id="${payload.id}">
                                <i class="fa fa-th" aria-hidden="true"></i>
                                Show Gallary
                            </a>

                            <a href="#0" class="btn_1 gray gallary_btn edit_btn ml-2" data-toggle="modal" data-target="#image_upload" modal_class=".gallary_modal" modal="hotel" modal_id="${payload.id}">
                                <i class="fa fa-fw fa-pencil"></i> Gallary
                            </a>

                            <a href="#0" class="btn_1 gray delete_btn ml-2" data-toggle="modal" data-target="#delete_hotel_modal" hotel_id="${payload.id}">
                                <i class="fa fa-trash"></i> Delete Hotel
                            </a>
                        </div>
                `)
            }

            if(!payload.preview_image.length) {
                $(`li.hotel_element#${payload.id} .preview`).attr('src',"{{ asset('img/no-image.jpg') }}")
            } else {
                $(`li.hotel_element#${payload.id} .preview`).attr('src',`\\images\\small\\${payload.preview_image[0].name}`)
            }

        },

        error: (error_bag) => {
            let errors = error_bag.responseJSON.errors;
            $(this).find('.error').text('');
            for (error in errors ) {
                $(this).find(`p.error_${error}`).text(errors[error]);
            }
        }
        
    });

    $('.close').on('click',function(){
        $('.error').text('');
    })
});

$('.list_general').on('click','.delete_btn',function(e){
    let id = $(this).attr('hotel_id');
    
    $('input.del_hotel_id').val(id);
});

</script>