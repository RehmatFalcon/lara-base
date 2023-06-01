<?php

namespace App\Modules\Inventory\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $name
 * @property float $inRate
 * @property float $outRate
 * @property string $unit
 * @property int category_id
 * @property string $image
 */
class Product extends Model
{
    use SoftDeletes;
    // name, in rate, out rate, unit, category_id

    protected $table = "inv_product";

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
