<?php

namespace App\Models;

use App\concerns\hasRoles;
use App\Models\UserAddress;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , hasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setProviderTokenAttribute($value){
        $this->attributes["provider_token"]=Crypt::encrypt($value);
    }

    public function getProviderTokenAttribute($value){
        return "" ;//Crypt::decrypt($value);
    }



    public function address() {
        
        return $this->hasOne(UserAddress::class,"user_id","id");
    }

    public function delivery_addresses() {
        
        return $this->hasMany(DeliveryAddress::class,"user_id","id");
    }

    public function ratings() {
        
        return $this->hasMany(rating::class);
    }

   

    public function routeNotificationForVonage(Notification $notification): string
    {
        return $this->phone;
    }
}
