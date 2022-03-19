<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ImageResize;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $guarded = [];

    static function testImage($model) {
        self::createDirectory($model,true,"medium");
    }

    static function deleteImage($file) {
        $dimintions = ['large','medium','small'];

        foreach($dimintions as $dimintion) {

            $image_path = public_path() . '/images/' .$dimintion . '/' . $file;
            if(File::exists($image_path)) {
                unlink($image_path);
            }
        }
    }

    static function storeImages($file,$dimintionsArray,$model,$use_for = null) {
        $image = Storage::disk('public')->get($file);
        $name = uniqid() . '.png';
        $idsArray = [];
        $dir = public_path() . "/images";

        $imageInstance = self::create([
            'name' => $name,
            'use_for' => $use_for,
        ]);

        $model->images()->attach([$imageInstance->id]);

        foreach($dimintionsArray as $key => $dimintion)
        {
            $dimintion = explode('X',$dimintion);
            self::resize($image,$dimintion)->save($dir."/$key/".$name);
            array_push($idsArray,$imageInstance->id);
        }
        
        $image = Storage::disk('public')->delete($file);
    }

    static function storePreview($file,$dimintionsArray,$model) {
        $name = uniqid() . '.png';  
        $dir = public_path() . "/images"; 

        $imageInstance = self::create([
            'name' => $name,
            'use_for' => 'preview',
        ]);

        $image = $file->getRealPath();

        foreach($dimintionsArray as  $key => $dimintionValue) {
            $dimintions = explode('X',$dimintionValue);
            self::resize($image,$dimintions)->save($dir."/$key/".$name);
        }
            
        $model->image_id =  $imageInstance->id;
        $model->save();
    }

    static function resize($image,$dimintion) {
        $imgFile = ImageResize::make($image);
        return $imgFile->resize($dimintion[0], $dimintion[1], function ($constraint) {
            $constraint->aspectRatio();
        });
    }

    public function hotels() {
        return $this->belongsToMany(Hotel::class);
    }
}
