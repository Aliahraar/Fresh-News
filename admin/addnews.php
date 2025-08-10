<?php
include('db_connect.php');


if (isset($_POST['save'])) {

// Set the display duration (e.g., 7 days)
   $start_time = date('Y-m-d H:i:s');
   $end_time = date('Y-m-d H:i:s', strtotime('+1 days'));

    $title = $_POST['title'];
    $news = $_POST['news'];
    $time = $_POST['time'];
    $categoryid = $_POST['categoryid'];
   

    $image = $_FILES['image']['name'];
   
    $source_image = $_FILES['image']['tmp_name'];
   
    $allowedimage = array('image/jpeg', 'image/jpg', 'image/png');
    $extimage = substr($image, strrpos($image, '.') + 1);
    $time = time();
    $image_name = $image . "_" . $time . "." . $extimage;
    if (in_array($_FILES['image']['type'], $allowedimage)) {
        $destination = "images/";
        move_uploaded_file($source_image, $destination . $image_name);
    } else {
        echo   $msgErr = "this type of file is not allowed!";
    }

        $query = "INSERT INTO `news`( `titles`, `artical`, `image`, `category_id`, `time`,`start_time`,`end_time`) VALUES ('$title','$news','$image_name','$categoryid','$time','$start_time','$end_time')";
        $result = mysqli_query($Connect, $query);

        // action 
        if ($result) {
            header("location:addnews.php?save=1");
            
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

    <?php include('links.php'); ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">

            <div class="navbar-bg"></div>
            <?php include('nav.php'); ?>
            <?php include('sidebar.php'); ?>


            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>News</h1>
                        <div class="ml-auto">
                            <a href="" class="btn btn-primary"><i class="fas fa-plus"></i> Button</a>
                        </div>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data">

                                            <div class="form-group mb-3">
                                                <label>tital</label>
                                                <input type="text" class="form-control" name="title" value="">
                                            </div>

                                            <div class="form-group mb-3">
                                                <label>categories</label>
                                                <select name="categoryid" id="" class="form-control">
                                                    <?php



                                                    $select  = "SELECT * FROM `categories` ";
                                                    $selectQuery = mysqli_query($Connect, $select);

                                                    while ($row = mysqli_fetch_assoc($selectQuery)) {

                                                        $categoryName = $row['categName'];
                                                        $categoryid = $row['idcategory'];

                                                        echo "
                                            <option value='$categoryid'>$categoryName</option>
                                                ";
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group mb-3">
                                                <label>time</label>
                                                <input type="text" class="form-control timepicker" name="time" value="">
                                            </div>


                                            <div class="form-group mb-3">
                                                <label>News</label>
                                                <textarea name="news" class="form-control snote" cols="30" rows="10"></textarea>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label>Photo</label>
                                                <div>
                                                    <input type="file" name="image">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="save" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
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