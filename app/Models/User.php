<?php

namespace App\Models;

use App\Models\Hotel;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Notifications\Notifiable;
use Silvanite\Brandenburg\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
       'is_admin', 'name','phone','type','gender','country_id','city_id','service_id','arabic_name', 'email', 'password','verification_code','email_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'is_admin',
        'api_token',
    ];


    public function getUSerPhotoAttribute(){
        return $this->photo ? asset('img/users/' . $this->photo) : '';
    }


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function city()
    {
        return $this->belongsToMany(City::class);
    }
    public function Service()
    {
        return $this->belongsTo(Service::class);
    }
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }
}
