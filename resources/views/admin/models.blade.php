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
                            <div class="add_new_price btn_1 gray mt-3" form_class="edit_form"><i class="fa fa-plus"></i>Add new price</div>
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
                            <textarea type="text" class="form-control date-pick input_description" value="" name="description" rows="10"></textarea>
                            <p class="error error_description"></p>
                        </div>
                    </div>
                    </div>
                    <input type="hidden" class="form-control date-pick input_id" value="" name="id">
                    <div class="modal-footer">
                        <button class="btn btn-primary" href="#0">Save</button>
                    </div>
                <!-- /Row -->
                </form>
            </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="delete_hotel_modal" tabindex="-1" role="dialog" aria-labelledby="client_detail_modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="client_detail_modalLabel">Delete Hotel</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="delete_form" data="delete">
                    <input type="hidden" class="del_hotel_id" value="">
                    <p class="del_warning">Are you sure that you want to delete this hotel? this action is irreversable</p>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Delete</button>
                    </div>
                <!-- /Row -->
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
                            <p class="error error_stars"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>View Image</label>
                            <input type="file" class="form-control date-pick input_main_image" value="" name="main_image">
                            <p class="error error_stars"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" class="form-control date-pick input_description" value="" name="description" rows="10"></textarea>
                            <p class="error error_description"></p>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" href="#0">Save</button>
                    </div>
                <!-- /Row -->
                </form>
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="add_new_city" tabindex="-1" role="dialog" aria-labelledby="client_detail_modalLabel" aria-hidden="true" data="add>
    <div class="modal-dialog wide"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="client_detail_modalLabel">Add new city</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="add_city_form">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>City name</label>
                            <input type="text" class="form-control date-pick input_name" value="" name="name">
                            <p class="error error_city"></p>
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

<div class="modal fade" id="edit_city" tabindex="-1" role="dialog" aria-labelledby="client_detail_modalLabel" aria-hidden="true" data="edit">
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
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" href="#0">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>