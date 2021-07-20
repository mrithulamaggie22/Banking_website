<?php
    include "header.php";

?>
<html>
<head>
<title>CREATE USER</title>
</head>

<style>


/*basic reset*/
* {margin: 0; padding: 0;}

html {
	height: 100%;
	/*Image only BG fallback*/
	
	/*background = gradient + image pattern combo*/
	
    
	
}
h2 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }

#body {
	background-color: #E4F5D4;
	
}

/*form styles*/
#msform {
	width: 600px;
	margin: 50px auto;
	text-align: center;
	position: relative;
}
#msform fieldset {
	background: #fff;
	border: 0 none;
	border-radius: 3px;
	box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
	padding: 20px 30px;
	box-sizing: border-box;
	width: 80%;
	margin: 0 10%;
	
	/*stacking fieldsets above each other*/
	position: relative;
}
/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
	display: none;
}
/*inputs*/
#msform input, #msform textarea {
	padding: 15px;
	border: 1px solid #ccc;
	border-radius: 3px;
	margin-bottom: 10px;
	width: 100%;
	box-sizing: border-box;
	font-family: montserrat;
	color: #2C3E50;
	font-size: 13px;
}
/*buttons*/
.action-button {
	width: 100px;
	background: #27AE60;
	font-weight: bold;
	color: white;
	border: 0 none;
	border-radius: 1px;
	cursor: pointer;
	padding: 10px 5px;
	margin: 10px 5px;
}
.action-button:hover,.action-button:focus {
	box-shadow: 0 0 0 2px white, 0 0 0 3px #E4F5D4;
}
/*headings*/
.fs-title {
	font-size: 30px;
	text-transform: uppercase;
	color: #2C3E50;
	margin-bottom: 30px;
}
.fs-subtitle {
	font-weight: normal;
	font-size: 13px;
	color: #666;
	margin-bottom: 100px;
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
<?php
$servername = "localhost";
// Enter your MySQL username below(default=root)
$username = "root";
// Enter your MySQL password below
$password = "";
$dbname = "bankuser";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    header("location:connection_error.php?error=$conn->connect_error");
    die($conn->connect_error);
}
else
    echo '';

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $balance=$_POST['balance'];
    $sql="insert into  `user`(`name`, `email`, `balance`) values('{$name}','{$email}','{$balance}')";
    $result=mysqli_query($conn,$sql);
    if($result){
               echo "<script> alert('Hurray! User created');
                            
                     </script>";
                    
    }
}
?>

<body id="body">
	<section>
        <h2>CREATE USER</h2>
<form id="msform" method="post">
  
  <!-- fieldsets -->
  <fieldset>
    
   
    <input type="text" name="name" placeholder="Name"  required="Name" />
    <input type="email" name="email" placeholder="Email" required="email" />
    <input type="text" name="balance" placeholder="Account Balance" required="balance" />
    <button name="submit" class="next action-button" value="Create" >Create</button>
  </fieldset>
  
</form>
</section>
    
</div>
<div class="footer">
    <h3>Spark Bank</h3>
      <pre>© <span id="copyright-year"></span> |  spark foundation</pre>
   
</div>

</body>

</html>