<?php
ob_start();
include_once "sessionCheck.php";
include_once "library-functions.php"; 
$objConnect=new connect();
$objConnect->checkConnection();
?> 

<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">



    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="shortcut icon" href="">

    <script src="js/jquery.js"></script>

    <title>Haveli Indian Restaurant </title>







    <!-- Bootstrap core CSS -->



    <link href="css/bootstrap.min.css" rel="stylesheet">



    <link href="css/bootstrap-reset.css" rel="stylesheet">



    <!--external css-->



    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />



    <link href="css/table-responsive.css" rel="stylesheet" />



  



    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">



    <!-- Custom styles for this template -->



    <link href="css/style.css" rel="stylesheet">



    <link href="css/style-responsive.css" rel="stylesheet" />



	



	<!--date picker-->



	<link href="css/jquery.timepicker.css" rel="stylesheet" />



	<link href="css/base.css" rel="stylesheet" />

    <link href="css/dashboard.css" rel="stylesheet" />



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->



    <!--[if lt IE 9]>



      <script src="js/html5shiv.js"></script>



      <script src="js/respond.min.js"></script>



	  -->



	  <style>



	  .form-group label, .form-group .form-control {



  		color: #333;



	 	}



	  </style>