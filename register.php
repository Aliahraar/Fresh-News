<?php
 session_start();
include('./admin/db_connect.php');

if(isset($_POST['save'])){

    $userName = $_POST['username'];
    $lName = $_POST['lastname'];
    $password = $_POST['password'];    
    
      
    $insert = "INSERT INTO `user`( `userName`, `lastName`,  `password`) VALUES ('$userName','$lName','$password')";
    $insertQuery = mysqli_query($Connect, $insert);
    // action 
    if($insertQuery){
       
        setcookie("username", $userName,time()+60*60);
        setcookie("password",$password,time()+60*60);
        $_SESSION['loginsession']=$userName;
        header("location:./admin/admin.php");

    }
    }
  



//  if(isset($_POST['submit'])){
//     $username=$_POST['username'];
//     $password=$_POST['password'];
    
//     $data = [
//         'username' => $username,
//         'password' => $password
//     ];

//     $file = fopen('data.csv', 'a');
//     fputcsv($file, $data);
//     fclose($file);
//     echo "Data has been saved successfully!";
// } else {
//     echo "Invalid request.";

// }
