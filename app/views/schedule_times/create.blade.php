@extends('layouts.scaffold')

@section('main')

<h1>Create Schedule_time</h1>

{{ Form::open(array('route' => 'schedule_times.store')) }}
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


