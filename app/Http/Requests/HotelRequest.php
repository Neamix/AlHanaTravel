<?php

namespace App\Http\Requests;

use App\Models\City;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class HotelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'stars' => ['required','between:0,5','integer'],
            'meal_plane' => ['required'],
            'location' => ['required'],
            'phone' => [function($value,$attribute,$fail){
                if(!empty($this->phone)) {
                    $validator = Validator::make(['phone'=>$this->phone],[
                        'phone' => 'digits:11'
                    ]);
                    
                    if ($validator->errors()->messages()) {
                        return $fail($validator->errors()->messages()['phone'][0]);
                    }
                }
            }],
            'email' => [function($value,$attribute,$fail){
                if($this->email) {
                    if(! filter_var($this->email,FILTER_VALIDATE_EMAIL)) {
                        return $fail('This is not a valid email');
                    }
                }
            }],
            'name' => ['required'],
            'description' => ['required'],
            'min_days' => ['required'],
            'city_id' => ['required',function($value,$attribute,$fail){
                $citiesCount = City::find($this->city_id)->count();
                
                if(! $citiesCount) {
                    return $fail('You have to select city');
                }
            }],
            'price' => [function($value,$attribute,$fail){
                $prices = json_decode($this->price,true);

                if( ! count($prices) ) {
                    return $fail('You have to add at least one price quota');
                }

                foreach($prices as $key => $price) {
                    
                }
            }]
        ];
    }
}
