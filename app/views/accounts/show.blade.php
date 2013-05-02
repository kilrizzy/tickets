@extends('layouts.scaffold')

@section('main')

<h1>Show Account</h1>

<p>{{ link_to_route('accounts.index', 'Return to all accounts') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{ $account->name }}</td>
                    <td>{{ link_to_route('accounts.edit', 'Edit', array($account->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('accounts.destroy', $account->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop