<div class="col-lg-5 col-sm-5" >

          <div id="side-cont">

            <input type="hidden" id="mainStatus" value="<?=$_SESSION['utils']['mainStatus'];?>" />  
			<?php /*
			echo "<pre>";
			print_r($_SESSION);
			echo "</pre>";*/
			?>
            <?php if(isset($_SESSION['utils']['msg'])){?>            

              <div class="border-panel margin-bottom hidden-xs">

            <div class="panel-body panel-header-right no-padding">

            	<input type="hidden" id="orderTypeSet" value="<?=$_SESSION['utils']['msg']?>" />	

            <strong style="color:#ea7f7f;"><?=$_SESSION['utils']['msg']?> 
          <a href="javascript:;" id="orderType" onclick="changeOrderType();"><br /><small class="text-right">Change Order Type!</small></a></strong>

            </div>

            </div>

            <?php }else{?>
            
            <div id="headerMsg"></div>
            <?php }?>


			
            <?php 

			

			/*echo "<pre>";

			// print_r($_SESSION['utils']);

			 print_r($_SESSION['addOns']);

			echo "</pre>";*/

		

			 ?>    

            

            <div class="border-panel hidden-xs">

            <div class="panel-body panel-header-right no-padding">

						<div class="discount-container clearfix">

							<div class="discount-left">

								<p class="discount-left-value">	15%</p><p>OFF</p>

							</div>

							<div class="discount-right">

				<span class="text-danger discount-right-title">15% Discount Minimum Order $50.00 (AUTOMATICALY APPLIED)</span>

								<p>Delivery Minimum: $15.00 </p>

							</div>

						</div>

					</div>

            </div>

            

            <!--chkout panel-->

            <div class="cont main-cart">

            	<div class="tab-content">          	

             <div class="panel-table panel panel-default margin-top">    

                    <div class="panel-heading hidden-xs">

                        <div class="container-custom">		

                            <div class="row">

                                <div class="col-xs-3 checkout-quantity lang-qty">Qty</div>

                                <div class="col-xs-3 checkout-item lang-item">Item</div>

                                <div class="col-xs-2 checkout-price lang-price">Price</div>

								  <div class="col-xs-2 checkout-price lang-price">Total</div>

                                <div class="col-xs-1 checkout-edit">&nbsp;</div>

                                <div class="col-xs-1 checkout-close">&nbsp;</div>

                            </div>

                        </div>	

                    </div>

        

        		<div id="cart" class="panel-body js-cart cart-detail-body hidden-xs">

        
<center><div class="loader2"></div></center>

                    <div class="container-custom order-item main-item">                                    
                        <div id="cartData"></div>
                        
                    </div>
                    <input type="hidden" id="addOnTotal" value="0">
                    <div id="addOnData"></div>
     			

       			 </div>
     
                 <div id="calcualtionPart"></div>
<?php
   

            


               

			   <?php  if(isset($_SESSION['utils']['applied_coupan'])){?>

               <div class="col-lg-4 pull-right no-padding text-right">

                <strong class="text-color">Applied Coupan </strong> -$( <?=$_SESSION['utils']['applied_coupan']?> )

                </div>

                <?php }?>

                

                </div>

            </div>

            
		
            

            <div class="big-total-row" id="big_total_scroll" style="padding:5px;" >
                <div class="pull-left">Total:</div>
                <div id="cart-total" class="pull-right cart-total">
			<?php if(!empty($_SESSION['CartItem'])){?>
                $ <?=round($grandTotal+$_SESSION['utils']['tip']-$_SESSION['utils']['applied_coupan'],2)?></div>
	<?php $_SESSION['utils']['grandTotal']=($grandTotal+$_SESSION['utils']['tip'])-$_SESSION['utils']['applied_coupan']?>
   				 <?php }else{ echo "$ 0 ";}?>
            </div>

