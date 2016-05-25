@extends('layouts.app')


@section('content')

    <div class="container">

        <div class="row">
            <div class="col-xs-12">
                <h3>
                    Create Tag
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
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection