<?php
include'header.php';
?>

 
<body>

<div  class="m-5">
  <h1>All Records</h1>
</div>

<?php
$connection=mysqli_connect("localhost","root","","cruds") or die("Connection Failed!");
$sql="SELECT * FROM students";
//   join students_class
//  where students.Class= students_class.Class_id
//  ORDER BY St_ID asc 

$result= mysqli_query($connection,$sql);

if(mysqli_num_rows($result)>0){
?>

<div id="table-container " class="m-5">
  <table class="table table-dark">
    <thead>
      <th>ST.ID</th>
      <th>Name</th>
      <th>Age</th>
      <th>Grade</th>
      <th>Action</th>
    </thead>
    <tbody>

    <?php
    while($row=mysqli_fetch_assoc($result)){
    ?>
      
       <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['age']; ?></td>
      <td><?php echo $row['grade']; ?></td>
      <td>
        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
        <a href="Delete-inline.php?id=<?php echo $row['id']; ?>">Delete</a>
      </td>
     </tr>
<?php
} //while closed
?>


 </tbody>
</table>

<?php 
} //   if statement closed
else{
  echo "<h2>No record Found</h2>";
} //   if statement closed
?>
 <?php
 mysqli_close($connection);
 ?>

</div>
</body>

</html>