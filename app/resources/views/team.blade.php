<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        
    </head>
    @auth
    <body class="antialiased">
                    <h1>Création d'une team</h1>
                    <form action="{{route('TeamController')}}" method="get">
                            <label for="fname">Nouvelle team</label><br>
                            <input type="name" id="name" name="name"><br><br>
                            <input type="submit" value="Submit">
                            @if ($errors->any())
        
        
        
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        </form>
                  

    </body>
    @endauth
</html>
