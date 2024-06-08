<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    use HasFactory;
    // protected $table = 'employees';
    // protected $filllable = [];
    protected $guarded = [];
    protected $dates = ['created_at'];
    protected $fillable = [
        'name', 'email', 'password', 'role', 'photo',
    ];

    // public function isAdmin()
    // {
    //     return $this->role === 'admin';
    // }
}
