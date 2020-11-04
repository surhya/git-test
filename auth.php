<?php
session_start();
 $username_err = "";
 $notavailable = "";
 
function authHTML()
{
    // 	if not auhtenticaded session go to login.php
    if (empty($_SESSION['userlogin'])) {
        header('Location: login.php');
        exit();
    }
}

function authAPI()
{
    $user = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : '';
    $pass = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';

    if (!isValidUser($user, $pass)) {
        $_SESSION['userlogin'] = FALSE;
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
        die("Not authorized");
    }

    $_SESSION['userlogin'] = $user;
}

function isValidUser($user, $pass)
{
 
    
   
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
     //   require_once 'config.php';
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "eagle_dev";  
    
       
    // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
      
        //$conn = new mysqli('Localhost','id14603260_root','~]8p40FF=3p\Vap0','id14603260_eagle_dev');
    
        $user = $conn->real_escape_string(htmlspecialchars(trim($_POST['userlogin'])));
        $query = "SELECT username FROM `users` WHERE `username` = '$user' and `password` = '$pass'";
    
        $result = $conn->query($query);
        if($result->num_rows > 0) {
           return TRUE;
           die();
        }
       // else $message = 'user does not exist';
       else 
     //  echo '<script>alert("User Not Exists")</script>'; 
      //echo '<span class="danger">user not exists</span>';
     // $username_err = "User Not Exists";
     
      
     return false;
     
    
    }
  


    // 	Implement validation: db, array, whatever...
 /*   if ($user === 'admin' && $pass === 'admin') {
        return TRUE;
    }

    return FALSE;     */




}
