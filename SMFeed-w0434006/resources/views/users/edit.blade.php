@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        @foreach($roles as $role)
                            <div type="form-check">
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}">
                            <label>{{ $role->name }}</label>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
