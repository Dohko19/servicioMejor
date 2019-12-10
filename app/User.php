<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'name_deal', 'last_name', 'phone', 'address', 'hours_atention', 'services_type', 'price', 'package', 'promo_code',
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

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'assigned_roles');
    }

    public function hasRoles(array $roles)
    {
            return $this->roles->pluck('name')->intersect($roles)->count();
    }

     public function isAdmin()
    {
        return $this->hasRoles(['admin']);
    }

    public function isUser()
    {
        return $this->hasRoles(['user']);
    }

    public function isCampo()
    {
        return $this->hasRoles(['campo']);
    }

    public function isCliente()
    {
        return $this->hasRoles(['cliente']);
    }

    public function datosAdd()
    {
        return $this->hasOne(DataAdd::class);
    }

    public function servicesEsp()
    {
        return $this->hasOne(ServicesEspecials::class);
    }
}
