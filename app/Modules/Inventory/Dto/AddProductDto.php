<?php

namespace App\Modules\Inventory\Dto;

use App\Modules\Inventory\Entity\Category;

class AddProductDto
{
    public string $name;
    public string $unit;
    public float $inRate;
    public float $outRate;
    public Category $category;
    public string $fileName = "";
}
