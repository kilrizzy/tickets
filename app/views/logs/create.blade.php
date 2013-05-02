@extends('layouts.scaffold')

@section('main')

<h1>Create Log</h1>

{{ Form::open(array('route' => 'logs.store')) }}
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
            {{ Form::label('action', 'Action:') }}
            {{ Form::text('action') }}
        </li>

        <li>
            {{ Form::label('data', 'Data:') }}
            {{ Form::textarea('data') }}
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


