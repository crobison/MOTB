<?php

namespace App\Http\Controllers;

use App\Note;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Common\NoteList;


class NoteController extends Controller
{
    protected $notes;

    public function __construct(NoteList $notes)
    {
	$this->middleware('auth');
	$this->notes = $notes;
    }
    
    public function index(Request $request)
    {
        //$sharedusers = array();
	$notes = $this->notes->getUserNotes($request->user(), true);

	/*
	foreach($notes as $note)
        {
	    
	    $n = $request->notes()->shares()->find($note->id); 
	    $sharedusers[$note->id] = $n; 
        }
	return view('notes', ['notes' => $notes, 'sharedusers' => $sharedusers]);
	*/

	return view('notes', ['notes' => $notes]);
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
/*	
    public function getSharedUsers(Request $request)
    {
	$sharedUsers = $request->user()->shares()->find($request->user());
    }
 */   
}
