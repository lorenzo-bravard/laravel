
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
    <body class="antialiased">
        

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                

            <div class="mt-16">
                <form action="{{route('PwdCtrl')}}" method="post">
                @csrf
                    <label for="url">{{__('add-pwd.url')}}</label><br>
                    <input type="text" id="url" name="url" class="@error('url') is-invalid @enderror" required><br>
                    <label for="login">{{__('add-pwd.mail')}}</label><br>
                    <input type="text" id="login" name="login" required><br>
                    <label for="mdp">{{__('add-pwd.pwd')}}</label><br>
                    <input type="text" id="mdp" name="mdp" required><br><br>
                    <input type="submit" value="{{__('add-pwd.submit')}}">
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
            </div>
        </div>
    </body>
</html>
