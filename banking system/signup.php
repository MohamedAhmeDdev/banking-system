<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/signup.css">
    <title>SignUp</title>
</head>
<body>
   


<?php include './db.php'; ?>
<?php 

//creating varriables
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $firstName = $_POST["firstname"];
    $email = $_POST["email"];
    $password = $_POST["pasword"];
    //  var_dump($_POST);

//errors reduction
$errors = [];

if(!$firstName){
    $errors[] ='firstname required';
}
$errors = [];
if(!$email){
    $errors[] = 'email required';
}
$errors = [];
if(!$password){
    $errors[] ='password required';
}


 //sinding to database

if(empty($errors)){
$statement = $pdo->prepare("INSERT INTO registration(firstName,email, pasword )
values(:firstname,:email, :pasword)");
$statement->bindValue("firstname", $firstName);
$statement->bindValue("email", $email);
$statement->bindValue("pasword", $password);
$statement->execute();
header("location:dashboard.php");
}
}
?>



<h3 class="signup">SignUp</h3>

<section class="form-information">
    <h3>one way bank</h3>

<?php if (!empty($errors)) : ?>
     <?php foreach ($errors as $error): ?>
        <p><?php echo $error; ?></p>
        <?php endforeach; ?>
        <?php endif; ?>

    <form action="signup.php" method="POST">

     <div class="name-input">
        <label for="name-input">Name</label>
        <br>
        <input type="text" id="name" name="firstname" placeholder="Enter Name">
     </div>
        <br>
        
    <div class="email-input">
        <label for="email">Email</label>
        <br>
        <input type="email" id="email" name="email" placeholder="Email@.com">
    </div>
        <br>
    <div class="password-input">
        <label for="password">Password</label>
        <br>
        <input type="password" id="password" name="pasword" placeholder="Enter password">
    </div>

    <input type="submit" name="submit" id="submit" value="SUBMIT">
    </form>
</section>

</body>
</html>