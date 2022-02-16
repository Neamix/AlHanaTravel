<?php

namespace App\Http\Requests;

use App\Models\City;
use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
            'name' => ['required','min:3',function($value,$attribute,$fail){
                $args = $this;
                $cityWithNameCount =  City::where(function($query) use($args) {
                    if(isset($args->id)) {
                        $query->whereNotIn('id',[$args->id]);
                    }
                })->where('name',$args->name)->count();

                if($cityWithNameCount) {
                    return $fail('The City name must be a unique');
                }
            }],
            'preview' => ['image']
        ];
    }
}
