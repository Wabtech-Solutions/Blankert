<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    @if ($user->role == 2)
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="login">
            <form method="POST">
                @csrf
                <input type="name" name="name" placeholder="Naam" id="naam">
                <input type="email" name="Email" value="{{ request()->old('Email') }}" placeholder="Email"
                    id="Email">
                <input type="password" name="Password" placeholder="Wactwoord" id="Password">
                <select name="role" id="role">
                    <option value="1">Gebruiker</option>
                    <option value="2">Administrator</option>
                </select>
                <button type="submit" name="Login" id="Login">Maak gebruiker aan</button>
            </form>
        </div>
    @endif
    @if ($user->role == 1)
        @include('welcome')
    @endif
    <a href="{{ url('/logout') }}"> logout </a>
</body>

</html>
