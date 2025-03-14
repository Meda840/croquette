<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInfo extends Model
{
    use HasFactory;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'product_id',
        'type',
        'value',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
