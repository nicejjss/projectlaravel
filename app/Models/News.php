<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
