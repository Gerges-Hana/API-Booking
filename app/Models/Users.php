<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;


class Users extends Authenticatable implements JWTSubject
{ 
    protected $table = "users";
    public $timestamps = false;
    public $boolean = 1;
    protected $primaryKey = 'id';
    use HasFactory, Notifiable;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'first_name','last_name','email','email_verified_at','phone','password','address','request','request_date','avatar','provider','provider_id','payout','remember_token','last_check_notification','created_at','updated_at','description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    'password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
         
        
    ];
    
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
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

     /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = $value;
    }
}
