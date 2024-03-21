
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet" >

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>OBook|Store</title>
  </head>
  <body>
  <div class="fixed-top">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="index_component/obook logo.png" alt="" width="50" height="40" class="d-inline-block align-text-top">
      O-Book
    </a>
  </div>
</nav>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login/register.php">Donor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login/register.php">Sell</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled"></a>
        </li>
        <div class="dropdown">
  <button  <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    login
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="login/register.php">User Login</a></li>
    <li><a class="dropdown-item" href="admin/admin/login.php">Admin login</a></li>
  </ul>
</div>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
 </nav>
</div>
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="index_component/slide1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="index_component/slide2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="index_component/slide3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
</div>
     <br>
     <div class="row row-cols-1 row-cols-md-3 g-4" >
  <?php
   //Creating a connection
  
   require_once "iconnection.php";
   //Executing the multi query
   $query = "SELECT * FROM sell_book";
 
   //Retrieving the records
   $res = mysqli_query($link, $query, MYSQLI_USE_RESULT);
   $res1=$res;
   if ($res) {
      while ($row = mysqli_fetch_row($res)) {
        ?>
         <div class="col"style="width: 24.333333%;">
    <div class="card">
      <img src="selling/upload/<?php  echo $row['6']; ?>" class="img-thumbnail" alt="...">
      <div class="card-body">
        <h5 class="card-title">BOOK name:<?php  echo $row['1']; ?></h5>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Category:<b><?php  echo $row['2']; ?></b></li>
          <li class="list-group-item">Prize:<b><?php  echo $row['4']; ?>&#8377;</b></li>
          <li class="list-group-item">City:<b><?php  echo $row['14']; ?></b></li>
          <li class="list-group-item">Upload date:<b><?php  echo $row['17']; ?></b></li>
        </ul>
       <center> <a href="login/login.php" class="btn btn-primary view_btn">view</a></center>

      </div>
  </div>
  </div>
        <?php
        
        
      }
   }

   //Closing the connection
   mysqli_close($link);
?>

</div>

<footer class="footer" >
    <div class="footerContainer">
        <center><p class="copyright"><b>Copyright &copy; <?php echo date('Y')?> GPC NEEMRANA</b></p></center>
    </div>
  </footer>
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>-->
  

  </body>
</html>