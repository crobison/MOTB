<?php

namespace App;

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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function notes()
    {
	return $this->hasMany(Note::class);
    }

    public function shares()
    {
	return $this->belongsToMany('App\Note');
    }

    public function getOtherUsers(User $user)
    {
	return $this->select('name', 'id')->where('id', '!=', $user->id)->get();
    }

}
