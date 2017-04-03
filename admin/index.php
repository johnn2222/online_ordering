<?php
ob_start();
session_start();
include_once "includes/config.php";

if(!empty($_SESSION["admin"]["id"]))
{

header('location:dashboard.php');

}

include "includes/library-functions.php";

$objConnect=new connect();

if($objConnect->checkConnection())

{

   $objLogin=new login();

   if(isset($_POST['adminLogin']) && $_POST['adminLogin']=='loginAction')

   {

     $objLogin->adminLogin($_POST);

   }

}

?>

<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Mosaddek">
<meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<link rel="shortcut icon" href="img/favicon.png">
<title>Tandoori King Admin</title>

<!-- Bootstrap core CSS -->

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-reset.css" rel="stylesheet">

<!--external css-->

<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

<!-- Custom styles for this template -->

<link href="css/style.css" rel="stylesheet">
<link href="css/style-responsive.css" rel="stylesheet" />

<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->

<!--[if lt IE 9]>



    <script src="js/html5shiv.js"></script>



    <script src="js/respond.min.js"></script>



    <![endif]-->

</head>

<body class="login-body">
<div class="container">
 <form class="form-signin" action="" method="post">
  <input type="hidden" name="adminLogin" value="loginAction">
  <h2 class="form-signin-heading">sign in now</h2>
  <div class="login-wrap">
   <?=$objLogin->printMessage()?>
   <input type="text" class="form-control" id="username" name="username" value="<?=isset($_POST['username'])?$_POST['username']:''?>"  placeholder="User ID" autofocus>
   <input type="password" id="password" name="password" value="<?=isset($_POST['password'])?$_POST['password']:''?>"  class="form-control" placeholder="Password">
   <label class="checkbox"> <span class="pull-right"> <a data-toggle="modal" href="#myModal"></a> </span> </label>
   <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
  </div>
  
  <!-- Modal -->
  
  
  
  <!-- modal -->
  
 </form>
</div>

<!-- js placed at the end of the document so the pages load faster --> 

<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
</body>
</html>
