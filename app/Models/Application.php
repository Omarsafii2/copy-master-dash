<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_id',
        'application_date',
        'status',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jobs(){
        return $this->belongsTo(Job::class, 'job_id');
    }
}
