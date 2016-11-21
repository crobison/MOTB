<?php

namespace App\Http\Controllers;

use App\Note;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Common\NoteList;


class ShareController extends Controller
{
/*
    public function __construct()
    {
	$this->middleware('auth');
    }
*/
    public function index(Request $request, $note_id)
    {
	$users = $request->user()->getOtherUsers($request->user());
	$users = $users->pluck('name', 'id');
	$note = $request->user()->notes()->where('id', $note_id)->first();	
	return view('shared', ['users' => $users, 'note' => $note]);
    }

    public function share(Request $request, $note_id, $user_id)
    {
    }

/*
    protected $notes;

    public function __construct(NoteList $notes)
    {
	$this->middleware('auth');
	$this->notes = $notes;
    }
    
    public function index(Request $request)
    {
	return view('notes', ['notes' => $this->notes->getUserNotes($request->user(), true)]);
    }	
	
    public function store(Request $request)
    {
	$this->validate($request, [
	    'title' => 'required|max:255',
	]);

	$request->user()->notes()->create([
	    'title' => $request->title,
	    'description' => $request->description,
	]);

	return redirect('/notes');
    }

    public function showRemoved(Request $request)
    {
	return view('notesremoved', ['notes' => $this->notes->getUserNotes($request->user(), false)]);
    }

    public function remove(Request $request, $id)
    {
	$request->user()->notes()->where('id', $id)->update(['active' => false]);
	return redirect('/notes');
    }

    public function restore(Request $request, $id)
    {
	$request->user()->notes()->where('id', $id)->update(['active' => true]);
	return redirect('/notes');
    }
*/
}
