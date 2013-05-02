@extends('layouts.scaffold')

@section('main')

<h1>Show File</h1>

<p>{{ link_to_route('files.index', 'Return to all files') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Ticket_id</th>
				<th>User_id</th>
				<th>Type</th>
				<th>File</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{ $file->ticket_id }}</td>
					<td>{{ $file->user_id }}</td>
					<td>{{ $file->type }}</td>
					<td>{{ $file->file }}</td>
                    <td>{{ link_to_route('files.edit', 'Edit', array($file->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('files.destroy', $file->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop