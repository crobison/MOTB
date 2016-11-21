<?php

namespace App\Common;

use App\User;
use App\Note;

class NoteList
{
	public function getUserNotes(User $user, $active)
	{
		return Note::where([['user_id', $user->id], ['active', $active]])
			->orderBy('created_at', 'asc')
			->get();
	}

}
