<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php
	$conn=new PDO('mysql:host=localhost; dbname=obook', 'root', '') or die(mysql_error());
	if(isset($_POST['submit'])!=""){
	  $name=$_FILES['file']['name'];
	  $size=$_FILES['file']['size'];
	  $type=$_FILES['file']['type'];
	  $temp=$_FILES['file']['tmp_name'];
	  $fname = date("YmdHis").'_'.$name;
	  $chk = $conn->query("SELECT * FROM  upload where name = '$name' ")->rowCount();
	  if($chk){
	    $i = 1;
	    $c = 0;
		while($c == 0){
	    	$i++;
	    	$reversedParts = explode('.', strrev($name), 2);
	    	$tname = (strrev($reversedParts[1]))."_".($i).'.'.(strrev($reversedParts[0]));
	    	$chk2 = $conn->query("SELECT * FROM  upload where name = '$tname' ")->rowCount();
	    	if($chk2 == 0){
	    		$c = 1;
	    		$name = $tname;
	    	}
	    }
	}
	 $move =  move_uploaded_file($temp,"upload/".$fname);
	 if($move){
	 	$query=$conn->query("insert into upload(name,fname)values('$name','$fname')");
		if($query){
		header("location:index.php");
		}
		else{
		die(mysql_error());
		}
	 }
	}
	?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>o-book |Donor </title>
 
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">



	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	
	<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>
<body>
	<header>
	
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
	<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../login/welcome.php">
      <img src="../index_component/obook logo.png" alt="" width="50" height="40" class="d-inline-block align-text-top">
      O-Book
    </a>
  </div>
</nav>
    
</header>
<div class="container">
  <h2> Upload your notes </h2>
  <hr>

<form enctype="multipart/form-data" action="" name="form" method="post">
		Select File
		
			<input type="file" name="file" id="file" accept="application/pdf,application/vnd.ms-excel" /></td>
			<input type="submit" name="submit" id="submit" value="Submit" />
	</form>
  <hr>
  <br>
  <!--upload php-->
  <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered" id="example">
			<thead>
				<tr>
				   <th >S.NO.</th>
					<th width="90%" align="center" >Files</th>
					<th align="center">Action</th>	
				</tr>
			</thead>
			<?php
			$query=$conn->query("select * from upload order by id desc");
			$i=1;
			while($row=$query->fetch()){
				$name=$row['name'];
			?>
			<tr>
			   <td>
					&nbsp;<?php echo $i  ?>
				</td>
				<td>
					&nbsp;<?php echo $name ;?>
				</td>
				<td>
					<button class="alert-success"><a href="download.php?filename=<?php echo $name;?>&f=<?php echo $row['fname'] ?>">Download</a></button>
				</td>
			</tr>
			<?php
		$i++; }?>
		</table>
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