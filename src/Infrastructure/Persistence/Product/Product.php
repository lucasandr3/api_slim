<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Product;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Product extends Eloquent
{
    public $table = "products";
    public $timestamps = false;
}