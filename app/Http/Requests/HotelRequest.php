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
            'main_image' => ['mimetypes:image/png,image/jpg,image/jpeg'],
            'phone' => ['integer'],
            'email' => ['email'],
            'name' => ['required'],
            'description' => ['required'],
            'min_days' => ['required'],
            'price' => ['required']
        ];
    }
}
