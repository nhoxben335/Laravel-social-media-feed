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
                @php
                    use Illuminate\Support\Facades\DB;
                    use Illuminate\Support\Facades\Auth;

                    //show "create post" button if any user is logged in
                    if(!Auth::guest())
                    {
                        echo "<a href='/home/posts/create'><button class='btn btn-primary'>Create post</button></a>";
                    }

                    $postsIds = DB::table("posts")->orderBy("created_at", "desc")->pluck("id");
                    $activePosts = array();

                    foreach($postsIds as $postId)
                    {
                        //if post with id x is not soft deleted
                        if(DB::table("posts")->where("id", "=", $postId)->whereNull("deleted_at")->first() !== null)
                        {
                            //get post object with id x and add to active posts array
                            $activePost = DB::table("posts")->where("id", "=", $postId)->first();
                            array_push($activePosts, $activePost);
                        }
                    }

                    $currentUserRolesRows = DB::table("role_user")->where("user_id", "=", Auth::id())->get();
                    $isMod = false;

                    if($currentUserRolesRows !== null)
                    {
                        foreach($currentUserRolesRows as $row)
                        {
                            if($row->role_id == 2)
                            {
                                $isMod = true;
                                break;
                            }
                        }
                    }

                    foreach($activePosts as $post)
                    {
                        $showEdit = "";
                        $showDelete = "";

                        //if current user owns this post: show edit button
                        if($post->created_by == Auth::id())
                        {
                            $showEdit .= "<a href='/home/posts/" . $post->id . "/edit'><button class='btn btn-warning'>Edit</button></a>";
                        }

                        //if current user owns this post OR current user has moderator role: show delete button
                        if($post->created_by == Auth::id() || $isMod)
                        {
                            $showDelete .= "<form action='/home/posts/" . $post->id . "/delete' method='post'>"
                                . csrf_field() . "<button class='btn btn-danger'>Delete</button></form>";
                        }

                        echo "<div class='card'>
                            <div class='card-header'><h5>" . $post->title . "</h5></div>
                            <div class='card-body'>
                                <h4>" . $post->content . "</h4>
                                <h6>" . $post->created_at . "</h6>
                                <a href='/home/posts/" . $post->id . "'><button class='btn btn-primary'>Show</button></a>

                                " . $showEdit . $showDelete . "
                            </div>
                        </div><br>";
                    }
                @endphp
            </div>
        </div>
    </div>
@endsection
