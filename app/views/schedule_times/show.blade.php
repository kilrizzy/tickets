@extends('layouts.scaffold')

@section('main')

<h1>Show Schedule_time</h1>

<p>{{ link_to_route('schedule_times.index', 'Return to all schedule_times') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Schedule_id</th>
				<th>Hour</th>
				<th>Day</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{ $schedule_time->schedule_id }}</td>
					<td>{{ $schedule_time->hour }}</td>
					<td>{{ $schedule_time->day }}</td>
                    <td>{{ link_to_route('schedule_times.edit', 'Edit', array($schedule_time->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('schedule_times.destroy', $schedule_time->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop