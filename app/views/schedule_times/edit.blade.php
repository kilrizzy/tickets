@extends('layouts.scaffold')

@section('main')

<h1>Edit Schedule_time</h1>
{{ Form::model($schedule_time, array('method' => 'PATCH', 'route' => array('schedule_times.update', $schedule_time->id))) }}
    <ul>
        <li>
            {{ Form::label('schedule_id', 'Schedule_id:') }}
            {{ Form::input('number', 'schedule_id') }}
        </li>

        <li>
            {{ Form::label('hour', 'Hour:') }}
            {{ Form::input('number', 'hour') }}
        </li>

        <li>
            {{ Form::label('day', 'Day:') }}
            {{ Form::input('number', 'day') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('schedule_times.show', 'Cancel', $schedule_time->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop