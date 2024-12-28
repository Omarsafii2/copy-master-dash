<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use SoftDeletes;

    
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'img',
        'gender',
        'phone_number',
        'skills',
        'education',
        'experience',
        'cv',
        'bio',
        'category'
    ];

    

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function applications(){
        return $this->hasMany(Application::class);
    }
}
