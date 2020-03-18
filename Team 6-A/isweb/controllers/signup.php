<?php
include("../model/config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 

   $email = $_POST['email'];
   $nic = $_POST['nic'];
   $address = $_POST['address'];
   $names = $_POST['names']; 
   $tp = $_POST['tp']; 
   $type=$_POST['type'];
   $pw='0123456789';
   $pw= str_shuffle($pw);
   $pw= substr($pw,0,4);

   //Check if email already exists
   $selectmail= "SELECT * FROM admin WHERE email ='$email' " ;
   $allmailquery = mysqli_query($db, $selectmail ) ;  
   $num1 = mysqli_num_rows($allmailquery);

   $selectmail= "SELECT * FROM employer WHERE email ='$email' " ;
   $allmailquery = mysqli_query($db, $selectmail ) ;  
   $num2 = mysqli_num_rows($allmailquery);

   $selectmail= "SELECT * FROM jobseeker WHERE email ='$email' " ;
   $allmailquery = mysqli_query($db, $selectmail ) ;  
   $num3 = mysqli_num_rows($allmailquery);

   if($num1 > 0 || $num2 > 0 || $num3 > 0){
      echo "<script> alert('User already registerd...'); </script>";
      header("location: index.php");
      die();
   }
        //Insert to Database
   if($type == 1){
      $registrationQuery = "INSERT INTO admin (nic, email, name, address, tp ,password) VALUES ('$nic', '$email', '$names', '$address', '$tp', '$pw')";
   }
   if($type == 2){
      $registrationQuery = "INSERT INTO employer (nic, email, name, address, tp ,password) VALUES ('$nic', '$email', '$names', '$address', '$tp', '$pw')";
   } 
   if($type == 3){
      $registrationQuery = "INSERT INTO jobseeker (nic, email, name, address, tp ,password, status) VALUES ('$nic', '$email', '$names', '$address', '$tp', '$pw', '0')";
   }
   if (mysqli_query($db,$registrationQuery) === TRUE) {

      $user = "94766449000";
      $passwordsms = "6183";
      $text = urlencode("ONLINE JOBS !..!     Hello ".$names."....  Use '". $pw."' to complete your registration");
      $to = $tp;

      $baseurl ="http://www.textit.biz/sendmsg";
      $url = "$baseurl/?id=$user&pw=$passwordsms&to=$to&text=$text";
      $ret = file($url);

      $res= explode(":",$ret[0]);

      if (trim($res[0])=="OK")
      {
        echo "Message Sent - ID : ".$res[1];
      }
      else
      {
        echo "Sent Failed - Error : ".$res[1];
      }
      echo "<script> alert('User registerd...'); </script>";
      header("location: ../sms.php");
      
  } 
  else{
   echo "<script> alert('Error...'); </script>";
   header("location: ../sms.php");
   die();
}
}

?>