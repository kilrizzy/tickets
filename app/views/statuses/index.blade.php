@extends('layouts.scaffold')

@section('main')

<h1>All Statuses</h1>

<p>{{ link_to_route('statuses.create', 'Add new status') }}</p>

@if ($statuses->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($statuses as $status)
                <tr>
                    <td>{{ $status->name }}</td>
                    <td>{{ link_to_route('statuses.edit', 'Edit', array($status->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('statuses.destroy', $status->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no statuses
@endif

@stop