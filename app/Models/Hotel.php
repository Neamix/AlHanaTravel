<?php

namespace App\Models;

use App\Traits\validationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory,validationTrait;

    protected $guarded = [];

    static function upsertInstance($data) 
    {
        $dimintionsArray = [
            'medium' => '400X270',
        ];

        $preview = null;

        if($data->main_image) {
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
                'main_image' => $preview,
                'min_days' => $data->min_days,
                'description' => $data->description,
                'price' => $data->price
            ]
        );
        

        return self::validateResult('success',$hotel);
    }

    public function deleteInstance()
    {
        $this->delete();
        return self::validateResult('success',$this);
    }
}
