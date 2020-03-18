<?php
session_start();
include("../model/config.php");
// session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 

   $userEmail = $_POST['username'];
   $userPassword = md5($_POST['password']); 
   $userName='NULL';

   $sql1 = "SELECT * FROM admin WHERE email = '$userEmail' and password = '$userPassword'";
   $result1 = mysqli_query($db,$sql1);

   $sql2 = "SELECT * FROM employer WHERE email = '$userEmail' and password = '$userPassword'";
   $result2 = mysqli_query($db,$sql2);

   $sql3 = "SELECT * FROM  jobseeker WHERE email = '$userEmail' and password = '$userPassword'  and status = '1'";
   $result3 = mysqli_query($db,$sql3);

   if (mysqli_num_rows($result1)>0) {
      $row = mysqli_fetch_array($result1);
      // $active = 1;
      $countAdmin = mysqli_num_rows($result1);
      $userName= $row['name'];
      $address=$row['address'];
      $nic=$row['nic'];
      $tp=$row['tp'];
      // echo "in admin";
   }
   if (mysqli_num_rows($result2)>0) {
      $row = mysqli_fetch_array($result2);
      // $active = 2;
      $countEmployer = mysqli_num_rows($result2);
      $userName= $row['name'];
      $nic= $row['nic'];
      // echo "in employer";

   }
   if (mysqli_num_rows($result3)>0) {
     $row = mysqli_fetch_array($result3);
     // $active = 3;
     $countJobseeker = mysqli_num_rows($result3);
     $userName= $row['name'];
     // echo "in js";

   }

      // If result matched $userEmail and $userPassword, table row must be 1 row

  if($countAdmin > 0) {
   // session_register("myusername");
   $_SESSION['login_user'] = $userEmail;
   $_SESSION['login_name'] = $userName;
   // echo $userName;
   // die;
   $_SESSION['admin'] = "admin";
   $_SESSION['login_user_add']= $address;
   $_SESSION['login_user_tp']= $tp;
   $_SESSION['login_user_nic']= $nic;
   // var_dump($_SESSION);die;
   header("location: ../AdminHome.php");
  }
  if ($countEmployer > 0) {
     // session_register("myusername");
     $_SESSION['login_user'] = $userEmail;
     $_SESSION['login_user_name'] = $userName;
     $_SESSION['employer'] = "employer";
     $_SESSION['nic']="$nic";
     header("location: ../EmployerHome.php");
  }
  if ($countJobseeker > 0) {
     // session_register("myusername");
     $_SESSION['login_user'] = $userEmail;
     $_SESSION['login_user_name'] = $userName;
     $_SESSION['jobseeker'] = "jobseeker";
     header("location: ../JobseekerHome.php");
     
  }

  else {
     $error = "Your Login Name or Password is invalid";
     echo "<script> 
     alert('Your Login Name or Password is invalid');
     window.location.href = '../index.php';
     </script>";
  }
 
}
?>