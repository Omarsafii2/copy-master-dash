<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Job extends Model
{
    use SoftDeletes;

    
    use HasFactory;

    protected $fillable = [
        'company_id',
        'title',
        'description',
        'type',
        'location', 
        'salary',
        'duration',
        'status',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
