<?php
require_once 'auth.php';

if (!empty($_POST['userlogin']) && !empty($_POST['pass'])) {
    
    // Verify user and password
    if (isValidUser($_POST['userlogin'], $_POST['pass'])) {
        // Log in
        $_SESSION['userlogin'] = $_POST['userlogin'];
        header('Location: index.php');
        exit();
    }
    else
    {
        $notavailable = "INVALID USERNAME OR PASSWORD";
      //  $_SESSION['userlogin'] = FALSE;
    }
}


// The user login page
include 'templates/header.php';
?>
 <link rel="stylesheet" type="text/css" href="style.css">
<!--login modal-->
<!-- <div id="loginModal" class="modal show bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form class="form" method="POST" action="login.php">
                <div class="modal-header">
                    <h3 class="text-center">Eagle Dev Auth</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" placeholder="login" name="userlogin">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control input-sm" placeholder="password" name="pass">
                       
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="register.php">Create Account</a>
                    <button class="btn btn-default">Login</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>  -->

<div class="container">
<div class="login">
            <div class="account-login">
               <h1>Skill-Lync Task</h1>
               <form class="login-form"  method="POST" action="login.php">
               <h2 style="text-align: center;">Login</h2>
                  <div class="form-group">
                     <input type="text" placeholder="User Name" class="form-control" name="userlogin" required>
                     
                     
                  </div>
                  <div class="form-group">
                     <input type="password" placeholder="Password"  class="form-control" name="pass" required>
                     

                  </div>
                  
                  <span name="count"  class="error" style="color: red;"><?php echo $notavailable; ?></span>
                  <button class="btn">Login</button>
                  <p>Are you new?<a href="register.php">Sign Up</a></p>
               </form>
            </div>
        </div>

</div>

<?php
include 'templates/footer.php';
