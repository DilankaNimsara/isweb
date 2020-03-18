<?php
   include('./model/config.php');
   session_start();

   if(!isset($_SESSION['employer'])){
      header("location:./index.php");
   }
?>