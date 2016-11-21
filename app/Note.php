<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['title', 'description', 'active', 'user_id',];

    public function user()
    {
	return $this->belongsTo(User::class);
    }
    
    public function shares()
    {
	return $this->blongsToMany(User::class);
    }

    public function getNote($note_id)
    {
	return $this->where(['id', $note_id]);
    }
}
