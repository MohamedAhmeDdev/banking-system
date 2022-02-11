<style>

.sidebar{
    background-color: rgba(255, 255, 255, 0.014);
    box-shadow:   2px 0 5px;
    height: 70px;
    width: 100%;
}
.navigation ul{
    display:flex;
}
ul li{
    position: relative;
    left: 300px;
    padding: 20px 50px;
    list-style: none;
}
ul li a{
    text-decoration: none;
    font-size: 25px;
}
.account:hover{
    box-shadow: inset 0px 0px 15px lightblue;
}
.form:hover{
    box-shadow: inset 0px 0px 15px lightblue;
}
.logout {
    border-radius: 25px 25px 25px 25px ;
    height: 30px;
    padding: 5px 7px;
    background-color: lightblue;
    position:absolute;
    right: 30px;
    top: 20px;
   font-size:17px;
   text-decoration:none;
}

</style>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>
</head>
<body>
    
<section class="sidebar">
    <div class="navigation">
        <ul>
        <li class="account"><a href="dashboard.php?id=Account">Account</a></li>
            <li class="form"><a href="dashboard.php?id=Form">Form</a></li>
        </ul>
    </div>
       <a class="logout" href="login.php">Logout</a>
</section>

</body>
</html>

<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];
    switch ($id) {
        case 'Account':
            include "account.php";
            break;
        case 'Form':
            include "form.php";
            break;
    
            
        default:
            # code...
            break;
    }
}
?>

