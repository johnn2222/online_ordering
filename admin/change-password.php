<?php
$page=5;$subPage='change-password';
include_once "includes/head-section.php";
?>
<script type="text/javascript" src="<?=WEBROOT_ADMIN?>js/base.js"></script>
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
     
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
            <?=getMsg()?>
              <div class="row">
                 <div class="col-xs-12 col-sm-6">Change Password</div>                
                
              </div>
              
            </header>
            <div class="panel-body">
              <div class="form"> 
       <form method="post" id="change-pwd" action="process-library.php">
      <input type="hidden" name="action" value="change-password">
      <input type="hidden" name="returnUrl" value="<?=$_SERVER['REQUEST_URI']?>">

       <input type="hidden" name="dealer_id" value="<?=$_SESSION['administrator']['dealer']['dealer_id']?>">

 
      
      <div class="form-group">
			<div class="col-lg-2 col-sm-2">
            <label for="" class="control-label">Old Password<span>*</span></label>
            </div>
            <div class="col-lg-10 col-sm-10"> 
            <input type="password" name="old_pwd" id="old_pwd" class="form-control mrg-t">
            </div>
          
        </div>
         
      <div class="form-group">
          <div class="col-lg-2 col-sm-2">
            <label for="" class="control-label">New Password<span>*</span></label>
          </div>
            <div class="col-lg-10 col-sm-10">
            <input type="password" name="pwd" id="pwd" class="form-control mrg-t">
           </div>         
      </div>
     
      <div class="form-group">
          <div class="col-lg-2 col-sm-2">
            <label for="" class="control-label">Confirm Password<span>*</span></label>
            </div>
           <div class="col-lg-10 col-sm-10">
            <input type="password" name="cfpwd" id="cfpwd" class="form-control mrg-t">
           </div>
           
      </div>

      <div class="form-group">
      <div class="col-lg-2 col-sm-2">
      &nbsp;
      </div>
          <div class="col-lg-10 col-sm-10">                      
           <input type="submit" class="btn btn-primary" value="Save" name="submit">
           </div>
     </div>
      </form>      
              </div>
              
            </div>
          </section>
        </div>
      </div>
     
      <!-- page end-->
    </section>
  </section>
  <!--main content end-->
  <!--footer start-->
  <?php include_once "includes/footer.php";?>
  <!--footer end-->
</section>


</body>
</html>