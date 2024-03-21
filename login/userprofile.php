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
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="../donor/css/DT_bootstrap.css">
      <link href="bootstrap.css" rel="stylesheet" type="text/css" media="screen">
      <script src="../donor/js/jquery.js" type="text/javascript"></script>
	    <script src="../donor/js/bootstrap.js" type="text/javascript"></script>
	    <script type="text/javascript" charset="utf-8" language="javascript" src="../donor/js/jquery.dataTables.js"></script>
	    <script type="text/javascript" charset="utf-8" language="javascript" src="../donor/js/DT_bootstrap.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
  </ul>
</div>
      </ul>
    </div>
  </div>
 </nav>

 <?php

$sql="SELECT * FROM sell_book WHERE user ='".$_SESSION['username']."'";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
                <h4 class="box-title">User Name:<b> <?php echo htmlspecialchars($_SESSION["username"]); ?></b></h4>
				   <h4 class="box-title">BOOK Deatial</h4>
				</div>
		
           <table class="table table-striped table-bordered" id="example">
						 <thead>
							<tr>
							<tr>
							   <th class="serial">S.no</th>
							   <th>ID</th>
							   <th>Categories</th>
							   <th>Book name </th>
							   <th>MRP</th>
							   <th>Price</th>
							   <th>Seller user name</th>
							   <th>Contact</th>
							   <th>city</th>
							   <th>Date</th>
							
				
							</tr>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i ?></td>
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['bcategory']?></td>
							   <td><?php echo $row['bname']?></td>
							   <td><?php echo $row['bmrp']?></td>
							   <td><?php echo $row['bprize']?></td>
							   <td><?php echo $row['user']?></td>
							   <td><?php echo $row['contact']?></td>
							   <td><?php echo $row['city']?></td>
							   <td><?php echo $row['creat_dt']?></td>
							 
							</tr>
							<?php
							$i++; }
							
					          ?>
						 </tbody>
					  </table>
			 </div>
		  </div>
	   </div>
	</div>
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