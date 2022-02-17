<?php

namespace App\Models;

use App\Jobs\ImageProcessing;
use App\Traits\validationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Hotel extends Model
{
    use HasFactory,validationTrait;

    protected $guarded = [];
    protected $with = ['prices','preview','city','images'];

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
                'city_id' => $data->city_id,
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
            
            $dimintionsArray = [
                'small' => '400X270',
            ];

            Image::storePreview($data->main_image,$dimintionsArray,$hotel);
        }

        return self::validateResult('success',Hotel::find($hotel->id));
    }

    public function addGallary(array $images) {
        $dimintionsArray = [
            'large'  => '1600X1067',
            'medium' => '800X600',
            'small' => '400X270',
        ];
     
        foreach($images as $image) {
            $file = Storage::disk('public')->put("/queue",$image);
            ImageProcessing::dispatch($file,$dimintionsArray,$this,'gallary');
        }

    }
    

    public function removeGallary(array $images_ids) {

        foreach($images_ids as $image_id) {
            $image_name = Image::where('id',$image_id)->pluck('name')->toArray();
            $images_ids_with_name = Image::where('name',$image_name)->pluck('id')->toArray();
            $this->getGallary()->detach($images_ids_with_name);  
        }

        return self::validateResult('success',$this->getGallary()->get());
    }

    public function scopeFilter($query,$filter) {
        if(isset($filter->name)) {
            $query->where('name','like',"%$filter->name%");
        }

        if(isset($filter->city_id)) {
            $query->where('city_id',$filter->city_id);
        }

    }

    public function deleteInstance()
    {
        $this->delete();
        return self::validateResult('success',$this);
    }

    public function prices() {
        return $this->hasMany(Price::class);
    }

    public function preview() {
        return $this->belongsTo(Image::class,'image_id');
    }

    public function images() {
        return $this->belongsToMany(Image::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }
}
