@extends('layouts.scaffold')

@section('main')

<h1>Edit File</h1>
{{ Form::model($file, array('method' => 'PATCH', 'route' => array('files.update', $file->id))) }}
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
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('files.show', 'Cancel', $file->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop