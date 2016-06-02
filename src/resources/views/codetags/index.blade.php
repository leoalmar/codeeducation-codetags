@extends('layouts.app')


@section('content')

    <div class="container">

        <div class="row">
            <div class="col-xs-12">
                <h3>
                    Tags
                    <div class="form-group pull-right">
                        <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">Create Tag</a>
                    </div>
                </h3>
            </div>
        </div>

        <table class="table table-striped table-hover table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $key => $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <a class="btn btn-small btn-info" href="{{ route('admin.tags.edit', $tag->id) }}"><i class="fa fa-fw fa-pencil"></i></a>

                        {{ Form::open(['route' => ['admin.tags.delete', $tag->id], 'method' => 'DELETE', 'style' => 'display: inline;']) }}
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-fw fa-trash"></i>
                        </button>
                        {{ Form::close() }}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection