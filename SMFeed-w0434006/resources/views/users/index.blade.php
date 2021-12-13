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
                    <div class="card-header" style="text-align: center;">Manage Users</div>
                    @php
                        echo "<a href='/admin/users/create' style='text-align:center;'><button class='btn btn-primary' >Create user</button></a>";
                    @endphp
                    <div class="card-body">
                        @php
                            use Illuminate\Support\Facades\DB;
                            use Illuminate\Support\Facades\Auth;

                            $userIdsWithRoles = DB::table("role_user")->orderBy("user_id", "desc")->pluck("user_id");
                            $activeUsers = array(); //array of user objects

                            foreach($userIdsWithRoles as $userId)
                            {
                                //if not soft delete
                                if(DB::table("users")->where("id", "=", $userId)->whereNull("deleted_at")->first() !== null)
                                {
                                    //get user object with id x and add to array
                                    $activeUser = DB::table("users")->where("id", "=", $userId)->first();
                                    array_push($activeUsers, $activeUser);
                                }
                            }

                            $currentUserRolesRows = DB::table("role_user")->where("user_id", "=", Auth::id())->get();
                            $isUserAdmin = false;

                            if($currentUserRolesRows !== null)
                            {
                                foreach($currentUserRolesRows as $row)
                                {
                                    if($row->role_id == 1)
                                    {
                                        $isUserAdmin = true;
                                        break;
                                    }
                                }
                            }

                            foreach($activeUsers as $user)
                            {
                                $showEdit = "";
                                $showDelete = "";

                                //if current user is user admin: show edit and delete buttons
                                if($isUserAdmin)
                                {
                                    $showEdit .= "<a href='/admin/users/" . $user->id . "/edit'><button class='btn btn-warning'>Edit</button></a>";
                                    $showDelete .= "<form action='/admin/users/" . $user->id . "/delete' method='post'>"
                                        . csrf_field() . "<button class='btn btn-danger'>Delete</button></form>";
                                }

                                echo "<div>
                                        <h6>" . $user->email . "</h6>
                                        <a href='/admin/users/" . $user->id . "'><button class='btn btn-primary'>Show</button></a>"
                                        . $showEdit . $showDelete
                                    . "</div><br><br>";
                            }
                        @endphp
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
