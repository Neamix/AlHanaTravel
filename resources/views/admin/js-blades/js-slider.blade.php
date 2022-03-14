<script>
    $('.list_general').on('click','.edit_btn',function(){
        $.ajax({
            url: `city/${$(this).attr('city_id')}`,
            success: (city) => {
                for(element in city) {
                    let val = city[element];
                    let input_class = $(`.edit_city_form .input_${element}`);
                    input_class.val(val);
                }
            }
        });
    });

    $('.edit_slider_form,.add_slider_form').on('submit',function(e){
        e.preventDefault();
        let formData = new FormData(this);
        let create_state = ($(this).attr('data') == 'add') ? true : false;
        console.log(create_state);
        $.ajax({
            url: '{{route("slider.upsert")}}',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: (e) => {
                let payload = e.payload;
                $('.error').text('');
                $('#add_new_slider,#edit_slider').modal('hide');  
                if(create_state) {
                    $('.list_general .slider_list').append(loadAdminSlider(payload))
                    $('.empty_text').remove();
                    $(this).trigger('reset');
                    $('.summernote').each(function(){
                        $(this).summernote('reset');
                    })
                } else {
                    $(`.list_general .slider_element#${payload.id}`).html('').prepend(loadAdminSlider(payload,create_state))
                }
            },
            error: (error_bag) => {
                let errors = error_bag.responseJSON.errors;
                $(this).find('.error').text('');
                for (error in errors ) {
                    $(this).find(`p.error_${error}`).text(errors[error]);
                }
            }
        })
    });

    createPagination('{{$sliders->total()}}','{{$sliders->perPage()}}');
    
    $('.pagination').on('click','.page-item',function(){
        setPage($(this).attr('value'));
    });
</script>