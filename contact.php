<?php
error_reporting(0);
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName ="login_register";  
$check = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if($check){
    echo "Connection ok";
}
else{ 
    echo "Connection fail";
}
//Taking value from  HTML to PHP
$fname=$_POST['firstName'];
$lname=$_POST['lastName'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$city=$_POST['city'];

//sending data into database
$send="INSERT INTO user_details VALUES('', '$fname','$lname','$email','$phone','$city')";
$data=mysqli_query($check,$send);
//checking data send

if($data){
    echo "Data send";
}
else{
    echo "Data is not send";
}
?>