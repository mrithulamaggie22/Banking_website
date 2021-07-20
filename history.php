<?php
    include "header.php";

?>
<?php
    $con = mysqli_connect("localhost", "root", "", "bankuser");
?>
<!DOCTYPE html>
<html lang="en">
  
<head>

    <meta charset="UTF-8">
    <title>TRANSACTION HISTORY</title>
    
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
            border-color: black;
            font-weight: bolder;

        }
  
        h2 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
  
        td {
            border-color: black;
            background-color: #E4F5D4;
            
        }
        
        
        th{
            background-color: #5cb874;
        }
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
  
        td {
            border: 1px solid black;
            font-weight: lighter;
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
    
    <div>

<div >
    <br><br>

    <h2>TRANSFER RECORD</h2><br><br>
    <table>
          <tr>
            <th style="width:150px">Transaction ID</th>
            <th style="width:350px">Sender</th>
            <th style="width:350px">Receiver</th>
            <th style="width:200px">Amount</th>
            
          </tr>
          <?php
        $sql = "SELECT * FROM `transfer` ORDER BY trans_id ";
        $result = mysqli_query($con, $sql);
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<form method ='post' action = 'acustomer.php'>";
            echo "<td style='color: black;'>". $row['trans_id'] . "</td>
            <td style='color: black;'>". $row['sender'] . "</td>
            <td style='color: black;'>". $row['receiver'] . "</td>
            <td style='color: black;'>". $row['amount'] . "</td>";
            echo "</form>";
         echo  "</tr>";
        }
        ?>
    </table>
</div><br><br>
    
</div>
<div class="footer">
    <h3>Spark Bank</h3>
      <pre>© <span id="copyright-year"></span> |  spark foundation</pre>
   
</div>

</body>




</html>