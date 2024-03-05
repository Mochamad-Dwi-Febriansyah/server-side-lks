<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SERVER SIDE</title> 
    <link rel="stylesheet" href="{{ url('css/auth.css') }}">
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            @csrf
            <h1>USER REGISTER</h1>
            <div class="form-input">
                <input type="text" name="name" placeholder="NAME">
                @if ($errors->has('name'))  {{ $errors->first('name') }}  @endif
                <input type="text" name="email" placeholder="EMAIL">
                @if ($errors->has('email'))  {{ $errors->first('email') }}  @endif
                <input type="text" name="username" placeholder="USERNAME">
                @if ($errors->has('username'))  {{ $errors->first('username') }}  @endif
                <input type="text" name="password" placeholder="PASSSWORD">
                @if ($errors->has('password'))  {{ $errors->first('password') }}  @endif
            </div>
            <div class="form-button">
                <button type="submit">REGISTER</button>
            </div>
        </form>
        <div class="br"></div>
        <div class="form-buttonn">
            <a href="{{ url('/') }}" class="bn">LOGIN</a>
        </div>
    </div>
</body>
</html>