<?php } //end?>      

        </div>

        

    </div>

                

                    

                    

 

				
            
            <!---end-->



            <div id="order-type-selector">	
                	<div class="row">

                		<div class="col-sm-12">                                                      

                            <div class="col-lg-12 pull-left text-left no-padding">

                             <?php if(isset($_SESSION['utils']['mainStatus']))

                            {	if($_SESSION['utils']['mainStatus']=="delivery"){?>

                            <strong>Order Status: </strong>

                            <span class="text-color">Delivery</span>

                            <?php }elseif($_SESSION['utils']['mainStatus']=="pickup"){?>

                            <strong>Order Status: </strong>

                            <span class="text-color">Pickup</span>    

                             <?php if($_SESSION['utils']['nowltrSts']=="later"){?> | <strong>Time Status: </strong>  

                             <span class="text-color">Custom time choosen (<font style="color:#ea7f7f"><?=$_SESSION['utils']['customeTime']?></font>)</span>  

                             <?php }?>

                            <?php

                                }

                            }?>

                            </div>                    

                    		<div class="row"> 

                            <div class="col-lg-12">

                            <hr class="no-margin">

                            </div>

                            </div>

                    </div>

                    </div>   

	

		

</div>

		<div class="cart_auto_spy" style="top: 630px;">

			<?php if($_SESSION['utils']['mainStatus']=="delivery"  &&$grand>=25 && !empty($_SESSION['CartItem']) )
				{
			?>
				<a href="checkout.php" class="btn btn-block btn-primary btn-main-defined" id="cart-checkout" data-container="body">Checkout</a>
			<?php }elseif($_SESSION['utils']['mainStatus']=="pickup" && !empty($_SESSION['CartItem']))
				{?>				
				<a href="checkout.php" class="btn btn-block btn-primary btn-main-defined" id="cart-checkout" data-container="body">Checkout</a>
			<?php 
				}
			elseif($_SESSION['utils']['mainStatus']==1  && !empty($_SESSION['CartItem'])){ ?>
                                <a href="javascript:;" onclick="changeOrderType();" class="btn btn-primary" style="width:100%;" id="cart-checkout" data-container="body" data-toggle="popover" data-placement="top" data-content="">Checkout</a>
			<?php
				}
			?>

			
</div>
	</div>

			</div>

            <!--end-->
                <!--hidden cart-->
                <div class="cont" id="fixed-cart" style="display:none;">

            	<div class="tab-content">          	

             <div class="panel-table panel panel-default margin-top">    

                    <div class="panel-heading hidden-xs">

                        <div class="container-custom">		

                            <div class="row">

                                <div class="col-xs-3 checkout-quantity lang-qty">Qty</div>

                                <div class="col-xs-3 checkout-item lang-item">Item</div>

                                <div class="col-xs-2 checkout-price lang-price">Price</div>

								  <div class="col-xs-2 checkout-price lang-price">Total</div>

                                <div class="col-xs-1 checkout-edit">&nbsp;</div>

                                <div class="col-xs-1 checkout-close">&nbsp;</div>

                            </div>

                        </div>	

                    </div>

        

        		<div id="cart" class="panel-body js-cart cart-detail-body hidden-xs">

        
