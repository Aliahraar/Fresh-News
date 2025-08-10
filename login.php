<?php
   session_start();
   include('./admin/db_connect.php');

   
   
     if(isset($_POST['submit'])){
     $username=$_POST['username'];
     $password=$_POST['password'];
     $select  = "SELECT * FROM `user` ";
     $selectQuery = mysqli_query($Connect, $select);
     while ($row = mysqli_fetch_assoc($selectQuery)) {
     
      $dbUsername = $row['userName'];
      $dbPassword = $row['password']; 
    
      if($dbUsername==$username && $dbPassword==$password){
       
        if(isset($_POST["remember"])){
          setcookie("username",$username,time()+60*60);
          setcookie("password",$password,time()+60*60);
          }
        $_SESSION['loginsession']=$username;

        header("location:./admin/admin.php");
        exit();
      }else{
        header("location:./admin/login.php");
      }
    
    }
      
  
 }  

?>