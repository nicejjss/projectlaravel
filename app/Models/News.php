<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    public $timestamps = false;

    protected $fillable = [
        'title','content','description','img'
    ];

    public static function index()
    {
        return News::all();
    }

    public function scopeVisible(Builder $query){
           return $query->where('visible',FLAG_ON);
    }
}
