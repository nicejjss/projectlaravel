<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table="sliders";
    public $timestamps = false;

    public static function index(){
        return Slider::all();
    }
}
