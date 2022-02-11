<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/form.css">
    <title>Create account</title>
</head>
<body>



<?php include './db.php';?>
<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $firstName = $_POST["firstname"];
    $midleName = $_POST["midlename"];
    $lastName = $_POST["lastname"];
    $phone = $_POST["phone"];
    $national = $_POST["id"];
    $password = $_POST["pasword"];
    $amount = $_POST["amount"];
    $date = $_POST["datee"];
    // var_dump($_POST);
    

//sending information to database

 if(empty($errors)){
     $statement = $pdo->prepare("INSERT INTO accounts(firstName, midleName, LastName, phone, nationalid, pasword,amount, accountcreated)
    values(:firstname, :midlename, :lastname, :phone, :id, :pasword, :amount, :datee)");
    $statement->bindValue("firstname", $firstName);
    $statement->bindValue("midlename", $midleName);
    $statement->bindValue("lastname", $lastName);
    $statement->bindValue("phone",  $phone ); 
    $statement->bindValue("id", $national );
    $statement->bindValue("pasword", $password );
    $statement->bindValue("amount",  $amount );
    $statement->bindValue("datee",  $date  );
    $statement->execute();
    header("location:tables.php");
 }
}
?>


<section class="inpute-field">
    <div class="heading">One Way Banking System</div>

 <form action="form.php" method="POST">

    <label for="firstname">FirstName</label>

    <input class="name"  type="text" name="firstname" required>

    <label for="lastname">MidleName</label>

    <input class="name" type="text" name="midlename" >

    <label for="lastname"> LastName</label>

    <input class="name" type="text" name="lastname">
     <br>
    <label class="phone" for="Phone">Phone</label>

    <input type="text" class="input-phone" name="phone" required>
    
    <label class="id" for="id">National ID</label>

    <input type="text" class="inputinput" name="id" required>
    
    <label class="password" for="password">Password</label>
    
    <input class="inputpassword" type="password" name="pasword">
    <br>
    <label class="amount" for="amount">Amount</label>

    <input class="inputamount" type="text" name="amount" placeholder="Ksh" >

    <label class="date" for="date">Date</label>

    <input class="inputdate" type="date" name="datee">
     <br>
     <input class="submit" type="submit" value="submit">

   
 </form>
</section>
</body>
</html>

<!-- <style>
    .inpute-field{
    background-color:#cddeff70;
    height: 1000px;
    width: 100%;
   
} -->
</style>