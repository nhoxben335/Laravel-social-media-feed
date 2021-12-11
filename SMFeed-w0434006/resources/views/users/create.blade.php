@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form method="post" action="admin/users/{{ $user->id }}">
                            @csrf

                            @method('PUT')

                            <div class="form-group">
                                <label for="title">Name:</label>
                                <input type="text" class="form-control" name="title" id="post_title" value={{ $user->name }}>
                            </div>
                            <div class="form-group">
                                <label for="price">Email:</label>
                                <textarea name="body" id="post_body" class="form-control">{{ $user->email }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Role:</label>
                                    @foreach($roles as $role)

                                    @endforeach
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
