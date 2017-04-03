<?php 
$page=5;$subPage='new-listing';
include_once('sessionCheck.php');
include_once "includes/head-section.php"; 
	?>
	
</head>
<body>
<section id="container" class="">

  <!--header start-->

  <?php include_once "includes/header.php";?>

  <!--header end-->

  <!--sidebar start-->

  <?php include_once "includes/sidebar.php";?>

  <!--sidebar end-->

  <!--main content start-->

  <section id="main-content">
<?php
$objUtils=new utils();

$objProduct=new product();

?>

<section class="wrapper"> 

      <!-- page start-->

      <div class="row">

      <div class="col-lg-12">

      <section class="panel">

        <header class="panel-heading">

          <div class="row">

            <div class="col-xs-12 col-sm-6">Add Image</div>
        

          </div>

        </header>

        <div class="panel-body">
		<?=getMsg()?>

        <section id="" class="table-responsive">

          <form method="post" enctype="multipart/form-data" id="productImageUpload" action="upload.php">
				        <input type='hidden' value='<?=$_GET['productid']?>' name='productid'>
    		  			<div class="form-group">
                    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    	<label for="" class="control-label">Select Product Image<span>*</span></label>
                    	</div>
                    	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                         <input type='file' id='prd_img' name="prdImg[]" class="form-control" multiple class="btn btn-info" >
                        </div>
                        </div>
                        
                        <div class="col-lg-12 col-lg-push-10 col-md-12 col-sm-12 col-xs-12">
                        <div class="btn btn-primary transformright">
                        <input type="submit" value="Post Ad." name="submit" id="upload" class="form-control transformleft text-color">
                        </div>
                        </div>
                        </form>

        </section>

        </div>

		      </section>

      </div>

      </div>

      <!-- page end-->

    </section>





  

<?php include_once "includes/footer.php";?>



<!-- js placed at the end of the document so the pages load faster -->

<script src="js/bootstrap.min.js"></script>

<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>

<!--<script src="js/jquery.scrollTo.min.js"></script>

<script src="js/jquery.nicescroll.js" type="text/javascript"></script>-->

<script type="text/javascript" src="js/jquery.validate.min.js"></script>

<script src="js/respond.min.js" ></script>

<!--common script for all pages-->

<script src="js/common-scripts.js"></script>

<!--script for this page-->

<script src="js/form-validation-script.js"></script>

