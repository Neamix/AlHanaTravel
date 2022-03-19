var loader_name;

$(document).on('click','.loader_key',function(){
    loader_name = $(this).attr('loader_name');
    $(`.loader[data-load="${loader_name}"]`).removeClass('d-none')
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Accept': "application/json"
    },

    beforeSend: () => {
    },

    complete: () => {
        $(`.loader[data-load="${loader_name}"]`).addClass('d-none');
    },

    error: () => {
        $(`.loader[data-load="${loader_name}"]`).addClass('d-none');
    }
});

$(document).on('click','.delete_btn',function(){
    let deleted_id = $(this).attr('modal_id');
    let modal = $(this).attr('modal');
    let action = `/admin/${modal}/delete/${deleted_id}`
    $('.delete_form').attr('action',action)
    $('.delete_form').attr('deleted_id',deleted_id);
    $('.delete_form').attr('modal',modal);
})

$('.delete_form').on('submit',function(e){
    e.preventDefault();
    let delete_id = $(this).attr('deleted_id');
    let modal = $(this).attr('modal');
    $.ajax({
        url: `${$(this).attr('action')}`,
        type: 'post',
        success: (event) => {
            $(`li.${modal}_element#${delete_id}`).remove();
            $('#delete_modal').modal('toggle');
        }
    });
});

$(document).on('click','.hotel_like',function(){
    let hotel_id = $(this).attr('data_id');
    $.ajax({
        url: `/user/like/${hotel_id}`,
        type: 'post',
        success: function() {
        }
    })
});

$(document).on('click','.edit_btn',function(){
    let modal_class = $(this).attr('modal_class');
    let modal = $(this).attr('modal');
    let modal_id = $(this).attr('modal_id');
    $.ajax({
        url: `${modal}/${modal_id}`,
        success: (modal) => {
            //add hotel main data
            for(element in modal) {
                let val = modal[element];
                let input_class = $(`${modal_class} .input_${element}`);
                let select_class = $(`${modal_class} .select_${element}`)
                if(element == 'text' || element == 'description') {
                    let getSummerParent = $(modal_class);
                    let getSummer = getSummerParent.find(`.input_${element}`);
                    getSummerParent.find('.note-editable').html(val);
                    getSummer.val(val);
                }
                input_class.val(val);
                select_class.val(val);
            }

            
            //add hotel prices quotes 
            if( modal_class == '.edit_form'  ) {
                let prices = modal.prices;

                $('.table_columns').each(function(){
                    $(this).remove();
                });

                if(prices) {
                    for(let i = 0; i <= prices.length - 1; i++) {
                        insertPrice(prices[i]['quota'],prices[i]['price']);
                    }
                    prices.forEach((price) => {

                    })
                }
            } else if ( modal_class == '.gallary_show' ) {
                let gallary_images = modal.images;
                
                $('.hotel_images_recent').html('');


                gallary_images.forEach(image => {
                    $('.hotel_images_recent').append(`
                    <div class=" col-md-3 image-holder pl-1 pr-1">
                        <div class="frame mt-1">
                            <img src="\\images\\small\\${image.name}" alt="image" class="preview">
                            <div class="position-absolute w-100 h-100 layout">
                                <button class="btn_1 gray edit_gray_btn delete_gallary delete-exist-gallary" image_id="${image.id}">Delete</button>
                            </div>
                        </div>
                    </div>
                `)
                });
            }
        }
    })
    
});

function formlateTheDate($date) {
    let date = new Date($date);
    let months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    let month = date.getMonth();
    let year = date.getFullYear();
    let day  = date.getDate();

    return day + ' '  +months[month] + ' ' +year;
}