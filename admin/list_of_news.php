
<?php 
 include('db_connect.php');
 if(isset($_GET['id'])){

  
    $id = $_GET['id'];
    
    $sql = "DELETE FROM `news` WHERE idnews= '$id'";
    $query = mysqli_query($Connect, $sql);
    
    if($query){
    
      header("location:list_of_news.php?Deleted=1"); 
      die;
    }
    
    
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="uploads/favicon.png">

    <title>Admin Panel</title>
    <?php include('links.php');?>
</head>

<body>
<div id="app">
    <div class="main-wrapper">

        <div class="navbar-bg"></div>
        <?php include('nav.php');?>
       <?php include('sidebar.php');?>



<div class="main-content">
<section class="section">
    <div class="section-header">
        <h1>Table</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                <tr>
                                    <th>title</th>
                                    <th>category</th>
                                    <th>start_time</th>
                                    <th>end_time</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    include('db_connect.php');
                                $select  = "SELECT news.idnews, news.titles,  news.image, news.date,news.start_time,news.end_time, categories.categName AS category_name
                                FROM news
                                JOIN categories ON news.category_id = categories.idcategory ORDER BY news.time DESC
                                ";


                                $selectQuery = mysqli_query($Connect, $select);
                                while ($row = mysqli_fetch_assoc($selectQuery)) {
                                    $title = $row['titles'];
                                    $category = $row['category_name'];
                                    $image = $row['image'];
                                    $id = $row['idnews'];
                                    $date = $row['date'];
                                    $start_time = $row['start_time'];
                                    $end_time = $row['end_time'];
                                echo" <tr>
                                <td>$title</td>
                                <td>$category</td>
                                <td>$start_time</td>
                                <td>$end_time</td>
                                <td class='pt_10 pb_10'>
                                  
                                    <a href='edit_news.php?id=$id' class='btn btn-primary'>edit</a>
                                    <a href='list_of_news.php?id=$id' class='btn btn-danger' >Delete</a>
                                </td>
                                
                            </tr> ";
                                
                                }
                                    
                                ?>
                                
                                </tbody>
                              
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

</div>
</div>

<script src="dist/js/scripts.js"></script>
<script src="dist/js/custom.js"></script>

</body>
</html>