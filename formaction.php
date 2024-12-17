  <?php

$servername= "localhost";
$username= "root";
$password="";
$dbname="register";

$conn= new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error){

die("connection failed:    " .$conn->connect_error);
}
if(isset($_POST['Submit']))
{

$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$middleName=$_POST['middleName'];
$dob=$_POST['dob'];
$email=$_POST['email'];
$password=$_POST['password'];

echo  "connection successful";
if(isset($_POST['Submit']))
{
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$middleName=$_POST['middleName'];
$dob=$_POST['dob'];
$email=$_POST['email'];
$password=$_POST['password'];

$sql = "INSERT INTO users(firstName,lastName,middleName,dob,email,password)
                     VALUES('{$firstName}','{$lastName}','{$middleName}','{$dob}','{$email}','{$password}')";
if($conn->query($sql) == TRUE  ){
echo  "New Record added Successfully"; 
}
       else{
            echo  "error: " .$sql . "<br>" .$conn->connect_error;
}
}
}
?>