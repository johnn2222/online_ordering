<?php

$page=5;

$subPage="show-food-item";

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

          <header class="panel-heading"> Show Food Item(s) </header>

          </div>

 				 <div class="col-xs-12 col-sm-6 text-right">        

                    <button type="submit" class="btn btn-success" name="action"  value="activateProducts">Activate</button>

                    <button type="submit" class="btn btn-primary" name="action"  value="deActivateProducts">De-activate</button>     

                     

                    <button type="submit" class="btn btn-danger"  name="action"  value="deleteProducts">Delete</button>

                  </div>

            

			

            <div class="panel-body">

	

              <section id="unseen">



                <table class="table table-bordered table-striped table-condensed">



                  <thead>



                    <tr>

                    <th><input type="checkbox" id="selectAll" name="selectAll"></th>                      

                      <th>Food Category</th>

                      <th>Background Image</th>

                      <th>Item Name</th>

                      <th>Description</th>

                      <th>Price</th>
                     
                      <th>Discount</th>

                      <th>Status</th>                      

                      <th class="numeric">Created On</th>

                      <th class="numeric">Modifed On</th>

                      <th>Action</th>          



                    </tr>



                  </thead>



                  <tbody>



                    <?php





                                    $page=(@$_GET['page']!='')?@$_GET['page']:1;                                    



                                    $prd=new product();                             

                                      foreach( $prd->getAllproduct($page) as $res)

                                      {



                                  ?>



                    <tr>



               <td class="numeric"><input type="checkbox" class="chk" name="productId[]" value="<?=$res->id?>"></td>

                       <td><?=ucwords($res->parent_cat)?></td>

                       <td><img src="<?=IMAGE_ROOT."product/".$res->image?>" width="69px"></td>

                       <td><?=$res->name?></td>

                       <td><?=$res->description?></td>

                       <td><?="$".$res->price?></td>
                      
                       <td><?="$".$res->discount?></td>

                       <td><?=printStatus($res->status)?></td>

                      <td class="numeric"><?=$res->created?></td>

                      <td class="numeric"><?=$res->modified?></td>

                       <td class="numeric"><a href="add-food-item.php?action=edit&productId=<?=$res->id?>"> <img  src="<?=WEBROOT_ADMIN?>img/edit.png" title="edit information" alt="edit information">



                        </a> &nbsp;



                      

                       </td>



                    </tr>



                    <?php }

                      ?>



                    <tr>



                      <td colspan="10" align="center"><?=generatePaginationLink($prd->getNumOfPages(),$page)?></td>



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



  <!--footer end--> 

