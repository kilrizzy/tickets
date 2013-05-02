@extends('layouts.scaffold')

@section('main')

<h1>All Addresses</h1>

<p>{{ link_to_route('addresses.create', 'Add new address') }}</p>

@if ($addresses->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Client_id</th>
				<th>Address1</th>
				<th>Address2</th>
				<th>City</th>
				<th>State</th>
				<th>Zipcode</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($addresses as $address)
                <tr>
                    <td>{{ $address->client_id }}</td>
					<td>{{ $address->address1 }}</td>
					<td>{{ $address->address2 }}</td>
					<td>{{ $address->city }}</td>
					<td>{{ $address->state }}</td>
					<td>{{ $address->zipcode }}</td>
                    <td>{{ link_to_route('addresses.edit', 'Edit', array($address->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('addresses.destroy', $address->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no addresses
@endif

@stop