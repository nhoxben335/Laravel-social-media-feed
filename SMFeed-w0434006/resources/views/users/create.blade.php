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
                    <div class="card-header">Showing User: {{$user->name}}</div>
                    <div class="card-body">
                        ID: {{$users->id}}<br>
                        Name: {{$users->name}}<br>
                        Email: {{$users->email}}<br>
                        Roles: {{$users->roles}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
