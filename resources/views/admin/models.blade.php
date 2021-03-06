<div class="modal fade" id="client_detail_modal" tabindex="-1" role="dialog" aria-labelledby="client_detail_modalLabel" aria-hidden="true">
    <div class="modal-dialog wide" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="client_detail_modalLabel">Edit Hotel</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="edit_form" data="edit">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control input_name" value="" name="name">
                    <p class="error error_name"></p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control date-pick input_phone" value="" name="phone">
                            <p class="error error_phone"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" class="form-control date-pick input_email" value="" name="email">
                            <p class="error error_email"></p>
                        </div>
                    </div>
                </div>
                <!-- /Row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" class="form-control date-pick input_location" value="" name="location">
                            <p class="error error_location"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Meal Plane</label>
                            <input type="text" class="form-control date-pick input_meal_plane" value="" name="meal_plane">
                            <p class="error error_meal_plane"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Stars</label>
                            <input type="number" class="form-control date-pick input_stars" value="" name="stars" max="5" min="0">
                            <p class="error error_stars"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>View Description</label>
                            <textarea class="form-control date-pick input_view_description" value="" name="view_description"></textarea>
                            <p class="error error_view_description"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                    <div class="form-group">
                        <label>Prices</label>
                        <div class="price_list">
                            <Div class="row price">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control date-pick input_price_key" value="" name="price_key" placeholder="Value">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control date-pick input_price_val" value="" name="price_value" placeholder="Price">
                                        </div>
                                    </div>
                                </div>
                            </Div>
                        </div>
                        <div class="col-md-4">
                            <div class="add_new_price btn_1 gray mt-3" form_class=".edit_form"><i class="fa fa-plus"></i>Add new price</div>
                        </div>
                        <table class="table mt-3 price_table">
                            <tr>
                                <th scope="col">Value</th>
                                <th scope="col">Price</th>
                                <th scope="col"></th>
                            </tr>
                            <tr scope="row" class="table_columns">
                                <td class="empty_val text-center" colspan="3">No data to show</td>
                            </tr>
                        </table>
                        <p class="error error_price"></p>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Min days</label>
                            <input type="number" class="form-control date-pick input_min_days" value="" name="min_days">
                            <p class="error error_stars"></p>
                        </div>
                    </div>

                    @if(isset($cities))
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cities</label>
                            <select class="form-control select_city_id" name="city_id">
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                            <p class="error error_city_id"></p>
                        </div>
                    </div>
                    @endif

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>View Image</label>
                            <input type="file" class="form-control date-pick" value="" name="main_image">
                            <p class="error error_stars"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="summernote input_description" name="description"></textarea>
                            <p class="error error_description"></p>
                        </div>
                    </div>
                    </div>
                    <input type="hidden" class="form-control date-pick input_id" value="" name="id">
                    <div class="modal-footer">
                        <button class="btn btn-primary d-flex loader_key" href="#0" loader_name="edit_hotel_loader">
                            <div class="loader d-none" data-load="edit_hotel_loader">
                                <span></span>
                            </div>
                            Save
                        </button>
                    </div>
                <!-- /Row -->
                </form>
            </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="client_detail_modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form class="delete_form" data="delete">
                    <input type="hidden" class="del_hotel_id" value="">
                    <div class="w-100 d-flex justify-content-center">
                        <img src="{{ asset('img/delete.png') }}" alt="delete">
                    </div>
                    <p class="del_warning text-center">
                        Greating Hoody, Are you sure that you want to delete this text ? we just make sure because this data wont be able to revive
                    </p>
                    <div class="footer">
                        <button class="close_btn mr-2 btn d-block w-100 mb-2" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            Close
                        </button>
                        <button class="btn btn-primary btn d-block w-100 mb-2">
                            <i class="fa fa-ban" aria-hidden="true"></i>
                            Delete
                        </button>
                    </div>
                <!-- /Row -->
                </form>
            </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="edit_booking" tabindex="-1" role="dialog" aria-labelledby="client_detail_modalLabel" aria-hidden="true">
    <div class="modal-dialog wide"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="client_detail_modalLabel">Edit booking</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="edit_booking" data="edit">
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control input_price" value="" name="price">
                        <p class="error error_name"></p>
                    </div>
                    <div class="form-group">
                        <label>start date</label>
                        <input type="date" class="form-control input_start_date" value="" name="start_date">
                        <p class="error error_name"></p>
                    </div>
                    <div class="form-group">
                        <label>end date</label>
                        <input type="date" class="form-control input_end_date" value="" name="end_date">
                        <p class="error error_name"></p>
                    </div>
                    <input type="hiddin" class="input_id" name="id">
                    <div class="modal-footer">
                        <button class="btn btn-primary d-flex loader_key" href="#0" loader_name="edit_book_loader">
                            <div class="loader d-none" data-load="edit_book_loader">
                                <span></span>
                            </div>
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="add_new_hotel" tabindex="-1" role="dialog" aria-labelledby="client_detail_modalLabel" aria-hidden="true">
    <div class="modal-dialog wide"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="client_detail_modalLabel">Add new hotel</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="add_form" data="add">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control input_name" value="" name="name">
                    <p class="error error_name"></p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control date-pick input_phone" value="" name="phone">
                            <p class="error error_phone"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" class="form-control date-pick input_email" value="" name="email">
                            <p class="error error_email"></p>
                        </div>
                    </div>
                </div>
                <!-- /Row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" class="form-control date-pick input_location" value="" name="location">
                            <p class="error error_location"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Meal Plane</label>
                            <input type="text" class="form-control date-pick input_meal_plane" value="" name="meal_plane">
                            <p class="error error_meal_plane"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Stars</label>
                            <input type="number" class="form-control date-pick input_stars" value="" name="stars" max="5" min="0">
                            <p class="error error_stars"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>View Description</label>
                            <textarea class="form-control date-pick input_view_description" value="" name="view_description"></textarea>
                            <p class="error error_view_description"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Prices</label>
                            <div class="price_list">
                                <Div class="row price">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control date-pick input_price_key" value="" name="price_key" placeholder="Value">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" class="form-control date-pick input_price_val" value="" name="price_value" placeholder="Price">
                                            </div>
                                        </div>
                                    </div>
                                </Div>
                            </div>
                            <div class="col-md-4">
                                <div class="add_new_price btn_1 gray mt-3" form_class=".add_form"><i class="fa fa-plus"></i>Add new price</div>
                            </div>
                            <table class="table mt-3 price_table">
                                <tr>
                                    <th scope="col">Value</th>
                                    <th scope="col">Price</th>
                                    <th scope="col"></th>
                                </tr>
                                <tr scope="row" class="table_columns">
                                    <td class="empty_val text-center" colspan="3">No data to show</td>
                                </tr>
                            </table>
                            <p class="error error_price"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Min days</label>
                            <input type="number" class="form-control date-pick input_min_days" value="" name="min_days">
                            <p class="error error_min_days"></p>
                        </div>
                    </div>

                    @if(isset($cities))
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cities</label>
                            <select class="form-control" name="city_id">
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                            <p class="error error_city_id"></p>
                        </div>
                    </div>
                    @endif

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>View Image</label>
                            <input type="file" class="form-control date-pick input_main_image" value="" name="main_image">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="summernote input_description" name="description" class="input_text" value=""></textarea>
                            <p class="error error_description"></p>
                        </div>
                    </div>
                    </div>
                    <button class="btn btn-primary d-flex loader_key" href="#0" loader_name="add_hotel_loader">
                        <div class="loader d-none" data-load="add_hotel_loader">
                            <span></span>
                        </div>
                        Save
                    </button>
                <!-- /Row -->
                </form>
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="add_new_city" tabindex="-1" role="dialog" aria-labelledby="client_detail_modalLabel" aria-hidden="true" data="add">
    <div class="modal-dialog wide"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="client_detail_modalLabel">Add new city</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="add_city_form" data="add">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>City name</label>
                            <input type="text" class="form-control date-pick input_name" value="" name="name">
                            <p class="error error_name"></p>
                        </div>
                        <div class="form-group">
                            <label>Preview Image</label>
                            <input type="file" class="form-control date-pick input_name" value="" name="preview">
                            <p class="error error_preview"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary loader_key" loader_name="add_new_city" href="#0">
                            Save
                        <div class="loader d-none" data-load="add_new_city">
                            <span></span>
                        </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade edit_city" id="edit_city" tabindex="-1" role="dialog" aria-labelledby="client_detail_modalLabel" aria-hidden="true" data="edit">
    <div class="modal-dialog wide"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="client_detail_modalLabel">Edit city</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="edit_city_form">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>City name</label>
                            <input type="text" class="form-control date-pick input_name" value="" name="name">
                            <input type="hidden" class="form-control date-pick input_id" value="" name="id">
                            <p class="error error_name"></p>
                        </div>
                        <div class="form-group">
                            <label>Preview Image</label>
                            <input type="file" class="form-control date-pick input_name" value="" name="preview">
                            <p class="error error_preview"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" href="#0">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add_new_slider" tabindex="-1" role="dialog" aria-labelledby="client_detail_modalLabel" aria-hidden="true" data="add">
    <div class="modal-dialog wide"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="client_detail_modalLabel">Add new slider</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="add_slider_form" data="add">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Slider title</label>
                            <input type="text" class="form-control date-pick input_title" value="" name="title">
                            <p class="error error_title"></p>
                        </div>
                        <div class="form-group">
                            <label>Slider text</label>
                            <textarea class="summernote" name="text" class="input_text" value=""></textarea>
                            <p class="error error_text"></p>
                        </div>
                        <div class="form-group">
                            <label>Button url</label>
                            <input type="text" class="form-control date-pick input_title" value="" name="button_url">
                            <p class="error error_button_url"></p>
                        </div>
                        <div class="form-group">
                            <label>Button text</label>
                            <input  name="button_text" class="input_button_text form-control"></textarea>
                            <p class="error error_button_text"></p>
                        </div>
                        <div class="form-group">
                            <label>Preview Image</label>
                            <input type="file" class="form-control date-pick" value="" name="image">
                            <p class="error error_image"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" href="#0">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade edit_slider" id="edit_slider" tabindex="-1" role="dialog" aria-labelledby="client_detail_modalLabel" aria-hidden="true" data="edit">
    <div class="modal-dialog wide"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="client_detail_modalLabel">Edit slider</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="edit_slider_form">
                <div class="col-md-12">
                        <div class="form-group">
                            <label>Slider title</label>
                            <input type="text" class="form-control date-pick input_title" value="" name="title">
                            <p class="error error_title"></p>
                        </div>
                        <div class="form-group summer-text">
                            <label>Slider text</label>
                            <textarea class="summernote input_text" name="text" class="input_text"></textarea>
                            <p class="error error_text"></p>
                        </div>
                        <div class="form-group">
                            <label>Button url</label>
                            <input type="text" class="form-control date-pick input_url" value="" name="button_url">
                            <p class="error error_button_url"></p>
                        </div>
                        <div class="form-group">
                            <label>Button text</label>
                            <input  name="button_text" class="input_button_text form-control"></textarea>
                            <p class="error error_button_text"></p>
                        </div>
                        <div class="form-group">
                            <label>Preview Image</label>
                            <input type="file" class="form-control date-pick" value="" name="image">
                            <p class="error error_image"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" href="#0">Save</button>
                    </div>
                    <input type="hidden" class="form-control date-pick input_id" value="" name="id">
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade images_upload_model" id="image_upload" tabindex="-1" role="dialog" aria-labelledby="client_detail_modalLabel" aria-hidden="true" data="edit">
    <div class="modal-dialog  gallary_modal"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-small" id="client_detail_modalLabel">Hotel Gallary</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <button class="btn_1 gray upload_btn">
                    <i class="fa fa-plus ml-2"></i>
                    Upload Image
                </button>
                <form class="images_upload_form">
                    <input type="file" name="image_gallary" class="d-none" multiple>
                </form>
                <div class="hotel_images_recent_upload mt-3 row">
                    <p class="empty-txt">No images</p>
                </div>
                <div class="hotel_images">

                </div>
                <input type="hidden" class="form-control date-pick input_id" value="" name="id">
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary edit-gallary d-flex loader_key" href="#0" loader_name="add_hotel_gallary_loader">
                    <div class="loader d-none" data-load="add_hotel_gallary_loader">
                        <span></span>
                    </div>
                    Save
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade gallary_show gallary_show_images " id="gallary_get" tabindex="-1" role="dialog" aria-labelledby="client_detail_modalLabel" aria-hidden="true" data="edit">
    <div class="modal-dialog wide gallary_modal"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="client_detail_modalLabel">Hotel Gallary</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="w-100 d-flex justify-content-center">
                    <div class="loader big d-none" data-load="hotel_gallary">
                        <span></span>
                    </div>
                </div>
                <div class="hotel_images_recent  row">
                   
                </div>
                <div class="hotel_images">

                </div>
                <input type="hidden" class="form-control date-pick input_id" value="" name="id">
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary update_gallary d-flex loader_key" href="#0" loader_name="edit_hotel_gallary_loader">
                    <div class="loader d-none" data-load="edit_hotel_gallary_loader">
                        <span></span>
                    </div>
                    Save
                </button>
            </div>
        </div>
    </div>
</div>
