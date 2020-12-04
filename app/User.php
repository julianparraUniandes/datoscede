<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

   

    public function authorizeRoles($roles){
        if($this->hasAnyRole($roles)){
            return true;
        }
        return false;
    }

     //Si tiene más de un rol
    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach ($roles as $role) {         
                if($this->hasRole($roles)){
                    return true;
                } 
            }
        }else{
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }

    //Validar si un usuario tiene un rol
    public function hasRole($role){
        if($this->roles()->where('name', $role)->first()){
            return true;
        }
        return false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lastName', 'email', 'password', 'company','companyKind','country','depto','city','token','facultad','tipo_usr','programa','doble_programa','full_data',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
