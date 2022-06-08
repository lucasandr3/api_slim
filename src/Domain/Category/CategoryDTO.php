<?php

declare(strict_types=1);

namespace App\Domain\Category;

use JsonSerializable;

class CategoryDTO implements JsonSerializable
{
    private $categories;
    private $type;

    public function __construct($categories, $type)
    {
        $this->categories = $categories;
        $this->type = $type;
    }

    public function mountCategory($categories)
    {
        foreach ($categories as $category) {
            $category->name = ucfirst($category->name);
            $category->products = $category->products();
        }

        return $categories;
    }

    public function oneCategory($categories)
    {
        return [
            'id' => $categories['id'],
            'name' => ucfirst($categories['name']),
            'products' => $categories->products()
        ];
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        if($this->type === 'multiple') {
            return ['categories' => $this->mountCategory($this->categories)];
        } else {
            return ['category' => $this->oneCategory($this->categories)];
        }
    }
}
