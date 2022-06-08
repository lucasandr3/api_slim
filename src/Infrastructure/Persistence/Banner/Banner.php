<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Banner;

use App\Helpers\Helpers;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Banner extends Eloquent
{
    public $table = "banners";
    public $timestamps = false;
    
    public function getImgAttribute($value)
    {
        return Helpers::pathPhotos($value, 'banners');
    }
}