<?php

namespace App\Modules\Inventory\Services;

use App\Modules\Inventory\Dto\AddProductDto;
use App\Modules\Inventory\Entity\Product;

class ProductService
{
    public function create(AddProductDto $dto) : void
    {
        $product = new Product();
        $product->name = $dto->name;
        $product->unit = $dto->unit;
        $product->inRate = $dto->inRate;
        $product->outRate = $dto->outRate;
        $product->category_id = $dto->category->id;
        $product->image = $dto->fileName;
        $product->save();
    }

    public function edit(Product $product, AddProductDto $dto)
    {
        $product->name = $dto->name;
        $product->unit = $dto->unit;
        $product->inRate = $dto->inRate;
        $product->outRate = $dto->outRate;
        $product->category_id = $dto->category->id;
        $product->save();
    }
}
