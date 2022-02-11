<!-- <link rel="stylesheet" href="style/table.css"> -->
<!-- <link rel="stylesheet" href="style/table.css"> -->
<style>
    .account-table{
    border-collapse: collapse;
    width: 100%;
    font-size: 20px;
    border: 2px solid lightblue;
}

.account-table th{
    border-bottom: 2px solid lightblue;
    color: rgba(0, 0, 0, 0.651);
    padding: 10px 8px;
}
.account-table td{
    color: blue;
    padding: 8px 8px;
}

.control{
    border: none;
    display: flex;
    justify-content: space-evenly;
}

.control-buttons{
    padding: 10px 20px;
    outline: none;
    border: none;
}
.control-buttons.update{
    background-color: greenyellow;
}
.control-buttons.delete{
    background-color: lightblue;
}
</style>
<?php include './db.php';

$statement= $pdo->prepare("SELECT * FROM accounts");
$statement->execute();
$accounts = $statement->fetchall(PDO::FETCH_ASSOC);
?>

 <table class="account-table" border="1">

<thead>
    <tr>
        <th>account ID</th>
        <th>FirstName</th>
        <th>MidleName</th>
        <th>LastName</th>
        <th>Phone NO:</th>
        <th>National ID</th>
        <th>Password</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Edit</th>
    </tr>
    
</thead>

<tbody>
    <?php foreach($accounts as $account):?>
    <tr>
        <td><?php echo $account["accountID"]; ?></td>
        <td><?php echo $account ["firstName"]; ?></td>
        <td><?php echo $account ["midleName"]; ?></td>
        <td><?php echo $account["lastName"]; ?></td>
        <td><?php echo $account["phone"]; ?></td>
        <td><?php echo $account["nationalid"]; ?></td>
        <td><?php echo $account["pasword"]; ?></td>
        <td><?php echo $account["amount"]; ?></td>
        <td><?php echo $account["accountcreated"]; ?></td>
        <td class="control">

           <a href="update.php?id=<?php
            echo $account["accountID"]; ?>">
             <button class="control-buttons update">Update</button>
            </a>

           <form action="delete.php" method="post">
               <input type="hidden" name="id" value="<?php echo $account ["accountID"]; ?>">
                <button class="control-buttons delete" type="submit">Delete</button>
           </form>

        </td>
    </tr>
    <?php endforeach; ?>
</tbody>
</table>