
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        @yield('title','DO Project 4')
    </title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" type='text/css' rel='stylesheet'>
    <link href="{{ asset('/css/layout.css') }}" type='text/css' rel='stylesheet'>
    @yield('head')
</head>

<body>
    @if(Session::get('message') != '')
        <div class='flash_message'>{{ Session::get('message') }}</div>
    @endif
    <br />
    <div class="container">
        <div class="header clearfix">
            <nav>
                <ul class="nav nav-pills pull-right">
                    @if(Auth::check())
                    <li role="presentation"><a href="#">Hello {{Auth::user()->name}}</a></li>
                    <li role="presentation" class="active"><a href="/logout">Logout</a></li>
                    @endif
                </ul>
            </nav>
            <h3 class="text-muted"><a href="/">Task Manager</a></h3>
        </div>
        <section>
            @yield('content')
        </section>

        <footer>
            <p>&copy; {{ date('Y') }} DO Project 4.</p>
        </footer>
    </div>
    @yield('body')
</body>
</html>
