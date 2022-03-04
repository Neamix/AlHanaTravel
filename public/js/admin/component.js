function loadAdminHotel(payload,createState = true) {
    let image;

    if(payload.preview) {
        image = `\\images\\small\\${payload.preview.name}`
    } else {
        image = "/img/no-image.jpg"
    }

    let build = ` <ul class="booking_list">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="${image}" class="w-100 preview">
                        </div>
                        <div class="col-md-4">
                            <li><strong>Name</strong> ${payload.name} </li>
                            <li><strong>Stars</strong> ${payload.stars} Stars</li>
                            <li><strong>Meal Plane</strong>${payload.meal_plane}</li>
                            <li><strong>Location</strong>${payload.location}</li>
                            <li><strong>Min Days</strong>${payload.min_days} Days</li>
                        </div>
                        <div class="col-md-5">
                            <li><strong>Phone</strong>${payload.phone ?? 'Not Exist'}</li>
                            <li><strong>Email Address</strong>${payload.email ?? 'Not Exist'}</li>
                            <li><strong>City</strong>${payload.city.name}</li>
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
                </div>`;

    if(createState) {
        build =  `
        <ul>
            <li class="pl-3 mb-4 hotel_element" id="${payload.id}">
            ${build} 
            </li>
        </ul>
        `
    }

    return build;
}


function loadAdminCity(payload,createState = true) {
    console.log(payload.image);
    if(!payload.image) {
        image = "/img/no-image.jpg"
    } else {
        image = `\\images\\small\\${payload.image.name}`
    }

    let build =  `
        <ul class="booking_list">
            <div class="row">
                <div class="col-md-2">
                    <img class="preview" src="${image}">
                </div>
                <div class="col-md-6">
                    <li><strong>id</strong> #${payload.id}</li>
                    <li><strong>Name</strong>${payload.name}</li>
                </div>
            </div>
        </ul>
        <div class="d-flex">
            <a href="#0" class="btn_1 gray edit_btn" data-toggle="modal" data-target="#edit_city" modal="city" modal_class=".edit_city" modal_id="${payload.id}">
                <i class="fa fa-fw fa-pencil"></i> Edit city
            </a>

            <a href="#0" class="btn_1 gray delete_btn ml-2" data-toggle="modal" data-target="#delete_modal" modal_id="${payload.id}" modal="city">
                <i class="fa fa-trash"></i> Delete Hotel
            </a>
        </div>`

    if(createState) {
        build =  `
        <li class="pl-3 mb-4 city_element" id="${payload.id}">
            ${build}
        </li>`
    }

    return build;
}

function loadAdminSlider(payload,createState = true) {
    console.log(payload);
    if(!payload.image) {
        image = "/img/no-image.jpg"
    } else {
        image = `\\images\\small\\${payload.image.name}`
    }

    let build =  `
        <ul class="booking_list">
            <div class="row">
                <div class="col-md-2">
                    <img class="preview" src="${image}">
                </div>
                <div class="col-md-6">
                    <li><strong>id</strong> #${payload.id}</li>
                    <li><strong>Text</strong> ${payload.text}</li>
                    <li><strong>Title</strong> ${payload.title}</li>
                </div>
            </div>
        </ul>
        <div class="d-flex">
            <a href="#0" class="btn_1 gray edit_btn" data-toggle="modal" data-target="#edit_slider" modal="slider" modal_class=".edit_slider" modal_id="${payload.id}">
                <i class="fa fa-fw fa-pencil"></i> Edit slider
            </a>

            <a href="#0" class="btn_1 gray delete_btn ml-2" data-toggle="modal" data-target="#delete_modal" modal_id="${payload.id}" modal="slider">
                <i class="fa fa-trash"></i> Delete Hotel
            </a>
        </div>`

    if(createState) {
        build =  `
        <li class="pl-3 mb-4 slider_element" id="${payload.id}">
            ${build}
        </li>`
    }

    return build;
}


function loadAdminBooking(payload,createState = true) {
    let booking = `
        <h4>${payload.hotel.name}<i class="pending ml-2 mr-2">${payload.status}</i></h4>
        <ul class="booking_list">
    `



    let start_date = formlateTheDate(payload.start_date);
    let end_date = formlateTheDate(payload.end_date);

    booking += 

    `   <li><strong>Start date</strong>${start_date}</li>
        <li><strong>End date</strong>${end_date}</li>
        <li><strong>Booking details</strong>  People</li>
        <li><strong>Client</strong>${payload.user.name}</li>
        <li><strong>Client Contacts</strong> <a>${payload.user.phone}</a> - <a
        href="mailto:${payload.user.email}">${payload.user.email}</a></li>
    </ul>
    <p>
        <a href="mailto:${payload.user.email}" class="btn_1 gray"><i class="fa fa-fw fa-envelope"></i> Send Message</a> 
        <a href="#0" class="btn_1 gray" data-toggle="modal" data-target="#client_detail_modal">
            <i class="fa fa-fw fa-pencil"></i> Edit Booking</a>
    </p>
    <ul class="buttons">
        <li><a href="#0" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Approve</a></li>
        <li><a href="#0" class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Cancel</a></li>
    </ul>
    `

    if(createState ){
        booking = `
        <li class="pl-5">
        ${booking}
        </li>
        `
    }
    return booking;
}