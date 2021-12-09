@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Click Button Below To Start</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/admin/users" class="btn btn-dark" style="text-align: center"> Click Here</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
