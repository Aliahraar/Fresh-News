
<?php require_once('header.php'); ?>
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
                                    <form action="add_category.php" method="post" enctype="multipart/form-data">

                                        
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

<?php include('footer.php'); ?>