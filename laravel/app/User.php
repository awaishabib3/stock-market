<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function __construct(array $attributes = [])
    {
        $this->bootIfNotBooted();

        $this->syncOriginal();

        $this->fill($attributes);
    }

    public function inventories()
    {
        return $this->hasMany('App\Inventory', 'user_id', 'id');
    }

    public function sold()
    {
        return $this->hasMany('App\Transaction', 'seller_id', 'id');
    }

    public function bought()
    {
        return $this->hasMany('App\Transaction', 'buyer_id', 'id');
    }

    public function account()
    {
        return $this->hasOne('App\Account');
    }

    public function orders()
    {
        return $this->hasMany('App\Order', 'user_id', 'id');
    }

    public function notifications()
    {
        return $this->hasMany('App\Notification', 'user_id', 'id');
    }
}
