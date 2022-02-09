<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;


    protected $table = 'travels';
    protected $guarded = [];

    static function upsertInstance($data) {
        $travel = self::updateOrCreate(
            ['id' => $data->id],
            [
                'price' => $data->price,
                'image' => $data->image,
                'description' => $data->description,
                'days' => $data->days,
                'hotel_id' => $data->hotel_id,
                'city_id' => $data->city_id, 
            ]
        );
    }
}
