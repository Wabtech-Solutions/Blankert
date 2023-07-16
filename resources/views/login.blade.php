<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
    <form method="POST">
        @csrf
        <input type="email" name="Email" value="{{request()->old("Email")}}" placeholder="Email" id="Email">
        <input type="password" name="Password" placeholder="Wactwoord" id="Password">
        <button type="submit" name="Login" id="Login">Login</button>
    </form>
</body>
</html>
