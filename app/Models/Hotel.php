<?php

namespace App\Models;

use App\Jobs\ImageProcessing;
use App\Traits\validationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
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
                'view_description' => $data->view_description
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
                'large' => '1600X1067',
                'small' => '500X370',
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
            $image_array = Image::where('id',$image_id)->first();

            if($image_array) {
                $image_name = $image_array['name'];
                $images_ids_with_name = Image::where('name',$image_name)->pluck('id')->toArray();
                $this->getGallary()->detach($images_ids_with_name); 
                Image::deleteImage($image_name);
            }
    
        }

        return self::validateResult('success',$this->getGallary()->get());
    }

    public function scopeFilter($query,$filter) {
        if(!empty($filter->name)) {
            $query->where('name','like',"%$filter->name%");
        }

        if(!empty($filter->city_id)) {
            $query->where('city_id',$filter->city_id);
        }

        if(!empty($filter->stars)) {
            $query->where('stars',$filter->stars);
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

    public function getGallary() {
        return $this->belongsToMany(Image::class)->where('use_for','gallary');
    }

    public function keywords() {
        return $this->morphMany(Seo::class,'seoable')->where('type','keyword');
    }

    public function description() {
        return $this->morphMany(Seo::class,'seoable')->where('type','description');
    }
}
