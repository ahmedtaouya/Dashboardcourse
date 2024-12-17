 <?php

$servername= "localhost";
$username= "root";
$password="";
$dbname="register";

$conn= new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error){

die("connection failed:    " .$conn->connect_error);
}
if(isset($_POST['Login']))
{

$email=$_POST['email'];
$password=$_POST['password'];

echo  "connection successful";

if(empty($email))
{
 echo "<font color='red>'  enter valid email . <font/><br/> ";
}
if(empty($password))
{
 echo "<font color='red>'  enter valid password . <font/><br/> ";
}
}
else
{
$sql = "SELECT * FROM users WHERE email = '" .$email  ."' AND password = '".$password."'";
          $result = mysqli_query($conn,$sql);
             if(mysqli_num_rows($result) == 1)
{

  echo " you are logged in ";
} 
else
{
echo " incorrect password or email";
}
}
?>