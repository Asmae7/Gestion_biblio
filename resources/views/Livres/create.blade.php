<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Nouveau Livre</title>
    <!-- Add the Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    @extends('Layaouts.master')
    @section('content')
<div class="container mt-5">
    <h1>Ajouter un Nouveau Livre</h1>

    <form method="post" action="{{ route('livres.store') }}">
        @csrf

        <div class="form-group">
            <label for="titre">Titre :</label>
            <input type="text" class="form-control" name="titre" value="{{ old('titre') }}">
            @error('titre')
            <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="annee_pub">Année de Publication :</label>
            <input type="text" class="form-control" name="annee_pub" value="{{ old('annee_pub') }}" >
            @error('annee_pub')
            <p style="color: red">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="nombre_de_pages">Nombre de Pages :</label>
            <input type="text" class="form-control" name="nombre_de_pages" value="{{ old('nombre_de_pages') }}">
            @error('nombre_de_pages')
            <p style="color: red">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="auteur_id">Auteur :</label>
            <select class="form-control" name="auteur_id" >
                @foreach($auteurs as $auteur)
                    <option value="{{ $auteur->id }}" {{ old('auteur_id') == $auteur->id ? 'selected' : '' }}>
                        {{ $auteur->nom }} {{ $auteur->prenom }}
                    </option>
                @endforeach
            </select>
            @error('auteur_id')
            <p style="color: red">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Ajouter Livre</button>
    </form>
</div>
@endsection
</body>
</html>

