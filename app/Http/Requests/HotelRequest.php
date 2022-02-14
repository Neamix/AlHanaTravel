<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'phone' => ['integer'],
            'email' => ['email'],
            'name' => ['required'],
            'description' => ['required'],
            'min_days' => ['required'],
            'price' => [function($value,$attribute,$fail){
                $prices = json_decode($this->price,true);

                if( ! count($prices) ) {
                    return $fail('You have to add at least one price quota');
                }

                foreach($prices as $price) {
                    
                }
            }]
        ];
    }
}
