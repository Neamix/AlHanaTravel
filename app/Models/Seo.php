<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;

    public function seoOptimize($payload,$model)
    {
        $keywordsArray = explode(',',$payload->keyword);
        
        $model->seo->associate($keywordsArray);
    }
}
