<?php

namespace App\Models;

use App\Traits\validationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory,validationTrait;

    protected $guarded = [];
    protected $with = ['image'];

    static function upsertInstance($data)
    {
        $slider = self::updateOrCreate(
        ['id' => $data->id],
        [
            'text' => $data->text,
            'title' => $data->title
        ]);
        // dd($slider);
        if($data->image) {
            Image::storePreview($data->image,['small' => '400X200' ,'large' => '1600X1060'],$slider);
        }

        return self::validateResult('success',Slider::find($slider->id));
    }

    public function deleteInstance()
    {
        $this->image()->delete();
        $this->delete();
    }

    public function scopeFilter($query,$filter) {
        //future plane
    }

    public function image() 
    {
        return $this->belongsTo(Image::class);
    }
}
