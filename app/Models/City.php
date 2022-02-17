<?php

namespace App\Models;

use App\Traits\validationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory,validationTrait;

    protected $guarded = [];
    protected $with = ['image'];

    static function upsertInstance($data) {
        $city = self::updateOrCreate(
            ['id' => $data->id],
            [
                'name' => $data->name
            ]
        );

        if($data->preview) {
            Image::storePreview($data->preview,['small' => '420X267'],$city);
        }

        return self::validateResult('success',$city->load(['image']));
    }

    public function deleteInstance()
    {
        $this->delete();
        return self::validateResult('success',$this);
    }

    public function scopeFilter($query,$filter) 
    {
        if(isset($filter->name)) {
            $query->where('name','like',"%$filter->name%");
        }
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function hotels() 
    {
        return $this->hasMany(Hotel::class,'city_id');
    }
}
