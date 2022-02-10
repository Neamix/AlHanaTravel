<script>
$('.input_gallary_image').on('change',function(){
    console.log($(this).files);
});

$('.list_general').on('click','.edit_btn',function(){
    let info_form = $(this).parent().siblings($('form.info')).serializeArray();
    for(info_key in info_form) {
        let key = info_form[info_key]['name'];
        let val = info_form[info_key]['value'];
        let input_class = $(`.edit_form .input_${key}`);
        input_class.val(val)
    }
});

$('.edit_form,.add_form').on('submit',function(e){
    e.preventDefault();

    let create_state = ($(this).attr('data') == 'add') ? true : false;

    $.ajax({
        url: '{{route("hotel.upsert")}}',
        type: 'post',
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: (event) => {
            let payload = event.payload;
            $('.out_content').addClass('d-none');
            $(this).trigger('reset');
            $('.close').click();
            
            if(create_state) {
                $('.list_general').prepend(
                `
                        <ul>
                    <li class="pl-3 mb-4 hotel_element" id="${payload.id}">
                        <h4>${payload.name}</h4>
                        <ul class="booking_list">
                            <div class="row">
                                <div class="col-md-6">
                                    <li><strong>Stars</strong> ${payload.stars} Stars</li>
                                    <li><strong>Meal Plane</strong>${payload.meal_plane}</li>
                                    <li><strong>Location</strong>${payload.location}</li>
                                    <li><strong>Min Days</strong>${payload.min_days} Days</li>
                                </div>
                                <div class="col-md-6">
                                    <li><strong>Phone</strong> ${payload.phone}</li>
                                    <li><strong>Email Address</strong>${payload.email}</li>
                                    <li><strong>Price</strong>${payload.price} LE</li>
                                </div>
                            </div>
                        </ul>
                        <div class="d-flex">
                            <a href="#0" class="btn_1 gray edit_btn" data-toggle="modal" data-target="#client_detail_modal">
                                <i class="fa fa-fw fa-pencil"></i> Edit Hotel
                            </a>

                            <a href="#0" class="btn_1 gray delete_btn ml-2" data-toggle="modal" data-target="#delete_hotel_modal" hotel_id="${payload.id}">
                                <i class="fa fa-trash"></i> Delete Hotel
                            </a>
                        </div>

                        <form class="info">
                            <input type="hidden" value="${payload.stars}" class="stars" name="stars">
                            <input type="hidden" value="${payload.name}" class="name" name="name">
                            <input type="hidden" value="${payload.phone ?? 'Not Exist'}" class="phone" name="phone">
                            <input type="hidden" value="${payload.location}" class="location" name="location">
                            <input type="hidden" value="${payload.meal_plane}" class="meal_plane" name="meal_plane">
                            <input type="hidden" value="${payload.email ?? 'Not Exist'}" class="email" name="email">
                            <input type="hidden" value="${payload.id}" class="id" name="id">
                            <input type="hidden" value="${payload.price}" class="price" name="price">
                            <input type="hidden" value="${payload.min_days}" class="price" name="min_days">
                            <input type="hidden" value="${payload.description}" class="price" name="description">
                        </form>

                    </li>
                </ul>
                        `
                    )
            } else {
                $(`li.hotel_element#${payload.id}`).html('').append(`
                <h4>${payload.name}</h4>
                        <ul class="booking_list">
                            <div class="row">
                                <div class="col-md-6">
                                    <li><strong>Stars</strong> ${payload.stars} Stars</li>
                                    <li><strong>Meal Plane</strong>${payload.meal_plane}</li>
                                    <li><strong>Location</strong>${payload.location}</li>
                                    <li><strong>Min Days</strong>${payload.min_days}</li>
                                </div>
                                <div class="col-md-6">
                                    <li><strong>Phone</strong> ${payload.phone}</li>
                                    <li><strong>Email Address</strong>${payload.email}</li>
                                    <li><strong>Price</strong>${payload.price}</li>
                                </div>
                            </div>
                        </ul>
                        <div class="d-flex">
                            <a href="#0" class="btn_1 gray edit_btn" data-toggle="modal" data-target="#client_detail_modal">
                                <i class="fa fa-fw fa-pencil"></i> Edit Hotel
                            </a>

                            <a href="#0" class="btn_1 gray delete_btn ml-2" data-toggle="modal" data-target="#delete_hotel_modal" hotel_id="${payload.id}">
                                <i class="fa fa-trash"></i> Delete Hotel
                            </a>
                        </div>

                        <form class="info">
                            <input type="hidden" value="${payload.stars}" class="stars" name="stars">
                            <input type="hidden" value="${payload.name}" class="name" name="name">
                            <input type="hidden" value="${payload.phone}" class="phone" name="phone">
                            <input type="hidden" value="${payload.location}" class="location" name="location">
                            <input type="hidden" value="${payload.meal_plane}" class="meal_plane" name="meal_plane">
                            <input type="hidden" value="${payload.email}" class="email" name="email">
                            <input type="hidden" value="${payload.id}" class="id" name="id">
                        </form>
                `)
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

$('.delete_form').on('submit',function(e){
    e.preventDefault();
    let delete_id = $('.del_hotel_id').val();
    $.ajax({
        url: `/admin/hotel/delete/${delete_id}`,
        type: 'post',
        data: {hotel: delete_id},
        success: (event) => {
            $(`li.hotel_element#${delete_id}`).remove();
            $('.close').click();
        }
    });
})

</script>