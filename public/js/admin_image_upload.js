let gallary = [];
let deleted_gallary_ids = [];
$('.upload_btn').on('click',function(){
    console.log('click');
    $('.images_upload_form input').trigger('click');
});

$('.images_upload_form input').on('change',function(){
    $('.images_upload_model .empty-txt').addClass('d-none');
    for(file in this.files) {
        createNewFileUpload(this.files[file],file)
    }
});

function createNewFileUpload(file,index) {
    //check the type
    let allowedTypes = ['image/jpeg','image/png','image/jpg'];
    //file read
    if(! Number.isInteger(file)) {  gallary.push(file); }
    console.log(gallary)
    let fileRead = new FileReader();
    fileRead.onload = function () {
        let result = fileRead.result;
        let image  =  new Image();
        let error  = {};
        $('.hotel_images_recent_upload').append(`
        <div class="  col-md-4 image-holder pl-2 pr-2 image-holder">
            <div class="frame mt-4">
                <img src="${result}" alt="image">
                <div class="position-absolute w-100 h-100 layout">
                    <button class="btn_1 gray edit_gray_btn delete_gallary">Delete</button>
                </div>
            </div>
        </div>`);
    }

    fileRead.readAsDataURL(file);
}

$(document).on('click','.delete_gallary',function(){
    gallary.splice($(this).attr('id'),1);

    if(! gallary.length) {
        $('.images_upload_model .empty-txt').removeClass('d-none');
    }

    $(this).closest('.image-holder').remove();
});

$('.edit-gallary').on('click',function(){
    let id = $('.gallary_modal .input_id').val();
    let formData = new FormData();
    gallary.forEach(image => {
        console.log(gallary);
        formData.append('gallary[]',image);
    })
    $.ajax({
        url: `/admin/hotel/${id}/gallary`,
        data: formData,
        contentType: false,
        processData: false,
        type: 'post',
        success: (e) => {
            $('.images_upload_model').modal('toggle');
        }
    })
});

$(document).on('click','.delete-exist-gallary',function(){
    let deleted_id = $(this).attr('image_id');

    deleted_gallary_ids.push(deleted_id);

    $(this).closest('.image-holder').remove();
});

$('.update_gallary').on('click',function(){
    let id = $('.gallary_show_images .input_id').val();
    let formData = new FormData();

    if( deleted_gallary_ids.length ) {
        deleted_gallary_ids.forEach(image => {
            formData.append('deleted_gallary_ids[]',image);
        });
    }
    
    $.ajax({
        url: `/admin/hotel/${id}/gallary/delete`,
        data: formData,
        contentType: false,
        processData: false,
        method: 'post',
        success: function() {
            $('.gallary_show_images').modal('toggle');
        }
    })
});

$('.gallary_btn').on('click',function(){
    $('.hotel_images_recent_upload .empty-txt').removeClass('d-none');
    $('.hotel_images_recent_upload input').val('');
    $('.hotel_images_recent_upload .image-holder').each(function(){
        $(this).remove();
    })
});