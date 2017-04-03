<?php
$page=5;

$subPage="orders";
include_once "includes/head-section.php";

?>
<style>
.ord-style{color: #fff!important;
    background: #F33;
    border-radius: 8px;
    padding: 4px 6px;
    text-align: center;
    margin: 0;}
	.ord-style2{color: #fff!important;
    background: #f1f2f7;
    border-radius: 8px ;
    padding: 4px 6px;
    text-align: center;
    margin: 0;}
	
	.ord-style a{color:#fff!important;}
	.ord-style2 a{color:#333!important;}
</style>


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

          <header class="panel-heading">All Orders </header>

          </div>

 		<div class="panel-body">
			 <section id="unseen">
               <table class="table table-bordered table-striped table-condensed">
                  <thead>
                    <tr>                                      
						
                      <th>Order No</th>

                      <th>Order Type</th>

                      <th>Name</th>

                      <th>Email</th>

                      <th>Total</th>
                                          
                      <th class="numeric">Order Date</th>
                       <th>Action</th>          



                    </tr>



                  </thead>



                  <tbody>



                    <?php




                                    $page=($_GET['page']!='')?$_GET['page']:1;
									  $ord=new orders();                             

                                      foreach($ord->getAllOrders($page) as $res)

                                      {



                                  ?>



                    <tr>



              
                       <td><?=$res->order_no?></td>
                       
                       <td><?=$res->order_status?></td>
                                             
                       <td><?=$res->name?></td>

                       <td><?=$res->email?></td>

                       <td><?="$".$res->total_amount?></td>
                      
                      <td><?=$res->order_date?></td>
						
                        <?php if($res->view_status==0){?>
                       <td class="numeric">
                       <span class="ord-style">
                       <a href="order-details.php?orderId=<?=$res->id?>">View </a></span>
                       <?php }else{?> 
                       <td class="numeric">
                        <span class="ord-style2">
                       <a href="order-details.php?orderId=<?=$res->id?>">Viewed </a></span><?php }?>

                      

                       </td>



                    </tr>



                    <?php }

                      ?>



                    <tr>



                      <td colspan="7" align="center"><?=generatePaginationLink($ord->getNumOfPages(),$page)?></td>



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

