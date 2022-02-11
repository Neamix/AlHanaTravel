<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ImageResize;

class Image extends Model
{
    use HasFactory;

    protected $guarded = [];

    static function storeImages($images,$dimintionsArray) {
        foreach($images as $key => $image) {
            $name = uniqid() . '.png';
            $idsArray = [];

            foreach($dimintionsArray as $key => $dimintion)
            {
                $dimintion = explode('X',$dimintion);
                $src = "/$key/".$name;
                self::resize($image,$dimintion)->save(public_path('hotels')."/$key/".$name);
                
                $imageInstance = self::create([
                    'src' => $src
                ]);

                array_push($idsArray,$imageInstance->id);
            }

            return $idsArray;
        }
        
    }

    static function resize($image,$dimintion) {
        $imgFile = ImageResize::make($image->getRealPath());
        return $imgFile->resize($dimintion[0], $dimintion[1], function ($constraint) {
            $constraint->aspectRatio();
        });
    }
}
