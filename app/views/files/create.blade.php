@extends('layouts.scaffold')

@section('main')

<h1>Create File</h1>

{{ Form::open(array('route' => 'files.store')) }}
    <ul>
        <li>
            {{ Form::label('ticket_id', 'Ticket_id:') }}
            {{ Form::input('number', 'ticket_id') }}
        </li>

        <li>
            {{ Form::label('user_id', 'User_id:') }}
            {{ Form::input('number', 'user_id') }}
        </li>

        <li>
            {{ Form::label('type', 'Type:') }}
            {{ Form::text('type') }}
        </li>

        <li>
            {{ Form::label('file', 'File:') }}
            {{ Form::text('file') }}
        </li>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop


