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

    <title>o-book | Sell book</title>
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
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../login/welcome.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../donor/index.php">Donor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../selling/F_selling.php">Sell</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled"> Hy "<?php echo htmlspecialchars($_SESSION["username"]); ?>"</a>
        </li>
        <div class="dropdown">
  <button  <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
   User
  </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
           <li><a class="dropdown-item" href="../login/logout.php">Logout</a></li>
           <li><a class="dropdown-item" href="../login/userprofile.php">Profile</a></li>
      </ul>
  </div>
      </ul>
    </div>
  </div>
 </nav>
</header>

     <form class="row g-3"  action="sellbook.php" method="post" enctype="multipart/form-data">
        <center>
          <div style="background-color:powderblue">
            <h3>BOOK DETAIL</h3>
          </div>  
          </center>
          <div class="col-md-6">
            <label for="inputbname" class="form-label">Book name:</label>
            <input type="text" class="form-control" id="bookname" name="bname" placeholder="Book name"required>
          </div>
          <div class="col-md-6">
            <label for="inputcategory" class="form-label">Book category:</label>
            <input type="text" class="form-control" id="bookname" name="bcategory" placeholder="engineering/diploma/school book/college....."required>
          </div>
          <div class="col-md-6">
            <label for="inputmrp" class="form-label"> &#8377; Book MRP: </label>
            <input type="number" class="form-control"name="bmrp" id=" mrp" placeholder="MRP &#8377;"required>
          </div>
          <div class="col-md-6">
            <label for="inputprize" class="form-label"> &#8377; (Half MRP)Prize:</label>
            <input type="number" class="form-control" name="bprize" id="prize" placeholder=" MRP &#8377;"required>
          </div>
          <div class="col-md-6">
            <label for="exampleFormControlTextarea1">Description for Book</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="bdescription" rows="3" placeholder="Author name/book edition/....."></textarea>
          </div>
          <div class="user-image mb-3 text-center">
        <div class="imgGallery"> 
          <!-- Image preview -->
        </div>
      </div>
        
           <div class="col-md-6">
            <label for="formFileimage" class="form-label">Book frontside image : </label>
            <input class="form-control" type="file" name="image" accept="image/png, image/jpeg" id="file" required >
            <label for="formFileimage" class="form-label">Book backside image : </label>
            <input class="form-control" type="file" name="image_b" accept="image/png, image/jpeg" id="file" required >
            <label for="formFileimage" class="form-label">Book image 1 : </label>
            <input class="form-control" type="file" name="image_c" accept="image/png, image/jpeg" id="file" required >
            <label for="formFileimage" class="form-label">Book image 2 : </label>
            <input class="form-control" type="file" name="image_d" accept="image/png, image/jpeg" id="file"  >
            
        
         <br/>
         <br/>
          </div>
           <center>
             <div>
            <h3 style="background-color:powderblue">SELLER DETAIL</h3>
            </div>
           </center> 
           
          
        <div class="col-md-6">
          <label for="inputname" class="form-label">Name:</label>
          <input type="text" class="form-control" name="sname" id="name" placeholder="Enter name"required>
        </div>
        <div class="col-md-6">
            <div class="input-group">
              <input type="hidden" class="form-control" id="inlineFormInputGroupUsername" name="user" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>">
            </div>
          </div>
        <div class="col-md-6">
          <label for="contact" class="form-label">Contact:</label>
          <input type="tel" class="form-control" name="contact" id="contact"  pattern="[0-9]{10}" placeholder="Enter your 10 Digit Mobile Number"required>
        </div>
        <div class="col-md-6">
          <label for="inputAddress" class="form-label">Email:</label>
          <input type="email" class="form-control" name="email" id="Email Address" placeholder="sophie@example.com" required>
        </div>
        <br/>
        <div class="row g-3">
            <div class="col-sm-7">
            <label for="inputcity" class="form-label">City:</label>
              <input type="text" class="form-control" name="city" placeholder="City" aria-label="City" required>
            </div>
            <div class="col-md-4">
               <label for="inputState" class="form-label">State:</label>
               <input type="text" class="form-control" name="state" placeholder="state" aria-label="state" required>
            
                   </select>
            </div>
            <div class="col-sm">
            <label for="inputzip" class="form-label">Zip:</label>
              <input type="tel" class="form-control" name="zip"  pattern="[0-9]{3}[0-9]{3}" placeholder="Zip" aria-label="Zip" required>
            </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div>
        <div class="col-12">
          <button type="submit"  name="submit" class="btn btn-primary">Upload</button>
        </div> 
      </form>
    </div>
    <footer class="footer" >
    <div class="footerContainer">
        <center><p class="copyright"><b>Copyright &copy; <?php echo date('Y')?>GPC NEEMRANA</b></p></center>
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