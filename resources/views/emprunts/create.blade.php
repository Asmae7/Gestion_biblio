<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un nouvel emprunt</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    @extends('Layaouts.master')
    @section('content')
<div class="container mt-5">
    <h1 class="text-center"> {{ Auth::user()->email }}</h1>
    <h1>Ajouter un nouvel emprunt</h1>

    <form method="post" action="{{ route('emprunts.store') }}">
        @csrf

        <div class="form-group">
            <label for="livre_id">Choisir un livre :</label>
            <select class="form-control" name="livre_id" required>
                @foreach($livres as $livre)
                    <option value="{{ $livre->id }}">{{ $livre->titre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="date_emprunt">Date d'emprunt :</label>
            <input type="date" class="form-control" name="date_emprunt" value="{{ date('Y-m-d') }}" required>
        </div>

        <div class="form-group">
            <label for="date_retour">Date de retour  :</label>
            <input type="date" class="form-control" name="date_retour">
        </div>

        <button type="submit" class="btn btn-primary">Ajouter l'emprunt</button>
    </form>
</div>
@endsection
</body>
</html>
