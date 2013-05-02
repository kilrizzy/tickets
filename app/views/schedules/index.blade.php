@extends('layouts.scaffold')

@section('main')

<h1>All Schedules</h1>

<p>{{ link_to_route('schedules.create', 'Add new schedule') }}</p>

@if ($schedules->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->name }}</td>
                    <td>{{ link_to_route('schedules.edit', 'Edit', array($schedule->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('schedules.destroy', $schedule->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no schedules
@endif

@stop