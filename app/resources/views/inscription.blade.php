<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <h1>Formulaire de Gestionnaire de Mots de Passe</h1>
        <form action="{{ route('user.getForm') }}" method="post">
            @csrf
            <label for="site">Nom du site ou de l'application :</label>
            <input type="text" id="site" name="site" required><br><br>
            @if($errors->has('site'))
                <div class="text-danger">{{ $errors->first('site') }}</div>
            @endif
    
            <label for="mail">Adresse e-mail associée :</label>
            <input type="mail" id="mail" name="mail" required><br><br>
            @if($errors->has('mail'))
                <div class="text-danger">{{ $errors->first('mail') }}</div>
            @endif
    
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            @if($errors->has('password'))
                <div class="text-danger">{{ $errors->first('password') }}</div>
            @endif
    
            <input type="submit" value="Enregistrer">
        </form>
</body>
</html>