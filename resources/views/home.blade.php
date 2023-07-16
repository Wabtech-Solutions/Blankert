<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if($user->role == 2)
    <form method="POST">
        @csrf
        <input type="name" name="name" placeholder="Naam" id="naam">
        <input type="email" name="Email" value="{{request()->old("Email")}}" placeholder="Email" id="Email">
        <input type="password" name="Password" placeholder="Wactwoord" id="Password">
        <input type="role" name="role" placeholder="role" id="role">
        <button type="submit" name="Login" id="Login">Login</button>
    </form>
    @endif
    @if($user->role == 1)
    @include('welcome')

    @endif
    <a href="{{ url('/logout') }}"> logout </a>
</body>

</html>
