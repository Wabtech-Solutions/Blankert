@extends('admin.admin')
@section('content')
    <?php date_default_timezone_set('Europe/Amsterdam');
    $h = date('G');
    if ($h >= 5 && $h <= 11) {
        $set = 'Goedemorgen ' . auth()->user()->name;
    } elseif ($h >= 12 && $h <= 15) {
        $set = 'Goedemiddag ' . auth()->user()->name;
    } else {
        $set = 'Ga naar huis ' . auth()->user()->name . '!';
    } ?>

@if (session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

    <div class="header">
        <div class="header-left">
            <h2> {{ $set }}</h2>
        </div>
    </div>

    <div class="admin-user-row2">
        <fieldset >
            <legend>Gebruikers</legend>
        <table class="blueTable">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Type gebruiker</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="tdText">{{ $user->name }}</td>
                        <td class="tdText2">{{ $user->email }}</td>
                        <td class="tdText">
                            @if ($user->role == 2)
                                Beheerder
                            @endif
                            @if ($user->role == 1)
                                Medewerker
                            @endif
                        </td>
                        <td class="tdBTN">
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button style="max-width: 200px" id="redbtn" type="submit">Verwijder</button>
                            </form>
                        </td>
                    </tr>
            </tbody>
            </tr>
            @endforeach
        </table>
        </fieldset>
    </div>
@endsection
