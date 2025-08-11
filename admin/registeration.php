<?php require_once('header.php'); ?>
<div id="app">
    <div class="main-wrapper">
        <section class="section">
            <div class="container container-login">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary border-box">
                            <div class="card-header card-header-auth">
                                <h4 class="text-center"> Registeration </h4>
                            </div>
                            <div class="card-body card-body-auth">
                                <form method="POST" action="../register.php">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" placeholder="username" value="" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="lastname" placeholder="lastname" value="" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password"  value="" placeholder="Password">
                                    </div>
                                   
                                    
                                    <div class="form-group">
                                        <button type="submit"   name="save" value="submit" class="btn btn-primary btn-lg btn-block">
                                            submit
                                        </button>
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

<?php include('footer.php'); ?>