<?php

namespace App\Modules\Inventory\Services;

use App\Modules\Inventory\Dto\AddCategoryDto;
use App\Modules\Inventory\Entity\Category;

class CategoryService
{
    public function Create(AddCategoryDto $dto) : void
    {
        $category = new Category();
        $category->name = $dto->name;
        $category->code = $dto->code;
        $category->save();
    }

    public function Edit($category, \App\Modules\Inventory\Dto\EditCategoryDto $categoryEditDto): void
    {
        $category->name = $categoryEditDto->name;
        $category->code = $categoryEditDto->code;
        $category->save();
    }
}
