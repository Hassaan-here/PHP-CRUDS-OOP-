<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">



<body>
  <div class="m-5 mb-0">
    <h1>Edit a Record</h1>
  </div>
  <?php
$connection=mysqli_connect("localhost","root","","cruds") or die("Connection Failed!");

$id=$_GET['id'];
$sql="SELECT * 
FROM students 
where id={$id}";

$result= mysqli_query($connection,$sql);

if(mysqli_num_rows($result)>0){


while($row=mysqli_fetch_assoc($result)){
?>
  <div class="form-container d-flex justify-content-center">
    <form action="editdata.php" class="w-50 m-5  bg-light" method="post">

      <div class="form-group row p-3">
        <label for="Name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
           <input type="hidden" class="form-control" name="s_id" value="<?php echo $row['id']?>">
          <input type="text" class="form-control" name="s_name" value="<?php echo $row['name']?>">
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

      <?php
}
} //   if statement closed
  ?>

    </form>
  </div>

  <?php
 mysqli_close($connection);
 ?>
</body>

</html>