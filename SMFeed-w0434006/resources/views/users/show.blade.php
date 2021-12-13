@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Detail</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Name: {{ $user->name }}
                        <br>
                        Email: {{ $user->email }}
                        <br>
                        @foreach($user->roles as $role)
                                Role: {{ $role->name }}
                        @endforeach
                        <br>
                        <br>
                        <a class="btn btn-md btn-primary" href="/admin/users" role="button">Back to User List</a>
                        <a class="btn btn-warning" href="/admin/users/{{ $user->id }}/edit" role="button">Edit</a>
                        @method('DELETE')
                        @csrf
                        <a href="/admin/users" type="submit" class="btn btn-danger" method="post">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
