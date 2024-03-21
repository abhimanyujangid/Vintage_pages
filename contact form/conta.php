<?php
include_once 'connection.php';
 
if(isset($_POST['submit']))

    {	  
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
      
        if(empty(trim($_POST["name"]))){
          $name_err = "Please enter a name.";
      } elseif(!preg_match('/^[a-zA-Z_]+$/', trim($_POST["name"]))){
          $name_err = "name can only contain letters.";
      }
        $sql = "INSERT INTO contact_us (name, username,email,subject,message) VALUES ('$name', '$username','$email',' $subject',' $message')";
        if (mysqli_query($link, $sql)) 
           echo "Hello your report is sucessfully send our team please back to your profile page!";
         else {
           echo "Error: " . $sql . 
            "". mysqli_error($link);
        }
        mysqli_close($link);
   }
   header("Location: ../login/welcome.php");
?>