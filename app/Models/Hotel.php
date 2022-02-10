<?php

namespace App\Models;

use App\Traits\validationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory,validationTrait;

    protected $guarded = [];
    protected $with = ['prices'];

    static function upsertInstance($data) 
    {
        $dimintionsArray = [
            'medium' => '400X270',
        ];

        $preview = null;
        if($data->id && empty($data->main_image)) {
            $preview = Hotel::find($data->id)->main_image;
        }

        if(! empty($data->main_image)) {
            $view_src = Image::storeImages([$data->main_image],$dimintionsArray);
            $preview = ( count($view_src) )  ? Image::find($view_src[0])->src : null;
        }
        
        $hotel = self::updateOrCreate(
            ['id' => $data->id],
            [
                'name' => $data->name,
                'stars' => $data->stars,
                'location' => $data->location,
                'phone' => $data->phone,
                'email' => $data->email,
                'meal_plane' => $data->meal_plane,
                'main_image' => $preview ?? $data->main_image,
                'min_days' => $data->min_days,
                'description' => $data->description,
            ]
        );
        
        $hotel->prices()->delete();
        $data->price = json_decode($data->price,true);
        
        foreach($data->price as $key => $price) {
            Price::create([
                'quota' => $key,
                'price' => $price,
                'hotel_id' => $hotel->id
            ]);
        }

        return self::validateResult('success',$hotel);
    }

    public function deleteInstance()
    {
        $this->delete();
        return self::validateResult('success',$this);
    }

    public function prices() {
        return $this->hasMany(Price::class);
    }
}
