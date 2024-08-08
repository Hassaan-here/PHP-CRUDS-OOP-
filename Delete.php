<?php
include 'header.php';
?>

<body>
         <div  class="m-5 mb-0">
        <h1>Delete a Record</h1>
        </div>

<div class="form-container d-flex justify-content-center">
  <form action="<?php $_SERVER['PHP_SELF'] ?>" class="w-50   bg-light" method="post" >
     <div class="form-group row p-3">
    <label for="ID" class="col-sm-2 col-form-label">ID</label>
    <div class="col-sm-10">
      <input class="form-control" type="number"  name="St-id" >
    </div>
  </div>

  <div class="row justify-content-center ">
    <input class="btn btn-dark w-25"  type="submit" name="del-btn" value="Delete">
  </div>
  
<?php
  $connection=mysqli_connect("localhost","root","","cruds") or die("Connection Failed!");

if (isset($_POST['del-btn'])) {
$id=$_POST['St-id'];
$sql="DELETE 
FROM students 
where St_ID={$id}";

$result= mysqli_query($connection,$sql) ;

if($result){
    header("Location:http://localhost/CRUDS/Home.php");
}
else{
    echo "Record Not Deleted";
}
?>

  </form>
</div>

<?php } ?>

<?php
mysqli_close($connection);
?>

</body>
</html>