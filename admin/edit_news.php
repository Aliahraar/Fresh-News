<?php
include('db_connect.php');
$id = $_GET['id'];

if (isset($_POST['save'])) {
   

    $title = $_POST['title'];
    $artical = $_POST['artical'];
    $time = $_POST['time'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
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

       
        $update_sql = "update `news` set  `titles`='$title',`artical`='$artical',`image`='$image_name',`category_id`='$categoryid',`time`='$time',`start_time`='$start_time',`end_time`='$end_time' where idnews='$id'";

        $result = mysqli_query($Connect, $update_sql);

        // action 
        if ($result) {
            header("location:list_of_news.php?save=1");
            
        }
    }

   
    $select  = "SELECT  news.titles, news.artical,  news.image, news.date,news.start_time,news.end_time, categories.categName AS category_name
    FROM news
    JOIN categories ON news.category_id = categories.idcategory where news.idnews=$id
    ";
      $selectQuery = mysqli_query($Connect, $select);
      while ($row = mysqli_fetch_assoc($selectQuery)) {
          $title_old = $row['titles'];
          $artical_old = $row['artical'];
          $category_old = $row['category_name'];
          $image_old = $row['image'];
          $date_old = $row['date'];
          $time_old = $row['date'];
          $start_time_old = $row['start_time'];
          $end_time_old = $row['end_time'];
        }
require_once('header.php');
?>

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
                                                <input type="text" class="form-control" name="title" value="<?php echo" $title_old" ?>">
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
                                                <input type="text" class="form-control " name="time" value="<?php echo" $time_old" ?>">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>start_time</label>
                                                <input type="text" class="form-control " name="start_time" value="<?php echo" $start_time_old" ?>">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>end_time</label>
                                                <input type="text" class="form-control " name="end_time" value="<?php echo" $end_time_old" ?>">
                                            </div>


                                            <div class="form-group mb-3">
                                                <label>News</label>
                                                <textarea name="artical" class="form-control snote" cols="30" rows="10"><?php echo" $artical_old" ?></textarea>
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

<?php include('footer.php'); ?>