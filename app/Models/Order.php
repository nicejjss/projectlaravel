<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";
    public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details', 'product_id', 'order_id')->withPivot('number');
    }

    protected $fillable = [
        'customer_id',
        'status',
        'price',
        'buy_date'
    ];
}
