<?php
echo $name= $_POST['name'] ;
echo $address=$_POST['address'];
echo $course=$_POST['course'];
echo $phone= $_POST['phone'];

 $connection=mysqli_connect("localhost","root","","crud") or die("Connection Failed!");

$sql="insert into  students(ST_Name,ST_Address,Class,ST_Phone) VALUES('{$name}','{$address}','{$course}','{$phone}') ";

$result= mysqli_query($connection,$sql);

header("Location:http://localhost/CRUDS/Home.php");

mysqli_close($connection);
?>