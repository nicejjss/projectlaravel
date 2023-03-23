<?php

namespace App\Models;

use App\Scopes\VisibleScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    protected $fillable = [
        'name',
        'home',
    ];

    public static function cateHome()
    {
        return Category::where('home', FLAG_ON)->get();
    }

}
