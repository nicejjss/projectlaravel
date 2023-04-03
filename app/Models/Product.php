<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    const PRODUCT_CACHE='hotProducts';
    protected $table = 'products';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'content',
        'img',
        'price',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details', 'product_id', 'order_id')->withPivot('number');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'product_id', 'id');
    }

    public function scopeVisible(Builder $query)
    {
        return $query->where('products.visible', FLAG_ON);
    }

    public static function hotProducts()
    {
        return Cache::remember(Product::PRODUCT_CACHE, DAY, static function () {
            return Product::join('order_details', 'order_details.product_id', 'products.id')
                ->select("products.id")
                ->visible()
                ->orderBy(DB::raw('SUM( order_details.number)'), "desc")
                ->groupBy("products.id")
                ->get();
        });
    }
}
