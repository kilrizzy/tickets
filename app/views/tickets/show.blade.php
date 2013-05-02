@extends('layouts.scaffold')

@section('main')

<h1>Show Ticket</h1>

<p>{{ link_to_route('tickets.index', 'Return to all tickets') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>User_id</th>
				<th>Technician_id</th>
				<th>Client_id</th>
				<th>Address1</th>
				<th>Address2</th>
				<th>City</th>
				<th>State</th>
				<th>Zipcode</th>
				<th>Priority_id</th>
				<th>Status_id</th>
				<th>Description</th>
				<th>Estimated_time</th>
				<th>Completion_time</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{ $ticket->user_id }}</td>
					<td>{{ $ticket->technician_id }}</td>
					<td>{{ $ticket->client_id }}</td>
					<td>{{ $ticket->address1 }}</td>
					<td>{{ $ticket->address2 }}</td>
					<td>{{ $ticket->city }}</td>
					<td>{{ $ticket->state }}</td>
					<td>{{ $ticket->zipcode }}</td>
					<td>{{ $ticket->priority_id }}</td>
					<td>{{ $ticket->status_id }}</td>
					<td>{{ $ticket->description }}</td>
					<td>{{ $ticket->estimated_time }}</td>
					<td>{{ $ticket->completion_time }}</td>
                    <td>{{ link_to_route('tickets.edit', 'Edit', array($ticket->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('tickets.destroy', $ticket->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop