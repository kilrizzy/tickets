@extends('layouts.scaffold')

@section('main')

<h1>All Logs</h1>

<p>{{ link_to_route('logs.create', 'Add new log') }}</p>

@if ($logs->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Ticket_id</th>
				<th>User_id</th>
				<th>Action</th>
				<th>Data</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($logs as $log)
                <tr>
                    <td>{{ $log->ticket_id }}</td>
					<td>{{ $log->user_id }}</td>
					<td>{{ $log->action }}</td>
					<td>{{ $log->data }}</td>
                    <td>{{ link_to_route('logs.edit', 'Edit', array($log->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('logs.destroy', $log->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no logs
@endif

@stop