<?php

namespace App\Models;

use App\Traits\validationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory,validationTrait;

    protected $guarded = [];
    protected $with = ['prices','getGallary'];

    static function upsertInstance($data) 
    {
        $dimintionsArray = [
            'small' => '400X270',
        ];
        
        $hotel = self::updateOrCreate(
            ['id' => $data->id],
            [
                'name' => $data->name,
                'stars' => $data->stars,
                'location' => $data->location,
                'phone' => $data->phone,
                'email' => $data->email,
                'meal_plane' => $data->meal_plane,
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

        if(! empty($data->main_image)) {
            Image::storeImages([$data->main_image],$dimintionsArray,$hotel,'preview');
        }

        return self::validateResult('success',$hotel->load('previewImage','getGallary'));
    }

    public function addGallary(array $data) {
        $dimintionsArray = [
            'large'  => '1600X1067',
            'medium' => '800X600',
            'small' => '400X270',
        ];
        
        Image::storeImages($data,$dimintionsArray,$this,'gallary');
    }

    public function removeGallary(array $images_ids) {

        foreach($images_ids as $image_id) {
            $image_name = Image::where('id',$image_id)->pluck('name')->toArray();
            $images_ids_with_name = Image::where('name',$image_name)->pluck('id')->toArray();
            $this->getGallary()->detach($images_ids_with_name);  
        }

        return self::validateResult('success',$this->getGallary()->get());
    }

    public function deleteInstance()
    {
        $this->delete();
        return self::validateResult('success',$this);
    }

    public function prices() {
        return $this->hasMany(Price::class);
    }

    public function previewImage() {
        return $this->belongsToMany(Image::class)->where('use_for','preview');
    }

    public function getGallary() {
        return $this->belongsToMany(Image::class)->where('use_for','gallary');
    }

    public function images() {
        return $this->belongsToMany(Image::class);
    }
}
