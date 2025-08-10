
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
                                    <form action="../add_category.php" method="post" enctype="multipart/form-data">

                                        
                                       <div class="form-group mb-3">
                                            <label>categoryName</label>
                                            <input type="text" class="form-control" name="categoryName" value="">
                                        </div> <div class="form-group mb-3">
                                            <label>describtion</label>
                                            <input type="text" class="form-control" name="describtion" value="">
                                        </div>
                                       
                                        
                            
                                        <div class="form-group">
                                            <button type="submit"  name="insert" class="btn btn-primary">Submit</button>
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