<?php

namespace App\Models;

use App\Traits\FileSystem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ImageResize;
use File;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory,FileSystem;

    protected $guarded = [];

    static function testImage($model) {
        self::createDirectory($model,true,"medium");
    }

    static function storeImages($file,$dimintionsArray,$model,$use_for = null) {
        $image = Storage::disk('public')->get($file);
        $name = uniqid() . '.png';
        $idsArray = [];
        $dir = public_path() . "\\images";

        $imageInstance = self::create([
            'name' => $name,
            'use_for' => $use_for,
        ]);

        if($use_for == 'preview') {
            $model_old_preview = $model->previewImage()->where('images.id','!=',$imageInstance->id)->pluck('name')->toArray();
            
            if(count($model_old_preview)){
                // Image::where('name',$model_old_preview->name)->delete();
            }

            $model->images()->sync([$imageInstance->id]);

        } else {
            $model->images()->attach([$imageInstance->id]);
        }

        foreach($dimintionsArray as $key => $dimintion)
        {
            $dimintion = explode('X',$dimintion);
            self::resize($image,$dimintion)->save($dir."\\$key\\".$name);

            /**
             * In case the image will be used to preview remove the old preview 
             * image and add new one
             * 
             * in case the image will be used in gallary just attach the new values
             */
            
            array_push($idsArray,$imageInstance->id);
        }
        
        $image = Storage::disk('public')->delete($file);
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
