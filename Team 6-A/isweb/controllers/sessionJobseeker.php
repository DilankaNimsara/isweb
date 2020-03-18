<?php
   include('./model/config.php');
   session_start();
   
   if(!isset($_SESSION['jobseeker'])){
      header("location:./index.php");
   }
?>