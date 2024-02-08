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
                    <h1>{{__('edit-pwd.edit')}}</h1>
                    <form action="{{route('editPwd')}}" method="post">
                        @csrf
                            <label for="fname">{{__('edit-pwd.new')}}</label><br>
                            <input type="text" id="mdpEdit" name="mdpEdit"><br><br>
                            <input type="submit" value="{{__('edit-pwd.submit')}}">
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
