
<?php
include_once 'f_conn.php';
 
if(isset($_POST['submit']))

    {	  
      if(empty(trim($_POST["sname"]))){
         $sname_err = "Please enter a name.";
     } elseif(!preg_match('/^[a-zA-Z_]+$/', trim($_POST["sname"]))){
         $sname_err = "name can only contain letters.";
     }
     
  
        $filename = $_FILES["image"]["name"];
        $file_size = $_FILES["image"]["size"];
        $file_type = $_FILES["image"]["type"];
        $file_temp = $_FILES["image"]["tmp_name"];  

        $filenameb = $_FILES["image_b"]["name"];
        $file_sizeb = $_FILES["image"]["size"];
        $file_typeb = $_FILES["image"]["type"];
        $file_tempb = $_FILES["image"]["tmp_name"]; 
              
        $filenamec = $_FILES["image_d"]["name"];
        $file_sizec = $_FILES["image"]["size"];
        $file_typec = $_FILES["image"]["type"];
        $file_tempc = $_FILES["image"]["tmp_name"];

        $filenamed = $_FILES["image_d"]["name"];
        $file_sized = $_FILES["image"]["size"];
        $file_typed = $_FILES["image"]["type"];
        $file_tempd = $_FILES["image"]["tmp_name"];
     
       
        $bname = $_POST['bname'];
        $bcategory = $_POST['bcategory'];
        $bmrp = $_POST['bmrp'];
        $bprize = $_POST['bprize'];
        $bdescription = $_POST['bdescription'];
        $user = $_POST['user'];
        $sname = $_POST['sname'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $bcategory = $_POST['bcategory'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        
        $sql = "INSERT INTO sell_book (bname, bcategory, bmrp, bprize, bdescription,file_name,file_nameb,file_namec, file_named, user,sname, contact, email, city, state , zip)
        VALUES ('$bname', '$bcategory','$bmrp',' $bprize',' $bdescription','$filename','$filenameb' ,'$filenamec','$filenamed','$user','$sname','  $contact',' $email',' $city','$state',' $zip')";
        if (mysqli_query($link, $sql)) {
           move_uploaded_file($_FILES["image"]["tmp_name"],'upload/'.$filename); 
           move_uploaded_file($_FILES["image"]["tmp_name"],'upload/'.$filenameb); 
           move_uploaded_file($_FILES["image"]["tmp_name"],'upload/'.$filenamec);
           move_uploaded_file($_FILES["image"]["tmp_name"],'upload/'.$filenamed);
           echo "your book sucessfully upload please go back home pagr....";
        } else {
           echo "Error: " . $sql . 
            "". mysqli_error($link);
        }
        mysqli_close($link);
   }
   header("Location:../login/welcome.php");
?>