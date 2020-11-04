<?php

require_once 'auth.php';
// HTML authentication
authHTML();
include 'templates/header2.php';

?>

<div class="container" style="padding-top: 10px;">
<div class="panel panel-default ">
<div class="panel-heading">
Dashboard 

</div>
<div class="panel-body">
<a href="/edit_profile.php">Edit Profile</a> </br>

</div>
</div>
</div><!-- /.container -->

<?php
include 'templates/footer2.php';