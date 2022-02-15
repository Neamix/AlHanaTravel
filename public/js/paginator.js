let margin;
function createPagination(total,per_page,lang = 'en') {
    margin = lang == 'ar' ? 'margin-right' : 'margin-left';
    let countPages = Math.ceil(total/per_page);

    $('.pagination').html('');
    //loop to create btns 
    $('.pagination').append('<div class="pages d-flex"><div class="pages-inner d-flex" ></div></div>');

    for(i = 1; i <= countPages; i++) {
        $('.pagination').find('.pages-inner').append(`<li class="page-item" value="${i}"><span class="page-link">${i}</span></li>`);
    }

   if(countPages > 5) {
        if( lang == 'en' ) {
            $('.pagination').prepend('<li class="prev-page page-cursor"><i class="fa fa-angle-left" aria-hidden="true"></i>            </li>');
            $('.pagination').append('<li class="next-page page-cursor"><i class="fa fa-angle-right"></i></li>');
        } else {
            $('.pagination').prepend('<li class="prev-page page-cursor"><i class="ti-angle-right"></i></li>');
            $('.pagination').append('<li class="next-page page-cursor"><i class="ti-angle-left"></i></li>');
        }
   }

//    $('.pagination').children('.pages').css('width',($('.page-link').width() + 1)  * 5 + 1)

    $('.page-item').eq(0).addClass('active');
}

$('.pagination').on('click','.next-page',function(){
    $('.page-item.active').next().click();
    $('.pagination .pages-inner').css(margin,-39 * $('.page-item.active').index() );
});

$('.pagination').on('click','.prev-page',function(){
    $('.page-item.active').prev().click();
    $('.pagination .pages-inner').css(margin,-39 * $('.page-item.active').index() );
});

$(document).on('click','.page-item',function(){
    let pagination = $(this).parents('.pagination');
    let container = pagination.attr('container_class');
    let action = pagination.attr('action');
    let modal = pagination.attr('modal');
    let search_elements = $(`input[related_to="${modal}"]`);
    let search_json = {};
    let index = $(this).index();

    search_elements.each(function(){
        search_json[$(this).attr('name')] = $(this).val();
    });

    console.log(search_json);

    $.ajax({
        url: pagination.attr('url')+'?page='+$(this).attr('value'),
        type: 'post',
        data: search_json,
        success(e) {
            let build;
            let payloadGroup = e.data;

            $(container).html('');

            payloadGroup.forEach(payload => {
                $(container).append(window[pagination.attr('load')](payload));
            });
        }
    })
});

function setPage(page_no) {
    $('input.page-indicator').val(page_no);
    $('.page-item').removeClass('active');
    $('.page-item').eq(page_no - 1).addClass('active');
    if($('.page-item').length > 5) $('.pagination .pages-inner').css(margin,-39 * $('.page-item.active').index());
}