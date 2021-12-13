@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session()->has('message'))
                    <div class="alert {{session('alert') ?? 'alert-info'}}">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Create New User</div>
                    <div class="card-body">
                        <form action="/admin/users" method="post">
                            @csrf
                            <div class="form-group">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input name="name" type="text" class="form-control" value="{{old("name")}}" id="name">
                                        @error("name")
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input name="email" type="text" class="form-control" value="{{old("email")}}" id="email">
                                        @error("email")
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input name="password" type="password" class="form-control" id="password">
                                        @error("password")
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="checkbox" id="admin" name="roles[]" value="1" checked>
                                        <label for="admin">Administrator</label><br>
                                        <input type="checkbox" id="mod" name="roles[]" value="2">
                                        <label for="mod">Moderator</label><br>
                                        <input type="checkbox" id="themeManager" name="roles[]" value="3">
                                        <label for="themeManager">Theme Manager</label><br>
                                    </div>
                                </fieldset>
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
