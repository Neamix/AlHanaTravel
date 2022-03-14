<script>
let price = {};
$('.input_gallary_image').on('change',function(){
    console.log($(this).files);
});

$('.add_new_price').on('click',function(){
    let price =  $($(this).attr('form_class')).find('.input_price_key').val();
    let val =  $($(this).attr('form_class')).find('.input_price_val').val();
    
    if(price.length && val.length)  {
        $($(this).attr('form_class')).find('.input_price_val').val('')
        $($(this).attr('form_class')).find('.input_price_key').val('')
        insertPrice(price,val); 
    }
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
                $('.list_general').prepend(loadAdminHotel(payload,create_state));
                $('.summernote').each(function(){
                    $(this).summernote('reset');
                })
            } else {
                $(`li.hotel_element#${payload.id}`).html('').append(loadAdminHotel(payload,create_state))
            }
            console.log(payload);
            if(!payload.preview) {
                $(`li.hotel_element#${payload.id} .preview`).attr('src',"{{ asset('img/no-image.jpg') }}")
            } else {
                $(`li.hotel_element#${payload.id} .preview`).attr('src',`\\images\\small\\${payload.preview.name}`)
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
createPagination('{{$hotels->total()}}','{{$hotels->perPage()}}')
$('.pagination').on('click','.page-item',function(){
    setPage($(this).attr('value'));
});

$('.search_hotel').on('keyup',function(){
    $.ajax({
        url: '/hotel/filter',
        method: 'post',
        data: {name: $(this).val()},
        success: (e) => {
            let hotels = e.data;
            let payloadGroup = e.data;

            $('.list_general').html('');

            payloadGroup.forEach(payload => {
                console.log(payload);
                $('.list_general').append(loadAdminHotel(payload));
                createPagination(e.total,e.per_page);
                setPage(1);
            });
        }
    })
});
</script>