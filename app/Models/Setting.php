<?php

namespace App\Models;

use App\Traits\validationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory,validationTrait;

    static function addWebsiteDescription($description)
    {
        self::updateOrCreate(
            ['type' => 'description'],
            [
                'content' => $description
            ]
        );

    }

    static function addWebsiteLogo($logo_file,$version)
    {

        // $logo = self::updateOrCreate(
        //     ['type' => $version],
        //     [
        //         'content' => $logo_src'
        //     ]
        // );

    }


}
