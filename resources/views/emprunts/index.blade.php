<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des emprunts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
@extends('Layaouts.master')
@section('content')
<div class="container mt-5">
    <h1>Liste des emprunts</h1>
    <div class="mb-3">
        <a href="{{ route('emprunts.create') }}" class="btn btn-primary">Ajouter un emprunt</a>
        <form action="" method="GET" id="search-form">
            @csrf
            <ul>
                <li><h1 style="color: green">Rechercher les emprunts par date</h1></li>
                <li>
                    <label for="start_date">Date de début :</label>
                    <input type="date" name="start_date" id="start_date" value="{{ request()->start_date }}">
                </li>
                <li>
                    <label for="end_date">Date de fin :</label>
                    <input type="date" name="end_date" id="end_date" value="{{ request()->end_date }}">
                </li>
                <li>
                    <button type="submit" class="btn btn-primary" >Rechercher</button>
                </li>
            </ul>
        </form>
    </div>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Titre du livre</th>
                <th>Auteur</th>
                <th>Date d'emprunt</th>
                <th>Date de retour</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($emprunts as $emprunt)
            <tr>
                <td>{{ $emprunt->livre->titre }}</td>
                <td>{{ $emprunt->livre->auteur->nom }}</td>
                <td>{{ $emprunt->date_emprunt }}</td>
                <td>{{ $emprunt->date_retour }}</td>
                <td>
                    <a href="{{ route('emprunts.edit', $emprunt->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                    <form action="{{ route('emprunts.destroy', $emprunt->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $emprunts->links() }}
</div>
@endsection

</body>
</html>
