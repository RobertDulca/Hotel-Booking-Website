<?php
$_SESSION = array();

unset($_SESSION['username']);
unset($_SESSION['admin']);
session_destroy();
header('Refresh: 1; URL =index.php?menu=home');
?>

<div class="container">
   <h3 class="text-center">You will be logged out now!</h3>
</div>