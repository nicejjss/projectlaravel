<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    public $timestamps = false;


    protected $fillable = [
            'name','category_id','description','content','img','price'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'is');
    }
}
