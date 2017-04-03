<?php
$page=5;

$subPage="order-details";

include_once "includes/head-section.php";
$ord = new orders();
	$ord->updateOrderViewStatus($_REQUEST['orderId']);
$orders = $ord->GetOrderDetails($_REQUEST['orderId']);

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

    <form method="post" action="">

   
          <section class="panel">

           <div class="col-xs-12 col-sm-12 col-lg-12 text-left">     

          <header class="panel-heading">All Orders </header>

          </div>

 		<div class="panel-body">
             <div class="col-lg-12">
          <div class="row">
              <div class="col-lg-6">
             <center> <strong>Order Details</strong></center>
              	<table class="table">
                <tr><td><strong>Order #:</strong></td><td><?=$orders->order_no?></td></tr>
                <tr><td><strong>Order Date:</strong></td><td><?=$orders->order_date?></td></tr>
                <tr><td><strong>Order Type:</strong></td><td><?=$orders->order_status?></td></tr>
                <tr><td><strong>Grand Total:</strong></td><td>$ <?=$orders->total_amount?></td></tr>
                </table>
                  
              </div>
               <div class="col-lg-6">
               <center> <strong>Customer Information</strong></center>           
              	<table class="table">
                       <tr>
                <td><strong>Customer Name:</strong></td><td><?=$orders->name?></td></tr>
                <tr><td><strong>Email:</strong></td><td><?=$orders->email?></td></tr>
                <tr><td><strong>Address:</strong></td><td><?=$orders->Address?></td></tr>
                <tr><td><strong>Phone:</strong></td><td><?=$orders->mobile?></td></tr>
                <tr><td><strong>Creadit Card No:</strong></td><td><?=$orders->creditCard?></td></tr>
                <tr><td><strong>Exp:</strong></td><td><?=$orders->expr?></td></tr>
                <tr><td><strong>CVV:</strong></td><td><?=$orders->cvv?></td></tr>
                </table>             
             
                  
              </div>
          </div>
          	</div>
        
			 <section id="unseen">
		
     
                            
             
	<div class="tab-pane active" id="tab_1">
                                                            
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="portlet grey-cascade box">
                                                                        <div class="portlet-title">
                                                                            <div class="caption">
                                                                                Cart Item</div>
                                                                           
                                                                        </div>
                                                                        <div class="portlet-body">
                                                                            <div class="table-responsive">
                                                                                <table class="table table-hover table-bordered table-striped">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th> Item Name</th>
                                                                                            <th> Price </th>
                                                                                            <th> qty </th>                                                                                                                                       
                                                                                            <th> Total </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <?php foreach($ord->GetOrderDetailsItems($orders->id) as $items)
																					{?>
                                                                                        <tr>                                                                        
                                                                                           
                                                                                            <td><?=$items->item_name?><br>
                                                                                            <small><?=$items->special_instruction?></small> </td>
                                                                                            <td>$ <?=$items->price?> </td>
                                                                                            <td><?=$items->qty?></td>
                                                                                            <td>$ <?=$items->qty*$items->price?></td>                                                                                          
                                                                                        </tr>
                                                                                       <?php }?>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6"> </div>
                                                                <div class="col-md-6">
                                                                    <div class="well">
                                                                        <div class="row static-info align-reverse">
                                                                            <div class="col-md-8 name"> Sub Total: </div>
                                                                            <div class="col-md-3 value">$ <?=$orders->sub_total?></div>
                                                                        </div>
                                                                        
                                                                         <div class="row static-info align-reverse">
                                                                            <div class="col-md-8 name"> Discount: </div>
                                                                            <div class="col-md-3 value">$ <?=$orders->discount?> </div>
                                                                        </div>
                                                                        
                                                                        <div class="row static-info align-reverse">
                                                                            <div class="col-md-8 name">Coupan Discount: </div>
                                                                            <div class="col-md-3 value">$ <?=$orders->coupan_discount?> </div>
                                                                        </div>
                                                                        
                                                                        <?php if($orders->order_status=="delivery"){?>
                                                                        <div class="row static-info align-reverse">
                                                                            <div class="col-md-8 name"> Delivery Fee: </div>
                                                                            <div class="col-md-3 value"> $ <?=$orders->delivery_charge?> </div>
                                                                        </div>
                                                                        <?php }?>
                                                                        <div class="row static-info align-reverse">
                                                                            <div class="col-md-8 name"> Total Tax: </div>
                                                                            <div class="col-md-3 value"> $ <?=$orders->tax?> </div>
                                                                        </div>
                                                                        
                                                                        <div class="row static-info align-reverse">
                                                                            <div class="col-md-8 name"> Grand Total: </div>
                                                                            <div class="col-md-3 value">$ <?=$orders->total_amount?> </div>
                                                                        </div>
                                                                        
                                                                       
                                                                      
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

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

