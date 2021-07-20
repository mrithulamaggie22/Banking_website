<?php
    include "header.php";
?>
<?php
session_start();
$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"bankuser");
if ($con->connect_error) {
    header("location:connection_error.php?error=$con->connect_error");
    die($con->connect_error);
}
else
    echo '';



$flag=false;

if (isset($_POST['transfer']))
{
$sender=$_SESSION['sender'];
$receiver=$_POST["reciever"];
$amount=$_POST["amount"];?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    .body{
        background-color: #E4F5D4;
    }
    #class {
            text-align: center;
            color: #006600;
            font-size: 70px;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            }
    .footer{
            background: #555;
            color: ghostwhite;
            font-weight: 700;
            padding:3%;
            text-align: center;
            justify-content: center;
}
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALEX BANK</title>
    
<body class="body">
    
    
    



<?php

$sql = "SELECT balance FROM user WHERE name='$sender'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
 if($amount>$row["balance"] or $row["balance"]-$amount<100){
    echo "<script>swal( 'Error','Insufficient Balance!','error' ).then(function() { window. location = 'customer.php'; });;</script>";
    echo "<br><br><br><br><br><br><br><br><br><h2 id='class' >Insufficient Balance!</h2>";
   
 }
else{
    $sql = "UPDATE `user` SET balance=(balance-$amount) WHERE name='$sender'";
    echo "<br><br><br><br><br><br><br><br><br><h2 id='class' >Successfull!</h2>";
    

if ($con->query($sql) === TRUE) {
  $flag=true;
} else {
  echo "<br><br><br><br><br><br><br><br><br><h2 id='class' >Error updating record: </h2>" . $con->error;
}
 }
 
  }
} else {
  echo "0 results";
} 

if($flag==true){
$sql = "UPDATE `user` SET balance=(balance+$amount) WHERE name='$receiver'";

if ($con->query($sql) === TRUE) {
  $flag=true;  
  
} else {
  echo "<br><br><br><br><br><br><br><br><br><h2 id='class' >Error updating record: </h2>" . $con->error;
}
}
if($flag==true){
$sql = "INSERT INTO `transfer` (`trans_id`, `sender`, `receiver`, `amount`) VALUES (NULL, '$sender','$receiver','$amount')";
if ($con->query($sql) === TRUE) {
} else 
{
  echo "<br><br><br><br><br><br><br><br><br><h2 id='class' >Error updating record: </h2>" . $con->error;
}
}
}
if($flag==true){
echo "<script>swal('Transfered!', 'Transaction Successfull','success').then(function() { window. location = 'customer.php'; });;</script>";
}
elseif($flag==false)
{
    echo "<script>
        $('#text2').show()
     </script>";
}
?><br><br><br><br><br><br><br><br><br>
<div class="footer">
    <h3>Spark Bank</h3>
      <pre>© <span id="copyright-year"></span> |  spark foundation</pre>
   
</div>
    
</body>
</html>