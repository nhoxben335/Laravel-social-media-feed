@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Adminstration </div>

                    <div class="card-body">
                        <form action="/admin" method="post"

                        @csrf

                        <a href="" class="container-fluid btn btn-dark" style="text-align: center"> Create New Admin User </a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>a</td>
                        <td>b</td>
                        <td>c</td>
                        <td>d</td>
                    </tr>
                    <tr>
                        <td>e</td>
                        <td>f</td>
                        <td>g</td>
                        <td>h</td>
                    </tr>
                    <tr>
                        <td>i</td>
                        <td>j</td>
                        <td>k</td>
                        <td>l</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
