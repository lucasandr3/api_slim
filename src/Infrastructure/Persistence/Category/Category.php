<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Category;

use App\Helpers\Helpers;
use App\Infrastructure\Persistence\Product\Product;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Category extends Eloquent
{
    public $table = "categories";
    public $timestamps = false;

    public function products()
    {
        $products = $this->hasMany(Product::class)
            ->select('products.*')
            ->addSelect('categories.name as category_name')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->get();

        foreach ($products as $product) {
            $product->price = Helpers::formatMoney($product->price);
            $product->img = Helpers::pathPhotos($product->img, 'products');
        }

        return $products;
    }
}