<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'weight',
        'pallet_quantity',
        'brand_id'
    ];
    protected $keyType = 'string';

    // A product belongs to a brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function productInfos()
    {
        return $this->hasMany(ProductInfo::class);
    }
    public function commands()
    {
        return $this->hasMany(Command::class);
    }
}
