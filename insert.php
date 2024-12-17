<?php
require('mysql.php');

$status="";
 if(isset($_POST['new']) && $_POST['new']== 1){

$firstName=$_REQUEST['firstName'];
$lastName=$_REQUEST['lastName'];
$middleName=$_REQUEST['middleName'];
$dob_date=date("y-m-d H:i:s");
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];


$sql = "INSERT INTO users(firstName,lastName,middleName,dob,email,password)
                     VALUES('{$firstName}','{$lastName}','{$middleName}','{$dob}','{$email}','{$password}' )";
if($conn->query($sql) == TRUE  ){
echo  "New Record added Successfully"; 
}
       else{
            echo  "error: " .$sql . "<br>" .$conn->connect_error;
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title></title>
</head>

<body>
<h1>REGISTER PAGE</h1>
<form action="formaction.php" method="post">
<input type="text" name="firstName" placeholder="firstName">
<br></br>


<input type="text" name="lastName" placeholder="lastName">
<br></br>

<input type="text" name="middleName" placeholder="middleName">
<br></br>

<input type="date" name="dob">
<br></br>

<input type="text" name="email" placeholder="email">
<br></br>

<input type="password" name="password" placeholder="password">
<br></br>

<button type="Submit" name="Submit">Submit</button>
<br></br>

</form>

</body> 
</html>



