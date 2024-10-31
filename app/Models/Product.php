<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, UUID, SoftDeletes;

    protected $fillable = [
        'product_category_id',
        'name',
        'slug',
        'description',
        'thumbnail',
        'image',
        'price',
        'stock',
        'unit',
        'status',
        'status_delivery',
        'is_favorite',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_favorite' => 'boolean',
        'is_active' => 'boolean',
    ];

    public $incrementing = false;

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function productCategoryName()
    {
        return $this->productCategory->name;
    }
}
