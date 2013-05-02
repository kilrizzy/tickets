@extends('layouts.scaffold')

@section('main')

<h1>Edit User</h1>
{{ Form::model($user, array('method' => 'PATCH', 'route' => array('users.update', $user->id))) }}
    <ul>
        <li>
            {{ Form::label('username', 'Username:') }}
            {{ Form::text('username') }}
        </li>

        <li>
            {{ Form::label('password', 'Password:') }}
            {{ Form::text('password') }}
        </li>

        <li>
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email') }}
        </li>

        <li>
            {{ Form::label('fname', 'Fname:') }}
            {{ Form::text('fname') }}
        </li>

        <li>
            {{ Form::label('lname', 'Lname:') }}
            {{ Form::text('lname') }}
        </li>

        <li>
            {{ Form::label('schedule_id', 'Schedule_id:') }}
            {{ Form::input('number', 'schedule_id') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('users.show', 'Cancel', $user->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop