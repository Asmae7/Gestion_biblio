<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un nouvel auteur</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    @extends('Layaouts.master')
    @section('content')
<div class="container">
    <h1 class="text-center"> {{ Auth::user()->email }}</h1>
    <h1>Ajouter un nouvel auteur</h1>

    <form method="post" action="{{ route('auteur.store') }}">
        @csrf

        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" name="nom" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" class="form-control" name="prenom" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter l'auteur</button>
    </form>
</div>

@endsection
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



