<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Company extends Authenticatable
{
    use SoftDeletes, HasFactory;

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
        'subscription_start_date', // Ensure this column is in the database
        'subscription_expiry',
        'max_post'
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function reviews()
    {
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

    public static function booted()
    {
        static::saving(function ($company) {
            if ($company->subscription_start_date && $company->subscriptions) {
                // Calculate and set the subscription expiry date before saving the model
                $company->subscription_expiry = Carbon::parse($company->subscription_start_date)
                    ->addDays($company->subscriptions->duration)
                    ->format('Y-m-d'); // Store as 'YYYY-MM-DD'
            }
        });
    }

    // Ensure passwords are hashed automatically
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }


    
}
