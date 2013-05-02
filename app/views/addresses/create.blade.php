@extends('layouts.scaffold')

@section('main')

<h1>Create Address</h1>

{{ Form::open(array('route' => 'addresses.store')) }}
    <ul>
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


