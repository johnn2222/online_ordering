<?php
ob_start();
session_start();
include "includes/config.php";
session_destroy();
header('location:'.WEBROOT_ADMIN);
?>