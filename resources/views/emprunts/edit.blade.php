<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un emprunt</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    @extends('Layaouts.master')
@section('content')
    <div class="container">
        <h1 class="text-center"> {{ Auth::user()->email }}</h1>
        <h1>Modifier un emprunt</h1>
        <form method="post" action="{{ route('emprunts.update', $emprunt->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="livre_id">Livre :</label>
                <select name="livre_id" class="form-control">
                    @foreach($livres as $livre)
                        <option value="{{ $livre->id }}" {{ $emprunt->livre_id == $livre->id ? 'selected' : '' }}>
                            {{ $livre->titre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date_emprunt">Date d'emprunt :</label>
                <input type="date" name="date_emprunt" class="form-control" value="{{ $emprunt->date_emprunt }}">
            </div>

            <div class="form-group">
                <label for="date_retour">Date de retour :</label>
                <input type="date" name="date_retour" class="form-control" value="{{ $emprunt->date_retour }}">
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </form>
    </div>
    @endsection
</body>
</html>
