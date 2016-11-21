<?php

namespace App\Common;

use App\User;
use App\Note;
use App\Share;

class SharedNotes
{
	public function getSharedNotesForUser(Note $note)
	{
		return Shared::where(['note_id', $note->note_id])
			->orderBy('created_at', 'asc')
			->get();
	}

}
