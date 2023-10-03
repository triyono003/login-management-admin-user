<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>login dulu</h1>
  <form action="{{ url('proses_login') }}"method="post">
    @csrf
    <input type="text"name="username"> <br>
    <input type="text"name="password"> <br>
    <button tyoe="submit">login</button>
  </form>
</body>
</html>