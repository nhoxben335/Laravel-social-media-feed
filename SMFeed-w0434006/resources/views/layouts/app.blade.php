<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- fix dropdown menu -max -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Theme: <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @php
                                //find active themes (not soft deleted)
                                $themeIds = DB::table("themes")->orderBy("id", "asc")->pluck("id");
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

                                foreach($activeThemes as $activeTheme)
                                {
                                    echo '<a class="dropdown-item" href=""
                                        onclick="event.preventDefault();
                                            document.getElementById("select-theme-form").submit();">
                                    ' . $activeTheme->name . '</a>';
                                }
                            @endphp


                            <form id="select-theme-form" action="/home/themes/cookie" method="post" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        @php
                            //if user is a user admin or theme manager: show link
                            $currentUserRolesRows = DB::table("role_user")->where("user_id", "=", Auth::id())->get();

                            if($currentUserRolesRows !== null)
                            {
                                foreach($currentUserRolesRows as $row)
                                {
                                    if($row->role_id == 1)
                                    {
                                        echo '<li>
                                            <a id="manageUsersLink" class="nav-link" href="/admin/users"><span class="caret">Manage Users</span></a>
                                            </li>';
                                        break;
                                    }
                                    if($row->role_id == 3)
                                    {
                                        echo '<li>
                                            <a id="manageThemesLink" class="nav-link" href="/users/themes"><span class="caret">Manage Themes</span></a>
                                            </li>';
                                        break;
                                    }
                                }
                            }
                        @endphp

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
