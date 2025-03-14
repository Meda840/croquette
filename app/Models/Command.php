<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;
    protected $keyType = 'string';

    protected $table = 'command'; // Define table name

    protected $fillable = [
        'id',
        'name',
        'product_id',
        'tele',
        'email',
        'code_postal',
        'address',
        'message',
        'title',
        'price',
        'quantity',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'quantity' => 'integer',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
