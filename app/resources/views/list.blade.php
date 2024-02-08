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
                    <h1>{{__('info.mdp-list')}}</h1>
                    @foreach ($info as $info)
                        <p>{{__('info.site')}}{{ $info->site }}</p>
                        <p>{{__('info.login')}}{{ $info->login }}</p>
                        <a href="edit" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        {{__('info.pwd')}}{{ $info->password }}</a><br>
                    @endforeach


                 <div>
                    <h1>{{__('info.team-list')}}</h1>
                    @foreach ($teams as $infoteam)
                        <form action="{{ route('keepTeam') }}" method="post" class="inline">
                            @csrf
                            <input type="hidden" name="teamId" value="{{ $infoteam->id }}">
                            <button type="submit" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">{{__('info.team')}}{{ $infoteam->name }}</button>
                        </form>
                        <br>
                    @endforeach  


                </div>



    </body>
    @endauth
</html>
