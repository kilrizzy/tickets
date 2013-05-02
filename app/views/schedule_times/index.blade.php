@extends('layouts.scaffold')

@section('main')

<h1>All Schedule_times</h1>

<p>{{ link_to_route('schedule_times.create', 'Add new schedule_time') }}</p>

@if ($schedule_times->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Schedule_id</th>
				<th>Hour</th>
				<th>Day</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($schedule_times as $schedule_time)
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
            @endforeach
        </tbody>
    </table>
@else
    There are no schedule_times
@endif

@stop