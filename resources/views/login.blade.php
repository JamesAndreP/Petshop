<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{'/css/login.css'}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <title>Document</title>
</head>
<body>
    <div class="centered">
        <figure>
            <img class="logo" src="{{url('/img/logo1.jpg')}}" alt="logo">
        </figure>
        <form action="{{url('/login')}}" method="POST">
            @csrf
            <input type="text" placeholder="Username" name="username" required='required' autocomplete="off">
            <input type="password" placeholder="Password" name="password" required='required' autocomplete="off">
            <button type="submit">login</button>
        </form>
    </div>
</body>
</html>