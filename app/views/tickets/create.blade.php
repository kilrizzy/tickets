@extends('layouts.scaffold')

@section('main')

<h1>Create Ticket</h1>

{{ Form::open(array('route' => 'tickets.store')) }}
    <ul>
        <li>
            {{ Form::label('user_id', 'User_id:') }}
            {{ Form::input('number', 'user_id') }}
        </li>

        <li>
            {{ Form::label('technician_id', 'Technician_id:') }}
            {{ Form::input('number', 'technician_id') }}
        </li>

        <li>
            {{ Form::label('client_id', 'Client_id:') }}
            {{ Form::input('number', 'client_id') }}
        </li>

        <li>
            {{ Form::label('address1', 'Address1:') }}
            {{ Form::text('address1') }}
        </li>

        <li>
            {{ Form::label('address2', 'Address2:') }}
            {{ Form::text('address2') }}
        </li>

        <li>
            {{ Form::label('city', 'City:') }}
            {{ Form::text('city') }}
        </li>

        <li>
            {{ Form::label('state', 'State:') }}
            {{ Form::text('state') }}
        </li>

        <li>
            {{ Form::label('zipcode', 'Zipcode:') }}
            {{ Form::text('zipcode') }}
        </li>

        <li>
            {{ Form::label('priority_id', 'Priority_id:') }}
            {{ Form::input('number', 'priority_id') }}
        </li>

        <li>
            {{ Form::label('status_id', 'Status_id:') }}
            {{ Form::input('number', 'status_id') }}
        </li>

        <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::text('description') }}
        </li>

        <li>
            {{ Form::label('estimated_time', 'Estimated_time:') }}
            {{ Form::input('number', 'estimated_time') }}
        </li>

        <li>
            {{ Form::label('completion_time', 'Completion_time:') }}
            {{ Form::input('number', 'completion_time') }}
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


