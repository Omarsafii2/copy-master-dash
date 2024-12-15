<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
       
        'price',
        'duration',
        'type',
        
    ];

    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