<center><div class="loader2"></div></center>

                    <div class="container-custom order-item main-item">

                    <?php                    
                    $i=1;
                    
                    if(!empty($_SESSION['CartItem']))

                    {	$itemDiscount='';

                        $subTotal='';

                        $price='';

                        $qty='';

                         foreach($_SESSION['CartItem'] as $cart)

                        {?>

                        <div class="row">

                        <div class="col-xs-3">

                           

                            <input type="hidden" name="price" value="<?=$cart['price']?>" id="cartPrice" />

                            <input type="hidden" name="spl" value="<?=$cart['spl']?>" id="Spl-<?=$cart['id']?>" />

                           <div id="orderQtyH-<?=$cart['id']?>">

                           

                            <div class="checkout-quantity" style="float:left;" onClick="CatQtyMinus(<?=$cart['id']?>)">

                            <i class="fa fa-minus-circle cart-item-desc" style="margin: 4px;"></i></div>               

                           <input id="sideQty-<?=$cart['id']?>" readonly="readonly" type="text" class="my-input2"  maxlength="4" autocomplete="off" value="<?=$cart['qty']?>">

                           <div class="checkout-quantity qty-asc" style="float:left;" onclick="CatQtyPlus(<?=$cart['id']?>);"><i class="fa fa-plus-circle cart-item-asc" id="CatQtyPlus" style="margin: 4px;"></i></div>

                           </div>

                    

                    </div>

             <div class="col-xs-3 checkout-item lang-item no-padding"><span class="order-item-name"><?=$i.".".$cart['name']?>             
             </span>

                    <?php if($cart['spl']!=""){?>

                    <div class="col-lg-12"><small class="text-color"><em><?=$cart['spl']?></em></small></div>

                    <?php }?></div>

                      <div class="col-xs-2 checkout-price lang-price"><?="$ ".$cart['price']?></div>
						 <div class="col-xs-2 checkout-price lang-price"><?="$ ".$cart['price']*$cart['qty']?></div>

                      

                      <div class="col-xs-1 checkout-edit">

                      <a href="javascript:void();" data-target="#AddCart" data-toggle="modal" onclick="CartOpen('<?=$cart['id']?>','<?=$i?>','<?=$cart['name']?>','<?=$cart['des']?>','<?=$cart['price']?>','2');">

                      <span class="glyphicon glyphicon-edit text-danger cart-item-edit"  title="Edit" idx="0"></span>

                      </a>

                      </div>

                      <div class="col-xs-1 checkout-close">

                      <a href="javascript:void();" onclick="RemoveCartItem(<?=$cart['id']?>)"><span class="glyphicon glyphicon-remove text-danger cart-item-remove"  title="Remove"></span>

                      </a>

                      </div>

                        </div>

                        

                      <?php 

                      $itemDiscount+=$cart['discount'];

                      $subTotal+=($cart['qty']*$cart['price']);

                      

                        $i++;}

                  }else{?>

                                  

                    <div class=" text-center lang-empty-cart ">Cart is empty</div>

                   <?php }?>

                   </div>

		 <?php 
			 if(!empty($_SESSION['addOns']))
			 {
			 $addonTotal='';
			//echo $cart['id'];?>
            	<span><strong>Addons: </strong>
             <?php    
			 foreach($_SESSION['addOns'] as $addonItem){?>
			 <small><?=$addonItem['addon_name']."  $".$addonItem['addon_price']?><a href="javascript:;" id="rev<?=$addonItem['addon_id']?>" onclick="removeAddon(<?=$addonItem['addon_id']?>);">&times;</a></small></span>
             <?php 			 
			 	$addonTotal+=$addonItem['addon_price'];
			 }
			 
		}?> 
        
     			

       			 </div>
               
