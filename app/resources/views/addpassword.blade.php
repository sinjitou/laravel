<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ajouter un mot de passe</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->

</head>

<body>
    <h1>Ajouter un mot de passe</h1>
    <form action="{{ route('addpasswordreq') }}" method="POST">
    @csrf
    <div>
        <label for="link_website">Lien du site</label>
        <input value="{{ old('link_website') }}" type="text" name="link_website" id="link_website" class="@error('link_website') is-invalid @enderror">
        @error('link_website')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>
    <div>
        <label for="email">Email de connexion</label>
        <input value="{{ old('email') }}" type="email" name="email" id="email">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input value="{{ old('password') }}" type="password" name="password" id="password">
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <button type="submit">Envoyer</button>
</form>

</body>

</html>