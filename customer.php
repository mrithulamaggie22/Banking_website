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
    <title>ALL CUSTOMER</title>
    
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
    </style>
    <body>
        
    <section>
        <h2>CUSTOMER DETAILS</h2><br><br>

        <!-- TABLE CONSTRUCTION-->
        <table>
            <tr>
                <th style="width:100px">ID</th>
                <th style="width:200px">USER NAME</th>
                <th style="width:300px">EMAIL</th>
                <th style="width:200px">ACCOUNT BALANCE</th>
                <th style="width:300px">OPERATION</th>
            </tr>
          <?php
        $sql = "SELECT * FROM `user`";
        $result = mysqli_query($con, $sql);
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<form method ='post' action = 'acustomer.php'>";
            echo "<td style='color: black;'>". $row['id'] . "</td>
            <td style='color: black;'>". $row['name'] . "</td>
            <td style='color: black;'>". $row['email'] . "</td>
            <td style='color: black;'>". $row['balance'] . "</td>";
           echo "<td> 
           <a class='a'href='Basic-Banking-System-main\acustomer.php'><button id='link' type='submit' class='btn btn-default' name='user'  id='users1' value= '{$row['name']}' >View & Transact</button></a></td>";
            echo "</form>";
           echo  "</tr>";
        }
        ?>
          
    </table><br><br>
</section>

    
</div>
<div class="footer">
    <h3>Spark Bank</h3>
      <pre>© <span id="copyright-year"></span> |  spark foundation</pre>
   
</div>
</body>

</html>