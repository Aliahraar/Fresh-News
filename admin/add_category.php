<?php
include('db_connect.php');
 

    $categoryName=$_POST['categoryName'];
    $describtion=$_POST['describtion'];
     
  

$insert = "INSERT INTO `categories`( `categName`, `describtion`) VALUES ('$categoryName','$describtion')";
$insertQuery = mysqli_query($Connect, $insert);


  header('location: category.php');


?>