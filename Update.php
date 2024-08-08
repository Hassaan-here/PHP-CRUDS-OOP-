<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
      <div  class="m-5 mb-0">
  <h1>Update a Record</h1>
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
    <input class="btn btn-dark w-25"  type="submit" name="showbtn" value="Show">
  </div>
  </form>
</div>

<?php
if (isset($_POST['showbtn'])) {

  $connection=mysqli_connect("localhost","root","","crud") or die("Connection Failed!");

$id=$_POST['St-id'];
$sql="SELECT * 
FROM students 
where St_ID={$id}";

$result= mysqli_query($connection,$sql);

if(mysqli_num_rows($result)>0){


while($row=mysqli_fetch_assoc($result)){

?>

<div class="form-container d-flex justify-content-center">
    <form action="editdata.php" class="w-50  m-2 bg-light" method="post">
  <div class="form-group row p-3">
    <label for="Name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="s_name" value="<?php echo $row['ST_Name']?>" >
    </div>
  </div>
    <div class="form-group row p-3">
    <label for="Address" class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="s_address" value="<?php echo $row['ST_Address']?>">
    </div>
  </div>
<div class="form-group row p-3">
 <label for="classSelect" class="col-sm-2 col-form-label">Choose a class:</label>
<div class="col-sm-10">
    <?php

        $sql1= "Select * From students_class";

        $result1 = mysqli_query($connection,$sql1);

        if(mysqli_num_rows($result1)>0){
            echo '<select name="s_classSelect" class="form-select" ';

        while($row1=mysqli_fetch_assoc($result1)){
          if ($row['Class']==$row1['Class_id']) {
            $select= "selected";
          } else {
             $select= "";
          }
          
            echo "<option {$select} value='{$row1['Class_id']}'> {$row1['Class_Name']} </option>";
        }
            echo'</select>';
    }
        ?>
</div>
</div>

  <div class="form-group row p-3">
    <label for="phoneNo" class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-10">
      <input type="tel" class="form-control" name="s_phone" value="<?php echo $row['ST_Phone']?>">
    </div>
  </div>
    <div class="row m-3 justify-content-center">
   <input class="btn btn-dark w-25" type="submit" value="Update">
    </div>

</form>
<?php
}
}else {
  header("location:http://localhost/CRUDS/Home.php");  // redirect to Home page
}
  mysqli_close($connection);
}
?>

</div>

</body>
</html>