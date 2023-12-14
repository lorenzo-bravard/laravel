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
                    <h1>Ajouter quelqu'un à la team</h1>
                    <form action="{{route('TeamController')}}" method="post">
                            @csrf

                            
                            <label>
                                <input type="checkbox" name="option1" value="1">
                                Option 1
                            </label>
                            <br>
                    
                            <label>
                                <input type="checkbox" name="option2" value="2">
                                Option 2
                            </label>
                            <br>
                    
                            <label>
                                <input type="checkbox" name="option3" value="3">
                                Option 3
                            </label>
                            <br>
                    
                            <!-- Ajoutez autant d'options que nécessaire -->
                    
                            <br>
                            <bu
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
