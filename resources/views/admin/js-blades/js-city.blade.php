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

    $('.edit_city_form,.add_city_form').on('submit',function(e){
        e.preventDefault();
        let formData = new FormData(this);
        let create_state = ($(this).attr('data') == 'add') ? true : false;
        $.ajax({
            url: '{{route("city.upsert")}}',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: (event) => {
                console.log(event);
            },
            error: (error_bag) => {
                let errors = error_bag.responseJSON.errors;
                console.log(errors);
                $(this).find('.error').text('');
                for (error in errors ) {
                    $(this).find(`p.error_${error}`).text(errors[error]);
                }
            }
        })
    });
    
</script>