<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang digunakan jika tidak sesuai dengan nama model (orders -> orders)
    protected $table = 'orders';

    // Tentukan atribut yang dapat diisi (mass assignable)
    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
        'total_price',
    ];

    // Tentukan relasi dengan model Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Tentukan relasi dengan model Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
