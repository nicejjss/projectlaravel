<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
    public function scopeVisible(Builder $query){
        return $query->where('visible',FLAG_ON);
    }
}
