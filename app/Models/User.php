<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'department_id', 'level_id', 'avatar'
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
     * 关联用户职位 
     * 一个用户可能存在多个职位
     */
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'user_posts');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }
}
