<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body>
  <form action={{route('handyman.register')}} method="POST">
    @csrf
    <label for="username">Username:</label>
    <input type="text" id="username" name="name"><br><br>
    <label for="username">Email:</label>
    <input type="text" id="username" name="email"><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>
    <label for="password"> C_Password:</label>
    <input type="password" id="password" name="c_password"><br><br>
    <input type="submit" value="Register">
    
  </form>
</body>
</html>
