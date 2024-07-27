<form action="{{ route('search') }}" method="GET" id="search-form">
    @csrf
    <ul>
        <li><h1 style="color: green">Rechercher les emprunts par date</h1></li>
        <li>
            <label for="start_date">Date de début :</label>
            <input type="date" name="start_date" id="start_date" >
        </li>
        <li>
            <label for="end_date">Date de fin :</label>
            <input type="date" name="end_date" id="end_date" >
        </li>
    </ul>
</form>

<table border="1">
    <tr>
        <td>ID de l'emprunt</td>
        <td>Date d'emprunt</td>

    </tr>
    @foreach ($emprunts as $emprunt)
    <tr>
        <td>{{ $emprunt->id }}</td>
        <td>{{ $emprunt->date_emprunt }}</td>

    </tr>
    @endforeach
</table>


