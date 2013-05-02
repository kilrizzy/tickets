@extends('layouts.scaffold')

@section('main')

<h1>Edit Status</h1>
{{ Form::model($status, array('method' => 'PATCH', 'route' => array('statuses.update', $status->id))) }}
    <ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('statuses.show', 'Cancel', $status->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop