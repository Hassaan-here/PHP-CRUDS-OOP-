<?php
$id=$_POST['s_id'];
 $name= $_POST['s_name'] ;
 $address=$_POST['s_address'];
 $course=$_POST['s_classSelect'];
 $phone= $_POST['s_phone'];

$connection=mysqli_connect("localhost","root","","crud") or die("Connection Failed!");

$sql= "Update students
set ST_Name='$name',ST_Address='$address',Class='$course',ST_Phone='$phone'
where St_ID='$id' ";

$result= mysqli_query($connection,$sql) or die("Query unsuccessful");

header("Location:http://localhost/CRUDS/Home.php");

mysqli_close($connection);
?>