<?php require_once('header.php'); ?>
    <div id="app">
        <div class="main-wrapper">
            <section class="section">
                <div class="container container-login">
                    <div class="row">
                        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                            <div class="card card-primary border-box">
                                <div class="card-header card-header-auth">
                                    <h4 class="text-center">Admin Panel Login</h4>
                                </div>
                                <div class="card-body card-body-auth">
                                    <form method="POST" action="auth/get_login.php">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="username" placeholder="username" value="<?php if (isset($_COOKIE['username'])) {
                                                                                                                                        echo $_COOKIE['username'];
                                                                                                                                    } ?>" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" value="<?php if (isset($_COOKIE['password'])) {
                                                                                                                    echo $_COOKIE['password'];
                                                                                                                }  ?>" placeholder="Password">
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="submit" value="login" class="btn btn-primary btn-lg btn-block">
                                                Login
                                            </button>
                                        </div>
                                        <div class="remember-me">
                                            <input type="checkbox" name="remember" <?php if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
                                                                                        echo  "checked='checked'";
                                                                                    }  ?>>
                                            <span style="color: #DDD">Remember Me</span>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <a href="forget-password.html">
                                                    Forget Password?
                                                </a>
                                            </div>
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