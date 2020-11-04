<?php

require_once 'auth.php';
// HTML authentication
authHTML();

require_once "config.php";
$session_username = $_SESSION["userlogin"];
$query = "SELECT id, username, employee_id, employee_name, team_name FROM users WHERE username = '$session_username' ";
$result1 = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result1);

?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id=$_REQUEST['id'];
  //  $username =$_REQUEST['username'];
    $employee_id =$_REQUEST['emp_id'];
    $employee_name =$_REQUEST['emp_name'];
    $team_name =$_REQUEST['team_name'];

    $update="update users set employee_id='".$employee_id."', employee_name='".$employee_name."',team_name='".$team_name."' where id='".$id."'";
    mysqli_query($link, $update) or die(mysqli_error());
    header("Refresh:0");
      }
  ?>
<?php



// If the user requested logout go back to index.php
if ( isset($_POST['logout']) ) {
    header('Location: index.php');
    return;
}

?>

<?php
include 'templates/header2.php';
?>

<div class="container" style="padding-top: 10px;">
<div class="panel panel-default ">

<div class="panel-heading">
    <div class="row">
<div class="col-sm-10" >PROFILE EDIT FORM</div>
    <div class="col-sm-2">
    <a href="/index.php" >Back To Dashboard</a>
</div>
</div>

  
</div>

<div class="panel-body">


<div class="row">

<!--Play-card column Begins-->
  <div class="col-sm-8">
   
  <form class="form-horizontal" id="rps_form" autocomplete="off" method="post" action="" >
    <input type="hidden" name="new" value="1" />
    <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
  <div class="form-group">
    <label class="control-label col-sm-2" for="username">Username:</label>
    <div class="col-sm-10">
      <input type="text" disabled class="form-control" name="username" placeholder="Enter Username" value="<?php echo $row['username'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="emp_id">Employee ID:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="emp_id" placeholder="Enter Employee ID" value="<?php echo $row['employee_id'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="emp_name">Employee Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="emp_name" placeholder="Enter Employee Name" value="<?php echo $row['employee_name'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="team_name">Team Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="team_name" placeholder="Team Name" value="<?php echo $row['team_name'];?>">
    </div>
  </div>
   <div class="form-group">
    <div class="col-sm-2">
    <input name="submit" type="submit" value="Update" />   
     </div>
  </div>


  
 
  </form>
 
 
  </div>
  <!--play-card column Ends-->

  
 
</div>
</div>
</div>
</div><!-- /.container -->
<script type="text/javascript">




</script>
<?php
include 'templates/footer2.php';