<?php
//CHECK IF ITEM IN CART
if(isset($_SESSION['CartItem']) && !empty($_SESSION['CartItem'])){?>
            <div class="total-row">

                <div class="pull-left"><span>Sub -Total:</span></div>                
<?php $subTotal=($subTotal+$addonTotal);?>
                <div id="cart-sub-total" class="pull-right cart-sub-total"><?="$ ".$subTotal?></div>
                <input type="hidden" id="subTotal" value="<?=$subTotal?>">
                <?php $_SESSION['utils']['sub_total']=($subTotal);?>

            </div>

          

            

            <div class="total-row ">

             

                <div class="pull-left">Discount:</div>

                <?php
				 //tax calculate

				$vat=tax_val;
					
				$grand=($subTotal+$addonTotal)-$itemDiscount;

				if($grand >=50)
				{
				$mainDiscount =($subTotal*15/100);
				$_SESSION['utils']['mainDiscount']=$mainDiscount;		
				}
				else
				{
				$mainDiscount=0;
				$_SESSION['utils']['mainDiscount']=$mainDiscount;	
				}
				
				$tax=($grand*$vat/100);
				$_SESSION['utils']['tax']=$tax;

				$grandTotal=($grand-$mainDiscount)+$tax;
			

				?>

                <div id="cart-discount" class="pull-right cart-discount" discount_type="percent">$ <?=$mainDiscount?></div>

            </div>

         
         
            <div class="total-row ">

                <div class="pull-left">

                    <span>

                        <?=text_tax?> 				</span>:

                </div>

              

                <div id="cart-taxes" class="pull-right cart-taxes" >$ <?=round($tax,2)?></div>

            </div>

                
                <?php if($addonTotal!=""){?>            
            <div class="total-row">

                <div class="pull-left"><span class="lang-delivery-fee"><strong>Addons</strong></span>:</div>

                <div id="cart-delivery-fee" class="pull-right text-right">

                $ <?=$addonTotal?>.00
              </div>

            </div>
            <?php }?>


           <div class="total-row">

                <div class="pull-left"><span class="lang-delivery-fee">Tip</span>:</div>

                <div id="cart-delivery-fee" class="pull-right text-right">

                <strong>$</strong> 

               <input type="text" onblur="Tip(this.value)" name="tip" value="<?=$_SESSION['utils']['tip']?>" class="my-input"  id="tip"/></div>

            </div>
			

            <div class="total-row">	

            <div class="col-lg-12 no-padding no-margin">

            <div id="coupanMsg"></div>

            	  <div class="col-lg-2 no-padding">

                <div class="pull-left"><span class="lang-delivery-fee"><strong>Coupon</strong></span>:</div>

                </div>

                <div class="col-lg-4 no-padding">

                <div id="cart-delivery-fee" class="pull-left text-left">

               <input type="text" name="coupanCode" class="form-control"  id="coupanCode" placeholder="enter your coupon code"/>

                </div>

                </div>

                <div class="col-lg-3 pull-left text-left no-padding" style="margin-left:2px;">

                <div id="Loader"></div>

          <input type="button" name="apply" id="apply" onClick="ValidateCoupan();" value="Apply Now" class="btn btn-primary" />

                </div>

               

			   <?php  if(isset($_SESSION['utils']['applied_coupan'])){?>

               <div class="col-lg-4 pull-right no-padding text-right">

                <strong class="text-color">Applied Coupan </strong> -$( <?=$_SESSION['utils']['applied_coupan']?> )

                </div>

                <?php }?>

                

                </div>

            </div>

            
		
            

            <div class="big-total-row" id="big_total_scroll" style="padding:5px;" >
                <div class="pull-left">Total:</div>
                <div id="cart-total" class="pull-right cart-total">
			<?php if(!empty($_SESSION['CartItem'])){?>
                $ <?=round($grandTotal+$_SESSION['utils']['tip']-$_SESSION['utils']['applied_coupan'],2)?></div>
	<?php $_SESSION['utils']['grandTotal']=($grandTotal+$_SESSION['utils']['tip'])-$_SESSION['utils']['applied_coupan']?>
   				 <?php }else{ echo "$ 0 ";}?>
            </div>

<?php } //end?>      

        </div>

        

    </div>

                

                    

                    

 

				
            
            <!---end-->



            <div id="order-type-selector">	
                	<div class="row">

                		<div class="col-sm-12">                                                      

                            <div class="col-lg-12 pull-left text-left no-padding">

                             <?php if(isset($_SESSION['utils']['mainStatus']))

                            {	if($_SESSION['utils']['mainStatus']=="delivery"){?>

                            <strong>Order Status: </strong>

                            <span class="text-color">Delivery</span>

                            <?php }elseif($_SESSION['utils']['mainStatus']=="pickup"){?>

                            <strong>Order Status: </strong>

                            <span class="text-color">Pickup</span>    

                             <?php if($_SESSION['utils']['nowltrSts']=="later"){?> | <strong>Time Status: </strong>  

                             <span class="text-color">Custom time choosen (<font style="color:#ea7f7f"><?=$_SESSION['utils']['customeTime']?></font>)</span>  

                             <?php }?>

                            <?php

                                }

                            }?>

                            </div>                    

                    		<div class="row"> 

                            <div class="col-lg-12">

                            <hr class="no-margin">

                            </div>

                            </div>

                    </div>

                    </div>   

	

		

</div>

		<div class="cart_auto_spy" style="top: 630px;">

			<?php if($_SESSION['utils']['mainStatus']=="delivery"  &&$grand>=25 && !empty($_SESSION['CartItem']) )
				{
			?>
				<a href="checkout.php" class="btn btn-block btn-primary btn-main-defined" id="cart-checkout" data-container="body">Checkout</a>
			<?php }elseif($_SESSION['utils']['mainStatus']=="pickup" && !empty($_SESSION['CartItem']))
				{?>				
				<a href="checkout.php" class="btn btn-block btn-primary btn-main-defined" id="cart-checkout" data-container="body">Checkout</a>
			<?php 
				}
			elseif($_SESSION['utils']['mainStatus']==1  && !empty($_SESSION['CartItem'])){ ?>
                                <a href="javascript:;" onclick="changeOrderType();" class="btn btn-primary" style="width:100%;" id="cart-checkout" data-container="body" data-toggle="popover" data-placement="top" data-content="">Checkout</a>
			<?php
				}
			?>

			
</div>
	</div>
                <!--end-->
 </div>           

          
</div>
 </div>