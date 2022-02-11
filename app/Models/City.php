<?php

namespace App\Models;

use App\Traits\validationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory,validationTrait;

    protected $guarded = [];

    static function upsertInstance($data) {
        $city = self::updateOrCreate(
            ['id' => $data->id],
            [
                'name' => $data->name
            ]
        );

        return self::validateResult('success',$city);
    }

    public function hotels() {
        return $this->belongsToMany(Hotel::class);
    }
}
