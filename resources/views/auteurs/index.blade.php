<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des auteurs</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    @extends('Layaouts.master')
    @section('content')
<div class="container">
    <h1 class="text-center"> {{ Auth::user()->email }}</h1>
    <h1>Liste des auteurs</h1>
    <a href="{{ route('auteur.create') }}">ajouter un auteur</a>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($auteurs as $auteur)
                <tr>
                    <td>{{ $auteur->nom }}</td>
                    <td>{{ $auteur->prenom }}</td>
                    <td>
                        {{-- <a href="{{ route('auteur.show',$auteur->id) }}" class="btn btn-info btn-sm">Show</a> --}}
                        <a href="{{ route('auteur.edit', $auteur->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('auteur.destroy', $auteur->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Affichage de la pagination -->
    {{ $auteurs->links() }}
</div>
@endsection

</body>
</html>


