@extends('layouts.scaffold')

@section('main')

<h1>Show Schedule</h1>

<p>{{ link_to_route('schedules.index', 'Return to all schedules') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{ $schedule->name }}</td>
                    <td>{{ link_to_route('schedules.edit', 'Edit', array($schedule->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('schedules.destroy', $schedule->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop