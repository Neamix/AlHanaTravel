function buildHotel(payload) {
    return ` <div class="col-xl-4 col-lg-6 col-md-6 isotope-item popular">
                <div class="box_grid">
                        <figure>
                            <a href="#0" class="wish_bt"></a>
                            <a href="tour-detail.html"><img src="/images/small/${payload.preview.name}" class="img-fluid" alt="" width="800" height="533">
                                <div class="read_more"><span>مزيد من المعلومات</span></div>
                            </a>
                        </figure>
                        <div class="wrapper">
                            <h3><a href="tour-detail.html">${payload.name}</a></h3>
                            <p>${ payload.description.substr(0,100)  + '....' }.</p>
                        </div>
                        <ul>
                            <li><i class="icon_star ml-2 mr-2"></i>${payload.city.name }}</li>
                            <li><div class="score"><span>Star<em>${payload.meal_plane}</em></span><strong>${payload.stars}</strong></div></li>
                        </ul>
                    </div>
                </div>
        `    
}


function buildSmallDetailsHotel(payload) {
    let image = `<div class="col-md-4">
    <a href="hotel-detail.html" class="grid_item">
        <figure>
            <div class="score"><strong>${payload.city.name}</strong></div>
        `
        image +=   `<img src="/images/small/${payload.preview.name ?? 'img/no-image'}" class="img-fluid" alt="">
                                <div class="info">
                                    <div class="cat_star">
                                    
                    `
        
        for(i=1;i <= payload.stars;i++) {
            image += '<i class="icon_star"></i>'
        }

        image += ` </div>
                            <h3>${ payload.name }</h3>
                        </div>
                    </figure>
                    </a>
                    </div>`;
return image;
}