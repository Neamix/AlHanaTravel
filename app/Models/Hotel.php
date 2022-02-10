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
        $hotel = self::updateOrCreate(
            ['id' => $data->id],
            [
                'name' => $data->name,
                'stars' => $data->stars,
                'location' => $data->location,
                'phone' => $data->phone,
                'email' => $data->email,
                'meal_plane' => $data->meal_plane,
                // 'main_image' => $data->main_image,
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
