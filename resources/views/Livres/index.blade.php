<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Livres</title>
    <!-- Add the Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    @extends('Layaouts.master')
    @section('content')
<div class="container mt-5">
    <h1 class="text-center"> {{ Auth::user()->email }}</h1>
    <h1>Liste des Livres</h1>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($livres as $livre)
                <tr>
                    <td><h3>{{ $livre->titre }}</h3></td>
                    <td>{{ $livre->auteur->nom }} {{ $livre->auteur->prenom }}</td>
                    <td>
                        <a href="{{ route('livres.edit', $livre->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="{{ route('livres.confirm', $livre->id) }}" class="btn btn-danger btn-sm">Supprimer</a>

                        <a href="{{ route('livres.show', $livre->id) }}" class="btn btn-info btn-sm">Show</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $livres->links() }}

    <a href="{{ route('livres.create') }}" class="btn btn-primary">Ajouter un Livre</a>
</div>

@endsection

</body>
</html>



