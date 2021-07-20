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
$_SESSION['user']=$_POST['user'];
$_SESSION['sender']=$_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>VIEW AND TRANSACT</title>
    <style>

    #link{
            background-color: #27AE60;
            border: 1px solid black;
            margin: 0 auto;
            font-size: large;
            padding: 10px;
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
    <title>SPARK BANK</title>
    <div>
<div class="acustomer" style="margin:2%;">
<div class="row">
    <div class="col-sm" style="padding:1% 3%;">
    <div style="padding-top:2%;display:inline;"><h4 class="font-weight-bold" style="color:#006600;font-size:2em;;display:inline;margin:10px 5px 0px 5px;padding-top:1%">CUSTOMER DETAILS</h4>
    </div>
        <br><br>
        <div style="font-size:1.2em;">
        <?php
        if (isset($_SESSION['user']))
        {
          $user=$_SESSION['user'];
          $result=mysqli_query($con,"SELECT * FROM user WHERE name='$user'");
          while($row=mysqli_fetch_array($result))
          {
            echo "<p><b class='font-weight-bold'>User ID</b> &nbsp;: ".$row['id']."</p><br>";
            echo "<p name='sender'><b class='font-weight-bold'>Name&nbsp;&nbsp;</b>&nbsp;&nbsp;: ".$row['name']."</p><br>";
            echo "<p><b class='font-weight-bold'>Email ID</b> : ".$row['email']."</p><br>";
            echo "<p><b class='font-weight-bold'>Balance</b>&nbsp; :&nbsp;<b>&#8377;</b> ".$row['balance']."</p>";
          }         
        }
      ?>
      </div>
    </div>
    <div class="col-sm" style="padding:1% 3%;">
        <div >
                    <form action="transfer.php" method="POST">
        
                    <div style="padding-top:2%;display:inline;">
                    <span class="font-weight-bold" style="color:#006600;font-size:2em;;display:inline;margin:10px 5px 0px 5px;padding-top:1%">MONEY TRANSFER</span>
                    </div><br><br>
                    <b style="font-size:1.2em;">Sender</b> : <span style="font-size:1.2em;"><input id="myinput" name="sender" disabled type="text" style="width:40%;border:none;" value='<?php echo "$user";?>'></input></span>

                        <br><br><br>
                        <b style="font-size:1.2em;">Select Reciever:</b>
                <select name="reciever" id="dropdown" required>
                    <option>Select Reciever</option>
                <?php
                $db = mysqli_connect("localhost", "root", "", "bankuser");
                $res = mysqli_query($db, "SELECT * FROM user WHERE name!='$user'");
                while($row = mysqli_fetch_array($res)) {
                    echo("<option> "."  ".$row['name']."</option>");
                }
                ?>
                </select>
                <br><br><br>
                        <b style="font-size:1.2em;">Amount to be transferred&#8377;:</b>
                        <input name="amount" type="number" style="width:35%;" min="100" required>
                        <br><br><br>
                        <button id="link"  name="transfer" class="btn btn-default" action="customer.php"><b>Transfer</b></button>
                        </form>
        </div>
    </div>
</div><br><br>
    
</div>
<div class="footer">
    <h3>Spark Bank</h3>
      <pre>© <span id="copyright-year"></span> |  spark foundation</pre>
   
</div>

</body>

</html>
