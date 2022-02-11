<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <title>Login Page</title>
</head>
<body style="background-image: url(image/Digital-Banking.png); background-repeat: no-repeat;background-size: cover;">
   <h3>Login</h3>

  <section class="inpute-forms">  
<form action="login.php" action="post">
    <label for="email">Username</label>
    <br>
    <input id="input" name="email" type="email"  required>
    <br><br>
    <label for="password">Password</label>
    <br>
    <input id="input" name="password" type="password"  required>

    <input id="login" name="login" type="submit" value="login">
    <hr>
    
    <div class="links">
        <ul>
   <li><a class="forget-password" href="#">forget password?</a></li> 
   <li><a class="account" href="signup.php">crerate account</a></li>
        </ul>
    </div>
        
    </section>
</form>
</body>
</html>