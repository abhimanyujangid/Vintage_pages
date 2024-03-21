<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'obook');
 
/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?> 
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

  <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/style.css" rel="stylesheet" >
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>OBook| Store</title>
  </head>
  <body>
  <div class="fixed-top">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../index_component/obook logo.png" alt="" width="50" height="40" class="d-inline-block align-text-top">
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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../donor/index.php">Donor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../selling/F_selling.php">Sell</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled"> Hy "<b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>"</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../contact form/contactindex.php">contact_us</a>
        </li>
        <div class="dropdown">
  <button  <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Profile
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
    <li><a class="dropdown-item" href="userprofile.php">Profile</a></li>
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
 </nav><div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../index_component/slide1.jpg" class="d-block w-100" alt="books">
    </div>
    <div class="carousel-item">
      <img src="../index_component/slide2.jpg" class="d-block w-100" alt="books">
    </div>
    <div class="carousel-item">
      <img src="../index_component/slide3.jpg" class="d-block w-100" alt="bood">
    </div>
  </div>
</div>
     <br>
     <br>
   <div class="row row-cols-1 row-cols-md-3 g-4" >
   <?php
 
   
   //Executing the multi query
   $query = "SELECT * FROM sell_book";
 
   //Retrieving the records
   $res = mysqli_query($con, $query, MYSQLI_USE_RESULT);

   if ($res) {
      while ($row = mysqli_fetch_row($res)) {
        ?>
         <div class="col"style="width: 24.333333%;">
    <div class="card">
    <img src="../selling/upload/<?php  echo $row['6']; ?>" class="img-thumbnail" alt="...">
      <div class="card-body">
        <h5 class="card-title">BOOK name:<?php  echo $row['1']; ?></h5>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Category:<b><?php  echo $row['2']; ?></b></li>
          <li class="list-group-item">Prize:<b><?php  echo $row['4']; ?>&#8377;</b></li>
          <li class="list-group-item">City:<b><?php  echo $row['14']; ?></b></li>
          <li class="list-group-item">Upload date:<b><?php  echo $row['17']; ?></b></li>
        </ul>
       <center> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $row['0'] ?>">View</button></center>
</div>
      <div id="myModal<?php echo $row['0'] ?>" class="modal fade" role="dialog">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h6 class="modal-title"><b>Book Name:</b> <?php  echo $row['1']; ?></h6>
                  </div>
                  <div class="modal-body">
                  <div class="col"style="width: 50.333333%;">
                    <img src="../selling/upload/<?php  echo $row['6']; ?>" class="img-thumbnail" alt="...">
                  </div>
                  <li class="list-group-item active" aria-current="true">BOOK Details</li>
                 <ul class="list-group ">
                  <li class="list-group-item"><b>Category:&nbsp;</b><?php  echo $row['2']; ?></li>
                  <li class="list-group-item"><b>Prize:&nbsp;</b><?php  echo $row['4']; ?>&#8377;</li>
                  <li class="list-group-item"><b>Mrp:&nbsp;</b><?php  echo $row['3']; ?>&#8377;</li>
                  <li class="list-group-item"><b>Date:&nbsp;</b><?php  echo $row['17']; ?></li>
                <li class="list-group-item"><b> Book Description:</b><br/><?php  echo $row['5']; ?></li>
              </ul>
              <li class="list-group-item active" aria-current="true">Seller Details</li>
              <ul class="list-group ">
                  <li class="list-group-item"><b>Name:&nbsp;</b><?php  echo $row['11']; ?></li>
                  <li class="list-group-item"><b>Contact:&nbsp;</b><?php  echo $row['12']; ?></li>
                  <li class="list-group-item"><b>Email:&nbsp;</b><?php  echo $row['13']; ?></li>
                  <li class="list-group-item"><b>City:&nbsp;</b><?php  echo $row['14']; ?></li>
                  <li class="list-group-item"><b>State:&nbsp;</b><?php  echo $row['15']; ?></li>
                  <li class="list-group-item"><b>Zip:&nbsp;</b><?php  echo $row['16']; ?></li>
                </ul>  
                  </div>
              </div>
          </div>
      </div>
      
        </div>
        </div>
        <?php
      }
    }
   //Closing the connection
   mysqli_close($con);
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>