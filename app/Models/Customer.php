<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $table = 'customers';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'password',
        'email',
        'address',
        'phone',
    ];
    protected $hidden = [
        'password',
        'email'
    ];
}
