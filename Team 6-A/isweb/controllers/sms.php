<?php
include("../model/config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 

   $email = $_POST['email'];
   $smscode = $_POST['smscode'];
   $pw = md5($_POST['pswrd']); 
   $pw2 = md5($_POST['pswrd_repeat']); 

   if ($pw != $pw2) {
      echo "<script> alert('Check your passwords'); </script>";
      header("location: sms.php");
      die();
   }

   $selectmail= "SELECT * FROM admin WHERE email ='$email' and password='$smscode'" ;
   $allmailquery = mysqli_query($db, $selectmail ) ;  
   $num1 = mysqli_num_rows($allmailquery);
   if ($num1>0) {
      $type=1;
   }

   $selectmail= "SELECT * FROM employer WHERE email ='$email' and password='$smscode'" ;
   $allmailquery = mysqli_query($db, $selectmail ) ;  
   $num2 = mysqli_num_rows($allmailquery);
   if ($num2>0) {
      $type=2;
   }

   $selectmail= "SELECT * FROM jobseeker WHERE email ='$email' and password='$smscode'" ;
   $allmailquery = mysqli_query($db, $selectmail ) ;  
   $num3 = mysqli_num_rows($allmailquery);
   if ($num3>0) {
      $type=3;
   }

   if($type == 1){
      $registrationQuery = "UPDATE admin SET password='$pw' WHERE email='$email'";
   }
   if($type == 2){
      $registrationQuery = "UPDATE employer SET password='$pw' WHERE email='$email'";
   } 
   if($type == 3){
      $registrationQuery = "UPDATE jobseeker SET password='$pw', status='1' WHERE email='$email'";
   }
   if (mysqli_query($db,$registrationQuery) === TRUE) {

      echo "<script> alert('User registerd Succesfully...'); </script>";
      header("location: ../index.php");
      die();
  } 
  else{
   // echo "<script> alert('Error...'); </script>";
   // header("location: index.php");
   // die();
}
}

?>