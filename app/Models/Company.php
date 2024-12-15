<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;



class Company extends Model
{
    use SoftDeletes;

    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'business_license',
        'address',
        'img',
        'category',
        'subscription_status',
        'subscription_id',
    ];

    public function jobs(){
        return $this->hasMany(Job::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function subscriptions()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id');
    }

    public function getSubscriptionEndDateAttribute()
{
    if ($this->subscription_start_date && $this->subscriptions) {
        // Calculate the end date using the subscription's duration
        return Carbon::parse($this->subscription_start_date)
            ->addDays($this->subscriptions->duration)
            ->format('Y-m-d'); // Format to 'YYYY-MM-DD'
    }
    return null;
}

    
}
