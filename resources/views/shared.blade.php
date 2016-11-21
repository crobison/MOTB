@extends('layouts.app')

@section('content')



Share note {{ $note->title }} with:<br />
{!! Form::open(array('route' => 'shareNote', 'method' => 'post')) !!}
{{ Form::hidden('note_id', $note->id) }}
{!! Form::select('user_id', $users, null, ['class'=> 'form-control']) !!}
{!! Form::submit('Submit') !!}
{!! Form::close() !!}
<!--back button -->

@endsection
