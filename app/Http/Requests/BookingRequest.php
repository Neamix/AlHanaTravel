<?php

namespace App\Http\Requests;

use App\Models\Price;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BookingRequest extends FormRequest
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
            'email' => [function($value,$attrbute,$fail){

                if( ! Auth::check()) {

                    $this->validate([
                        'email' => 'required|email' 
                    ]);

                }

            }],
            'dates' => ['required',function($value,$attribute,$fail){
                $explode_date = explode('>',$this->dates);
                $start_date = $explode_date[0];
                $end_date = $explode_date[1];

                if( $start_date < $end_date ) {
                    return $fail('يجب ان يكون تاريخ الانتهاء بعد تاريخ البدء');
                }
            }],
            'name' => [ function($value,$attrbute,$fail) {
                if( ! Auth::check() ) {

                    if( ! $this->name) {
                        return $fail('يجب ادخال  الاسم');
                    } 

                }
            }],
            'qtyInput' => [function($value,$attrbute,$fail){
                if($this->qtyInput < 1) {
                    return $fail('يجب ان يكون عدد الافراد واحد فاكثر');
                }
            }],
            'phone' => [function(){
                if( ! Auth::check()) {
                    $this->validate([
                        'phone' => 'required|digits:11' 
                    ]);

                }
            }],
            'hotel_id' => ['required'],
            'price_id' => ['required',function($value,$attribute,$fail){

                $price_hotel =  Price::find($this->price_id)->hotel()->first();

                if($price_hotel) {

                    if($price_hotel->id != $this->hotel_id) {
                        return $fail('خطا في تحديد الفئة السعرية');
                    }

                }
            }]
        ];
    }
}
