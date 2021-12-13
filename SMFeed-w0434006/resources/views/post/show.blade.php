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
                    <div class="card-header">Showing Post: {{$post->id}}</div>
                    <div class="card-body">

                        ID: {{$posts->id}}<br>
                        Title: {{$posts->title}}<br>
                        Content: {{$posts->content}}<br>
                        Created by user with ID: {{$posts->created_by}}<br>
                        Created at: {{$posts->created_at}}<br>
                        Updated at: {{$posts->updated_at}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
