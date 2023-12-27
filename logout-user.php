<?php
session_start();
session_unset();
session_destroy();
header('location: login-user.php');
?>
<button type="button" class="btn btn-light"><a href="https://www.youtube.com/">go</a></button>
