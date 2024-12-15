<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'comment',
        'rating',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function companies(){
        return $this->belongsTo(Company::class, 'company_id');
    }
}
