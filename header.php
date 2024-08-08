
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUDS</title>
  <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
  <script src="bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js"></script>


</head>

<style>
  .navbar-brand {
    font-size: 34px; /* Adjust the font size as needed */
    margin-left: 5px;
  }
  .navbar-nav{
    margin-left: auto;
    margin-right: auto;
  }
  .nav-link{
    font-size: 18px;
  }
</style>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand " href="#">CRUDS</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link " href="Home.php">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="Add.php">ADD</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="Update.php">Update</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="Delete.php">Delete</a>
      </li>
    </ul>
  </div>
</nav>
</body>
</html>