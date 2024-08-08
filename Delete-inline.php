<?php

 $St_id= $_GET['id'];

$connection=mysqli_connect("localhost","root","","crud") or die("Connection Failed!");

$sql="DELETE From students WHERE St_ID={$St_id}";

$result= mysqli_query($connection,$sql);

if($result){
    header("Location:http://localhost/CRUDS/Home.php");
}
else{
    echo "Record Not Deleted";
}

mysqli_close($connection);
?>