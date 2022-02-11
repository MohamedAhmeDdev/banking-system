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
 
 $id = $_GET['id'] ?? null;

 if(!$id){
     header('location: index.php');
     exit;
 }
 $statement = $pdo->prepare("SELECT * FROM accounts WHERE accountID= :id");
 $statement->bindValue(":id", $id);   
 $statement->execute();
 $account = $statement->fetch(PDO::FETCH_ASSOC);
 
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
  
    $errors = []; 
    if(!$firstName){
        $errors[] = 'FirstName is Required';
}  
    $errors = []; 
    if(!$midleName){
    $errors[] = 'midleName is Required';
}      
    $errors = [];
    if(!$lastName){
        $errors[] = 'LastName is Required';
}
    $errors = [];
    if(!$phone){
        $errors[] = 'phone is Required';
} 
    $errors = []; 
    if(!$national){
    $errors[] = 'national id is Required';
}    

    $errors = []; 
    if(!$password){
    $errors[] = 'password is Required';
} 
    $errors = []; 
    if(!$amount){
    $errors[] = 'amount is Required';
}       
    $errors = []; 
    if(!$date){
    $errors[] = 'date is Required';
}    
//updating information to database

 if(empty($errors)){
     $statement = $pdo->prepare("UPDATE accounts SET firstName =:firstname, midleName = :midlename, LastName =:lastname,  phone =:phone,  nationalid =:id, pasword =:pasword, amount =:amount, accountcreated =:datee
     WHERE accountID= :id");
    $statement->bindValue("firstname", $firstName);
    $statement->bindValue("midlename", $midleName);
    $statement->bindValue("lastname", $lastName);
    $statement->bindValue("phone",  $phone ); 
    $statement->bindValue("id", $national );
    $statement->bindValue("pasword", $password );
    $statement->bindValue("amount",  $amount );
    $statement->bindValue("datee",  $date  );
    $statement->bindValue(":id", $id);  
    $statement->execute();
    header("location:tables.php");
 }
}
?>
<?php if(!empty($errors)): ?>
    <div class="">
        <?php foreach($errors as $error):?>
            <p><?php echo $error ?></p>
          <?php endforeach?>  
    </div>
    <?php endif ?>


<section class="inpute-field">
    <div class="heading">One Way Banking System</div>

 <form  method="POST">

    <label for="firstname">FirstName</label>

    <input class="name"  type="text" id="firstname" name="firstname" required
    value="<?php echo $account ["firstName"] ?>">

    <label for="lastname">MidleName</label>

    <input class="name" type="text" id="midlename" name="midlename" 
    value="<?php echo $account ["midleName"] ?>">

    <label for="lastname"> LastName</label>

    <input class="name" type="text" id="lastname" name="lastname"
    value="<?php echo $account ["lastName"] ?>">
     <br>
    <label class="phone" for="Phone">Phone</label>

    <input type="text" id="phone" class="input-phone" name="phone" required
    value="<?php echo $account ["phone"] ?>">
    
    <label class="id" for="id">National ID</label>

    <input type="text" id="id" class="inputinput" name="id" required
    value="<?php echo $account ["nationalid"] ?>">
    
    <label class="password" for="password">Password</label>
    
    <input class="inputpassword" id="pasword" type="password" name="pasword"
    value="<?php echo $account ["pasword"] ?>">
    <br>
    <label class="amount" for="amount">Amount</label>

    <input class="inputamount" id="amount" type="text" name="amount" placeholder="Ksh" 
    value="<?php echo $account ["amount"] ?>">

    <label class="date" for="date">Date</label>

    <input class="inputdate" id="date" type="date" name="datee"
    value="<?php echo $account ["accountcreated"] ?>">
     <br>
     <input class="submit" type="submit" value="submit">

   
 </form>
</section>
</body>
</html>
