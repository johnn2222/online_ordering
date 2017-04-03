<?php
$page=5;
$subPage="add-food-category";
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
              
                  $objCategory=new category();
                  $categoryId=$_GET['categoryId'];
                 	foreach($objCategory->getCategoryById($categoryId)as  $categoryInformation){ $categoryInformation;}
                
                switch($action)
                {
                  case 'edit':                    
              ?>
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">Edit Food Category </header>
            <div class="panel-body">
              <div class="form"> <span id="process" style="margin-left:540px;display:none;margin-bottom:5px;"> <img src="<?=WEBROOT_ADMIN?>img/loadingAnimation.gif" /></span> <span id="msg" style="size:14px;font-weight:bold;"></span>
                <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="process-library.php" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="editCategory">
                  <input type="hidden" name="categoryId" value="<?=$_GET['categoryId']?>">
                  <input type="hidden" name="returnUrl" value="show-food-category.php" >
                  
                   <?php if($objCategory->getParentNum()>1){?>
                  <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Parent Category</label>
                    <div class="col-lg-10">
                    <select name="info[lable]" class="form-control">
                    <option value=""><--select Parent--></option>
                    <?php foreach($objCategory->getParentCat() as $parent){?>
                    <option value="<?=$parent->id?>" <?=$categoryInformation->lable==$parent->id?'selected':''?>><?=$parent->category?></option>
                    <?php }?>
                    <option value=""></option>
                    </select>
                    </div>
                  </div>
                  <?php }?> 
                  
                  <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Category Name</label>
                    <div class="col-lg-10">
                    <input type="text" class="form-control" name="info[category]" value="<?=$categoryInformation->category?>" id="category">
                    </div>
                  </div>
                  
                    <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Background Image</label>
                    <div class="col-lg-10">
                    <img src="<?=IMAGE_ROOT."category/".$categoryInformation->image?>" width="100px">
                    <input type="hidden" name="oldFile" value="<?=$categoryInformation->image?>">
                    <input type="file" name="img" class="form-control" id="img">
                     <div id="img_error" style="color:red;"></div>
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
            <header class="panel-heading"> Add Food Category </header>
            <div class="panel-body">
  <div class="form"> <span id="process" style="margin-left:540px;display:none;margin-bottom:5px;"> <img src="<?=WEBROOT_ADMIN?>img/loadingAnimation.gif" /></span> <span id="msg" style="size:14px;font-weight:bold;"></span>
                <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="process-library.php" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="addCategory">
                  <input type="hidden" name="returnUrl" value="<?=$_SERVER['REQUEST_URI']?>" > 
                  
                  <?php if($objCategory->getParentNum()>1){?>
                  <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Parent Category</label>
                    <div class="col-lg-10">
                    <select name="info[lable]" class="form-control">
                    <option value=""><--select Parent--></option>
                    <?php foreach($objCategory->getParentCat() as $parent){?>
                    <option value="<?=$parent->id?>"><?=$parent->category?></option>
                    <?php }?>
                    </select>
                    </div>
                  </div>
                  <?php }?> 
                  
                  
                  <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Category Name</label>
                    <div class="col-lg-10">
                    <input type="text" class="form-control" name="info[category]" id="category">
                    </div>
                  </div>
                    <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Background Image</label>
                    <div class="col-lg-10">
                    <input type="file" name="img" class="form-control" id="img">
                    <div id="img_error" style="color:red;"></div>
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
