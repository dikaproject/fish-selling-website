<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, UUID, SoftDeletes;

    protected $fillable = [
        'product_id',
        'user_wallet_address',
        'crypto_currency',
        'amount',
        'transaction_hash',
        'status',
    ];

    // Relasi ke model Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
