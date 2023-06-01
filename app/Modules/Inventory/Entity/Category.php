<?php

namespace App\Modules\Inventory\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = "inv_category";

    protected $fillable = [
        'name',
        'code'
    ];

//    public string $name;
//    public string $code;

    public function products() : HasMany
    {
        $this->hasMany(Product::class, 'category_id');
    }
}
