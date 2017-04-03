<?php
$page=5;
$subPage="add-coupan";
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
   <section class="wrapper">
      <!-- page start-->
      <?php
	  		$action='';
               if(isset($_REQUEST['action']))
			   {
			    $action=$_GET['action'];
			   }

                  $coupan=new coupan();				  
                  $coupanId=mysql_real_escape_string($_GET['coupanId']);
                 	foreach($coupan->getCoupanById($coupanId) as  $CoupRes){$CoupRes;}
                
                switch($action)
                {
                  case 'edit':                    
              ?>
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">Edit Coupan </header>
            <div class="panel-body">
              <div class="form"> <span id="process" style="margin-left:540px;display:none;margin-bottom:5px;"> <img src="<?=WEBROOT_ADMIN?>img/loadingAnimation.gif" /></span> <span id="msg" style="size:14px;font-weight:bold;"></span>
                <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="process-library.php" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="editCoupan">
                  <input type="hidden" name="coupanId" value="<?=$_GET['coupanId']?>">
                  <input type="hidden" name="returnUrl" value="coupan-list.php" >
                  
                  <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Coupan Code</label>
                    <div class="col-lg-10">
                    <input type="text" class="form-control" name="info[coupan_code]" value="<?=$CoupRes->coupan_code?>" id="coupan_code">
                    </div>
                  </div>
                  
                   <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Coupan Amt.</label>
                    <div class="col-lg-10">
                    <input type="text" class="form-control" name="info[coupan_amt]" value="<?=$CoupRes->coupan_amt?>" id="coupan_amt">
                    </div>
                  </div>                   
                  
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-danger" type="submit" id="sbmt">Save</button>
                      <button class="btn btn-default" type="button">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </section>
        </div>
      </div>
      <?php  
                break;
                 default:
              ?>
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading"> Add Coupans </header>
            <div class="panel-body">
  <div class="form"> <span id="process" style="margin-left:540px;display:none;margin-bottom:5px;"> <img src="<?=WEBROOT_ADMIN?>img/loadingAnimation.gif" /></span> <span id="msg" style="size:14px;font-weight:bold;"></span>
                <form class="cmxform form-horizontal tasi-form" id="addItem" method="post" action="process-library.php" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="addCoupan">
                  <input type="hidden" name="returnUrl" value="<?=$_SERVER['REQUEST_URI']?>" >                  
                  
                                  
                  
                  
                  <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Coupan Code</label>
                    <div class="col-lg-10">
                    <input type="text" class="form-control" name="info[coupan_code]" id="coupan_code">
                    </div>
                  </div>
                  
                   <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Coupan Amt.</label>
                    <div class="col-lg-10">
                    <input type="text" class="form-control" name="info[coupan_amt]" id="coupan_amt">
                    </div>
                  </div>           
                                
                
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-danger" type="submit" id="sbmt">Save</button>
                      <button class="btn btn-default" type="button">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </section>
        </div>
      </div>
      <?php break;
                }
              ?>
      <!-- page end-->
    </section>
  </section>
  <!--main content end-->
  <!--footer start-->
  <?php include_once "includes/footer.php";?>
