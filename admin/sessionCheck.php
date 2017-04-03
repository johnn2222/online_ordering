<?php
ob_start();
session_start();
include "includes/config.php";
if($_SESSION['admin']['id']=='' && $_SESSION['admin']['username']=='')
{
header('location:'.WEBROOT_ADMIN);
}
else
{
  return true;
}

?>