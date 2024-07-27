<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Livre</title>
    <!-- Add the Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    @extends('Layaouts.master')
    @section('content')
<div class="container mt-5">
    <h1 class="text-center"> {{ Auth::user()->email }}</h1>
    <h1 class="mb-4">Détails du Livre</h1>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Année de Publication</th>
                <th>Nombre de Pages</th>
                <th>ID de l'Auteur</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $livre->titre }}</td>
                <td>{{ $livre->auteur->nom }} {{ $livre->auteur->prenom }}</td>
                <td>{{ $livre->annee_pub }}</td>
                <td>{{ $livre->nombre_de_pages }}</td>
                <td>{{ $livre->auteur_id }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('livres.index') }}" class="btn btn-primary">Retour à la liste des Livres</a>
</div>


@endsection

</body>
</html>


