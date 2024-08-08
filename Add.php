<?php
include 'header.php';
?>


<body>
  <div class="m-5 mb-0">
    <h1>Add new Record</h1>
  </div>

  <div class="form-container d-flex justify-content-center">
    <form action="saveData.php" method="post" class="w-50 m-5  bg-light">

      <div class="form-group row p-3">
        <label for="FName" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input class="form-control" type="text" name="name" placeholder="Enter Name">
        </div>
      </div>
      <div class="form-group row p-3">
        <label for="Address" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
          <input class="form-control" type="text" name="address">
        </div>
      </div>

      <div class="form-group row p-3">
        <label for="classSelect" class="col-sm-2 col-form-label">Choose Class</label>
        <div class="col-sm-10">
          <select id="AreaSelect" name="course" class="form-select">
            <option selected disabled>Select course</option>
            <?php
            $connection = mysqli_connect("localhost", "root", "", "crud") or die("Connection Failed!");

            $sql = "SELECT * FROM  students_class";

            $result = mysqli_query($connection, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <option value="<?php echo $row['Class_id']; ?>"><?php echo $row['Class_Name']; ?></option>
            <?php
            }
            ?>
          </select>
        </div>
      </div>

      <div class="form-group row p-3">
        <label for="phoneNo" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
          <input type="tel" class="form-control" name="phone">
        </div>
      </div>
      <div class="row m-3 justify-content-center">
        <input class="btn btn-primary w-25" type="submit" value="save">
      </div>
      <?php
      mysqli_close($connection);
      ?>
    </form>
  </div>
</body>

