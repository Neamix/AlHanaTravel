<?php

namespace App\Models;

use App\Http\Helpers\Dates;
use App\Traits\validationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Booking extends Model
{
    use HasFactory,validationTrait;

    protected $guarded = [];

    protected $with = ['user','hotel'];

    public function createInstance($data)
    {
       if(!Auth::check()) {
            $user = User::where('email',$data->email)->firstOr(function() use ($data) {
                return User::createInstance($data->all());
            });

       } else {
           $user = Auth::user();
       }

       $explode_date = explode('>',$data->dates);
       $start_date = Dates::getValidDate($explode_date[0]);
       $end_date =   Dates::getValidDate($explode_date[1]);

       self::create([
           'user_id' => $user->id,
           'hotel_id' => $data->hotel_id,
           'price' =>  Price::find($data->price_id)->price,
           'places' => $data->qtyInput, 
           'start_date' => $start_date,
           'end_date' => $end_date
       ]);
    }

    static function updateInstance($data)
    {
        $booking = Booking::find($data->id)->update($data->all());
        return self::validateResult('success',$booking);
    }

    public function changeBookingStatusTo($status)
    {
        $this->status = $status;
        $this->save();

        return self::validateResult('success',$this);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function scopeFilter($query,$request) 
    {
        if($request->status) {
            $query->where('status',$request->status);
        } else {
            $query->where('status','pending');
        }

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
