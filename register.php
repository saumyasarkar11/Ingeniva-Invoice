<?php
session_start();
?>
<!DOCTYPE html>
<!-- saved from url=(0074)https://demo.dashboardpack.com/architectui-html-pro/pages-login-boxed.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">
    <link rel="icon" href="assets/images/favicon.png" type="image/png">
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

<link href="./login/main.d810cf0ae7f39f28f336.css" rel="stylesheet"><style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style></head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100 bg-plum-plate bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box  col-6">
                        <div align="center"><h3 style="color:white;"><img src="assets/images/logo1.png">invoice</h3></div>
                        <div class="modal-dialog w-100 " style="margin-top:-5px;">
                            <div class="modal-content ">
                                <div class="modal-body">
                                    <div class="h5 modal-title text-center">
                                        <h4 class="mt-2">
                                            <div>Sign Up</div>
                                            <span>Create Your account here!</span>
                                        </h4>
                                    </div>

                                    <form action="code.php" method="POST">
                                            <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                <input type="text" name="firstname" placeholder="Firstname" class="form-control" required="true">
                                                </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                <input type="text" name="lastname" placeholder="Lirstname" class="form-control" required="true">
                                                </div>
                                            </div>
                                            </div>
                                            

                                            <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                <input type="text" name="company_name" placeholder="Company Name" class="form-control" required="true">
                                                </div>
                                            </div>
                                            </div>

                                            <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                <input type="email" name="email" placeholder="Email" class="form-control" required="true">
                                                </div>
                                            </div>
                                            </div>

                                            <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                <input type="password" name="password" placeholder="Password" class="form-control" required="true">
                                                </div>
                                            </div>
                                            </div>

                                            <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                <input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control" required="true">
                                                </div>
                                            </div>
                                            </div>
Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos doloribus quisquam magnam repellendus sequi sint, laboriosam consectetur, mollitia nulla, consequatur assumenda officia molestiae eaque voluptas? Hic sequi nobis odit eum?
<?php
                     
                     if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
                      echo '<p class="text-danger" align="center"> '.$_SESSION['status']. '</p>';
                      unset($_SESSION['status']);
                     }

                     ?>
                                </div>
                                <div class="modal-footer clearfix">
                                    
                                    <div class="float-right">
                                        <button type="submit" name="login" class="btn btn-primary btn-lg">Register</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="text-center text-white opacity-8 mt-3">Copyright © Ingeniva 2021</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="./login/main.d810cf0ae7f39f28f336.js.download"></script>

</body>
</html>