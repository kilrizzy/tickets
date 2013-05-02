@extends('layouts.scaffold')

@section('main')

<h1>Edit Schedule</h1>
{{ Form::model($schedule, array('method' => 'PATCH', 'route' => array('schedules.update', $schedule->id))) }}
    <ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('schedules.show', 'Cancel', $schedule->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop