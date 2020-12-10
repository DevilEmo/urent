<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    
    <style>
    html{
        background-image: url(../images/home.png);
        background-size: cover;
        background-attachment:fixed;
    }
    body{
        font-family: 'Titillium Web', sans-serif;
    }
    .card-group-item{
        border-top: 4px solid darkcyan;
        border-radius: 5px;
        letter-spacing: 3px;
        margin-bottom: 10px;
    }
    .active{
       
    }
 </style>

</head>
<body>
    <div id="app">
        @include('inc.navbar')
        <main>
            <div class="container-fluid pt-3">
                    @include('inc/messages')
                    @yield('content')
            </div>
                
            </div>
        </main>
</body>
</html>
