<?php

namespace App\Models;

use App\Traits\FileSystem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ImageResize;
use File;

class Image extends Model
{
    use HasFactory,FileSystem;

    protected $guarded = [];

    static function testImage($model) {
        self::createDirectory($model,true,"medium");
    }

    static function storeImages($images,$dimintionsArray,$model,$use_for = null) {
        foreach($images as $key => $image) {
            $name = uniqid() . '.png';
            $idsArray = [];
            $dir = public_path() . "\\images";

            foreach($dimintionsArray as $key => $dimintion)
            {
                $dimintion = explode('X',$dimintion);
                self::resize($image,$dimintion)->save($dir."\\$key\\".$name);
                
                if($use_for == 'preview') {
                    $model->previewImage()->delete();
                }

                $imageInstance = self::create([
                    'name' => $name,
                    'use_for' => $use_for,
                    'size' => $key
                ]);


                /**
                 * In case the image will be used to preview remove the old preview 
                 * image and add new one
                 * 
                 * in case the image will be used in gallary just attach the new values
                 */
                
                if($use_for == 'preview') {
                    if($model->previewImage()->count()){
                        Image::where('name',$name)->delete();
                    }

                    $model->images()->sync([$imageInstance->id]);

                } else {
                    $model->images()->attach([$imageInstance->id]);
                }

                array_push($idsArray,$imageInstance->id);
            }

        }

        return $idsArray;
        
    }

    static function resize($image,$dimintion) {
        $imgFile = ImageResize::make($image->getRealPath());
        return $imgFile->resize($dimintion[0], $dimintion[1], function ($constraint) {
            $constraint->aspectRatio();
        });
    }

    public function hotels() {
        return $this->belongsToMany(Hotel::class);
    }
}
