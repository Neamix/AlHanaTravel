<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class UserProfileRequest extends FormRequest
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
            'name' => ['required'],
            'phone' => [function($value,$attribute,$fail){
                if($this->phone) {
                    $validate = Validator::make($this->all(),[
                        'phone' => 'digits:11'
                    ]);

                    if($validate->fails()) {
                        return $fail($validate->errors()->messages());
                    }
                }
            }],
            'birthday' => [function($value,$attribute,$fail){
                if($this->birthday) {


                    $validate = $this->validate([
                        'birthday' => 'date'
                    ]);

                    $now = date('Y-m-d');

                    if($now < $this->birthday) {
                        return $fail('يجب ان تدخل تاريخ قديم');
                    }
                }
            }]
        ];
    }
}
