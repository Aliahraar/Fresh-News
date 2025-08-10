<?php  include('./admin/db_connect.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <link rel="stylesheet" href="./CSS/style.css">
  <link rel="stylesheet" media = 'screen and (max-width: 768px)' href="./CSS/mobile.css">
  <link href="https://fonts.googleapis.com/css?family=Lato|Staatliches&display=swap" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <script src="https://kit.fontawesome.com/85a5fdd30e.js" async></script>

  <title>NewsGrid | Your News Website</title>
</head>
<body>
  
 <?php
 include('nav.php');
 ?>

  <header id = 'showcase'>
    <div class="container">
      <div class="showcase-container">
        <div class="showcase-content">
          <div class="category category-sports">
            Sports
          </div>
          <h1>Sports Article</h1>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste deserunt, at laborum accusamus veniam reprehenderit deleniti reiciendis vel animi ipsum obcaecati ex nesciunt ipsa, voluptatibus provident, quas doloribus molestias. Saepe.</p>
          <a href="article.php" class="btn btn-primary">Read More</a>
        </div>
      </div>
    </div>
  </header>

  <section id="home-articles" class="py-2">
    <div class="container">
      
      <h2>The Day News</h2>
      <div class="articles-container">
        <?php 
       
        $select  = "SELECT news.titles, news.artical, news.image, news.date, categories.categName AS category_name
        FROM news
        JOIN categories ON news.category_id = categories.idcategory
        WHERE NOW() BETWEEN news.start_time AND news.end_time
        ORDER BY news.date DESC;
        ";


        $selectQuery = mysqli_query($Connect, $select);
        while ($row = mysqli_fetch_assoc($selectQuery)) {
          $title = $row['titles'];
          $artical = $row['artical'];
          $category = $row['category_name'];
          $image = $row['image'];
          $date = $row['date'];
        echo"  <article class='card'>
          <img size='' src='./admin/images/$image'>
          <div>
            <div class='category category-ent'>
              $category
            </div>
            <h3>
              <a href='article.html'>$title</a>
            </h3>
            <p>$artical</p>
          </div>
        </article>";
        
       }
         
        ?>
        

      </div>
    </div>
  </section>
  
  <?php
   include('footer.php');
  ?>

</body>
</html>