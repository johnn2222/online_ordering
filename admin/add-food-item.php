<?php

$page=5;

$subPage="add-food-item";

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

              	$objCategory = new category();

                  $prd=new product();				  

                  $prdId=mysql_real_escape_string($_GET['productId']);

                 	foreach($prd->getProductById($prdId)as  $prdRes){ $prdRes;}

                

                switch($action)

                {

                  case 'edit':                    

              ?>

      <div class="row">

        <div class="col-lg-12">

          <section class="panel">

            <header class="panel-heading">Edit Food Item(s) </header>

            <div class="panel-body">

              <div class="form"> <span id="process" style="margin-left:540px;display:none;margin-bottom:5px;"> <img src="<?=WEBROOT_ADMIN?>img/loadingAnimation.gif" /></span> <span id="msg" style="size:14px;font-weight:bold;"></span>

                <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="process-library.php" enctype="multipart/form-data">

                  <input type="hidden" name="action" value="updateProduct">

                  <input type="hidden" name="productId" value="<?=$_GET['productId']?>">

                  <input type="hidden" name="returnUrl" value="show-food-item.php" >

                  

                   <div class="form-group ">

                    <label for="firstname" class="control-label col-lg-2">Food Category</label>

                    <div class="col-lg-10">

                    <select name="info[category]" class="form-control">

                    <option value=""><--select Parent--></option>

                    <?php foreach($objCategory->getParentCat() as $parent){?>

                    <option value="<?=$parent->id?>" <?=$parent->id==$prdRes->category?'selected':''?>><?=$parent->category?></option>

                    <?php }?>

                    </select>

                    </div>

                  </div>

                   

                  

                  

                  <div class="form-group ">

                    <label for="firstname" class="control-label col-lg-2">Item Name</label>

                    <div class="col-lg-10">

                    <input type="text" class="form-control" name="info[name]" value="<?=$prdRes->name?>" id="name">

                    </div>

                  </div>

                  

                    <div class="form-group">

                    <label for="firstname" class="control-label col-lg-2">Item Description</label>

                    <div class="col-lg-10">

                  <textarea class="form-control" name="info[description]" id="description"><?=$prdRes->description?></textarea>

                    </div>

                  </div>

                  

                  <div class="form-group">

                    <label for="firstname" class="control-label col-lg-2">Item Price</label>

                    <div class="col-lg-10">

                    <input type="text" class="form-control" name="info[price]" value="<?=$prdRes->price?>" id="price">

                    </div>

                  </div>
						
                        
                      
                  

                   <div class="form-group">

                    <label for="firstname" class="control-label col-lg-2">Discount</label>

                    <div class="col-lg-10">

                    <input type="text" class="form-control" name="info[discount]" value="<?=$prdRes->discount?>" id="discount">

                    </div>

                  </div>

                  

                    <div class="form-group ">

                    <label for="firstname" class="control-label col-lg-2">Item Image</label>

                    <div class="col-lg-10">

                    <img src="<?=IMAGE_ROOT."product/".$prdRes->image?>" width="100px">

                    <input type="hidden" name="oldFile" value="<?=$prdRes->image?>">

                    <input type="file" name="img" class="form-control" id="img">

                    <div id="img_error" style="color:red;"></div>

                    </div>

                  </div>      
                  
                  
                  <div class="form-group">
                <label class="control-lagel col-lg-2">Addons:</label>
                <div class="col-lg-10">
                <?php
					
				$j=0; 				
				foreach($prd->getAddonList() as $addon){
					$chkd='';
					foreach($prd->getAddonListByPrd($prdRes->id) as $getAddon)
					{						
					$chkd.=($addon->id==$getAddon->addon_id)?"checked":'';
					}
					?>
                <input type="checkbox" name="addon[]" <?=$chkd?> value="<?=$addon->id?>"> <?=ucwords($addon->addon_name)." "."$".$addon->addon_price?>
				<?php 
				$j++;
				
				if($j%6==0){echo "<br>";}
				 	
				} 
				 ?>              
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

            <header class="panel-heading"> Add Food Item </header>

            <div class="panel-body">

  <div class="form"> <span id="process" style="margin-left:540px;display:none;margin-bottom:5px;"> <img src="<?=WEBROOT_ADMIN?>img/loadingAnimation.gif" /></span> <span id="msg" style="size:14px;font-weight:bold;"></span>

                <form class="cmxform form-horizontal tasi-form" id="addItem" method="post" action="process-library.php" enctype="multipart/form-data">

                  <input type="hidden" name="action" value="addProduct">

                  <input type="hidden" name="returnUrl" value="<?=$_SERVER['REQUEST_URI']?>" > 

                  

                  

                  <div class="form-group ">

                    <label for="firstname" class="control-label col-lg-2">Food Category</label>

                    <div class="col-lg-10">

                    <select name="info[category]" class="form-control">

                    <option value=""><--select Parent--></option>

                    <?php foreach($objCategory->getParentCat() as $parent){?>

                    <option value="<?=$parent->id?>"><?=$parent->category?></option>

                    <?php }?>

                    </select>

                    </div>

                  </div>

                   

                  

                  

                  <div class="form-group ">

                    <label for="firstname" class="control-label col-lg-2">Item Name</label>

                    <div class="col-lg-10">

                    <input type="text" class="form-control" name="info[name]" id="name">

                    </div>

                  </div>

                  

                    <div class="form-group">

                    <label for="firstname" class="control-label col-lg-2">Item Description</label>

                    <div class="col-lg-10">

                    <textarea class="form-control" name="info[description]" id="description"></textarea>

                    </div>

                  </div>

                  

                  <div class="form-group">

                    <label for="firstname" class="control-label col-lg-2">Item Price</label>

                    <div class="col-lg-10">

                    <input type="text" class="form-control" name="info[price]" id="price">

                    </div>

                  </div>

                  
                  

                   <div class="form-group">

                    <label for="firstname" class="control-label col-lg-2">Discount</label>

                    <div class="col-lg-10">

                 <input type="text" class="form-control" name="info[discount]" value="" placeholder="0.00" id="discount">

                    </div>

                  </div>

                  

                    <div class="form-group ">

                    <label for="firstname" class="control-label col-lg-2">Item Image</label>

                    <div class="col-lg-10">

                    <input type="file" name="img" class="form-control" id="img">

                    <div id="img_error" style="color:red;"></div>

                    </div>

                  </div>                  

				<div class="form-group">
                <label class="control-lagel col-lg-2">Addons:</label>
                <div class="col-lg-10">
                <?php
				$j=0; 
				
				foreach($prd->getAddonList() as $addon){?>
                <input type="checkbox" name="addon[]" value="<?=$addon->id?>"> <?=ucwords($addon->addon_name)." "."$".$addon->addon_price?>
				<?php 
				$j++;
				
				if($j%6==0){echo "<br>";}
				 }?>              
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

