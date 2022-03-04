<script>
    createPagination('{{$bookings->total()}}','{{$bookings->perPage()}}');
    
    $('.pagination').on('click','.page-item',function(){
        setPage($(this).attr('value'));
    });

    $(document).on('click','.action_btn',function(){
        let action = $(this).attr('action');
        let booking_id = $(this).attr('booking_id');
        
        $.ajax({
            url: `book/status/${booking_id}/${action}`,
            type: 'post',
            success: (e) => {
               $(this).closest('.booking').remove();
              
            }
        })
    }); 

    $('.edit_booking').on('submit',function(e){
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            url: `book/update`,
            type: 'post',
            contentType: false,
            processData: false,
            data: formData,
            success: (e) => {
                $('.edit_booking').model('hide');

                $(`#booking_${booking_id}`).html('').append(loadAdminBooking(e.payload))
            }
        })
    });
</script>