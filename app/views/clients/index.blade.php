@extends('layouts.scaffold')

@section('main')

<h1>All Clients</h1>

<p>{{ link_to_route('clients.create', 'Add new client') }}</p>

@if ($clients->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>User_id</th>
				<th>Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->user_id }}</td>
					<td>{{ $client->name }}</td>
                    <td>{{ link_to_route('clients.edit', 'Edit', array($client->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('clients.destroy', $client->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no clients
@endif

@stop