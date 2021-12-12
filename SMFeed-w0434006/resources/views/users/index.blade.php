@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Adminstration </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="/admin/users/create" class="container-fluid btn btn-dark" style="text-align: center"> Create New Admin User </a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ implode(',', $user->roles()->get()->pluck('name')->toArray()) }}</td>
{{--                            @foreach($user->roles as $role)--}}
{{--                            <td>{{ $role->name }}</td>--}}
{{--                            @endforeach--}}
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-md btn-success" href="/admin/users/{{ $user->id }}" role="button">Show</a>
                                    <a class="btn btn-warning" href="/admin/users/{{ $user->id }}/edit" role="button">Edit</a>
                                    <form action="{{ route('users.destroy', $user ) }}" method="POST">
                                        @csrf
                                    <a href="/admin/users/{{ $user->id }}/destroy" type="submit" class="btn btn-danger" method="post">Delete</a>
                                    </form>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
