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

                    echo "<a href='/home/themes/create'><button class='btn btn-primary'>Create theme</button></a>";

                    //find active themes (not soft deleted)
                    $themeIds = DB::table("themes")->orderBy("id", "desc")->pluck("id");
                    $activeThemes = array();

                    foreach($themeIds as $themeId)
                    {
                        //if theme with id x is not soft deleted
                        if(DB::table("themes")->where("id", "=", $themeId)->whereNull("deleted_at")->first() !== null)
                        {
                            //get theme object with id x and add to active themes array
                            $activeTheme = DB::table("themes")->where("id", "=", $themeId)->first();
                            array_push($activeThemes, $activeTheme);
                        }
                    }

                    //print themes cards
                    foreach($activeThemes as $theme)
                    {
                        $showEdit = "<a href='/home/themes/" . $theme->id . "/edit'><button class='btn btn-warning'>Edit</button></a>";
                        $showDelete = "<form action='/home/themes/" . $theme->id . "/delete' method='post'>"
                            . csrf_field() . "<button class='btn btn-danger'>Delete</button></form>";

                        echo "<div class='card'>
                            <div class='card-header'><h5>" . $theme->name . "</h5></div>
                            <div class='card-body'>
                                <h4>" . $theme->cdn_url . "</h4>
                                <h6>" . $theme->created_at . "</h6>
                                <a href='/home/themes/" . $theme->id . "'><button class='btn btn-primary'>Show</button></a>

                                " . $showEdit . $showDelete . "
                            </div>
                        </div><br>";
                    }
                @endphp
            </div>
        </div>
    </div>
@endsection
