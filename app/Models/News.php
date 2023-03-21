<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $table = 'news';
    public $timestamps = false;

    protected $fillable = [
        'title','content','description','img'
    ];
=======

    protected $table = 'news';
    public $timestamps = false;

    public static function index()
    {
        return News::all();
    }
>>>>>>> origin/master
}
