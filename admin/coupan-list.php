<?php
$page=5;
$subPage="coupan-list";
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
          <header class="panel-heading"> Show Coupan List </header>
          </div>
 				 <div class="col-xs-12 col-sm-6 text-right">        
                    <button type="submit" class="btn btn-success" name="action"  value="activateCoupan">Activate</button>
                    <button type="submit" class="btn btn-primary" name="action"  value="deActivateCoupan">De-activate</button>                    
                    <button type="submit" class="btn btn-danger"  name="action"  value="deleteCoupan">Delete</button>
                  </div>
            
			
            <div class="panel-body">
	
              <section id="unseen">

                <table class="table table-bordered table-striped table-condensed">

                  <thead>

                    <tr>
                    <th><input type="checkbox" id="selectAll" name="selectAll"></th>                      
                      <th>Sr No.</th>
                      <th>Coupan Code</th>
                      <th>Coupan Amt.</th>
                      <th>Status</th>                      
                      <th class="numeric">Created On</th>
                      <th class="numeric">Modifed On</th>
                      <th>Action</th>          

                    </tr>

                  </thead>

                  <tbody>

                    <?php


                                    $page=(@$_GET['page']!='')?@$_GET['page']:1;                                    

                                    $coupan=new coupan();      
									$i=1;                       
                                      foreach($coupan->displayAllCoupan($page) as $res)
                                      {

                                  ?>

                    <tr>

               <td class="numeric"><input type="checkbox" class="chk" name="coupanId[]" value="<?=$res->id?>"></td>
                    	<td><?=$i++?></td>
                       <td><?=$res->coupan_code?></td>
                       <td><?=$res->coupan_amt?></td>
                       <td><?=printStatus($res->status)?></td>
                      <td class="numeric"><?=$res->created?></td>
                      <td class="numeric"><?=$res->modified?></td>
                       <td class="numeric"><a href="coupan-list.php?action=edit&copupanId=<?=$res->id?>"> <img  src="<?=WEBROOT_ADMIN?>img/edit.png" title="edit information" alt="edit information">

                        </a> &nbsp;

                      
                       </td>

                    </tr>

                    <?php }
                      ?>

                    <tr>

                      <td colspan="8" align="center"><?=generatePaginationLink($coupan->getNumOfPages(),$page)?></td>

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
