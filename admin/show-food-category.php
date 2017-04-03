<?php
$page=5;
$subPage="show-food-category";
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

      <div class="row">

        <div class="col-lg-12">
        <?=getMsg();?>
    <form method="post" action="process-library.php">
      <input type="hidden" name="returnUrl" value="<?=$_SERVER['REQUEST_URI']?>">
          <section class="panel">
           <div class="col-xs-12 col-sm-6 text-left">     
          <header class="panel-heading"> Show Food Categories </header>
          </div>
 				 <div class="col-xs-12 col-sm-6 text-right">        
                    <button type="submit" class="btn btn-success" name="action"  value="activateCategory">Activate</button>
                    <button type="submit" class="btn btn-primary" name="action"  value="deActivateCategory">De-activate</button>     
                     
                    <button type="submit" class="btn btn-danger"  name="action"  value="deleteCategory">Delete</button>
                  </div>
            
			
            <div class="panel-body">
	
              <section id="unseen">

                <table class="table table-bordered table-striped table-condensed">

                  <thead>

                    <tr>
                    <th><input type="checkbox" id="selectAll" name="selectAll"></th>                      
                      <th>Background Image</th>
                      <th>Categoory Name</th>
                      <th>Status</th>                      
                      <th class="numeric">Created On</th>
                      <th class="numeric">Modifed On</th>
                      <th>Action</th>          

                    </tr>

                  </thead>

                  <tbody>

                    <?php


                                    $page=(@$_GET['page']!='')?@$_GET['page']:1;                                    

                                    $objCategory=new category();

                                    $categories=$objCategory->displayAllCategory($page);                                

                                    if($categories)

                                    {

                                      foreach($categories as $regCategory)

                                      {

                                  ?>

                    <tr>

               <td class="numeric"><input type="checkbox" class="chk" name="category_id[]" value="<?=$regCategory->id?>"></td>
                       <td><img src="<?=IMAGE_ROOT."category/".$regCategory->image?>" width="230"></td>
                       <td><?=ucwords($regCategory->category)?></td>
                       <td><?=printStatus($regCategory->status)?></td>

                      <td class="numeric"><?=$regCategory->created?></td>
                      <td class="numeric"><?=$regCategory->modified?></td>

                       <td class="numeric"><a href="add-food-category.php?action=edit&categoryId=<?=$regCategory->id?>"> <img  src="<?=WEBROOT_ADMIN?>img/edit.png" title="edit information" alt="edit information">

                        </a> &nbsp;

                      
                       </td>

                    </tr>

                    <?php

                                      }

                                    }

                                                                 

                                 ?>

                    <tr>

                      <td colspan="7" align="center"><?=generatePaginationLink($objCategory->getNumOfPages(),$page)?></td>

                    </tr>

                  </tbody>

                </table>

              </section>

            </div>

          </section>
</form>
        </div>

      </div>

      <!-- page end--> 

    </section>

  </section>

  <!--main content end--> 

  <!--footer start-->

  <?php include_once "includes/footer.php";?>

