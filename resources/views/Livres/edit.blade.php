<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Livre</title>
    <!-- Add the Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    @extends('Layaouts.master')
    @section('content')
<div class="container mt-5">
    <h1 class="text-center"> {{ Auth::user()->email }}</h1>
    <h1>Modifier le Livre</h1>

    <form method="post" action="{{ route('livres.update',  $livre->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="titre">Titre :</label>
            <input type="text" class="form-control" name="titre" value="{{ $livre->titre }}" required>
        </div>

        <div class="form-group">
            <label for="annee_pub">Année de Publication :</label>
            <input type="text" class="form-control" name="annee_pub" value="{{ $livre->annee_pub }}" required>
        </div>

        <div class="form-group">
            <label for="nombre_de_pages">Nombre de Pages :</label>
            <input type="text" class="form-control" name="nombre_de_pages" value="{{ $livre->nombre_de_pages }}">
        </div>

        <div class="form-group">
            <label for="auteur_id">Auteur :</label>
            <select class="form-control" name="auteur_id" required>
                @foreach($auteurs as $auteur)
                    <option value="{{ $auteur->id }}" @if($auteur->id === $livre->auteur_id) selected @endif>
                        {{ $auteur->nom }} {{ $auteur->prenom }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Modifier Livre</button>
    </form>
</div>


@endsection

</body>
</html>


