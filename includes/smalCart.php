
            <?php if(isset($_SESSION['CartItem']) && !empty($_SESSION['CartItem'])){?>                
            <!---small cart---->
            <div class="row your-cart" style="display:none;">
                <div class="col-lg-12">
                    <div class="small-cart-panel">
                        
                        <div class="title-cart">Your Cart</div>
                        <div class="col-lg-8">
                        <strong>Total:</strong>
                        </div>
                        <div class="col-lg-4">
                        <strong> <?php if(!empty($_SESSION['CartItem'])){?>
                $ <?=round($grandTotal+$_SESSION['utils']['tip']-$_SESSION['utils']['applied_coupan'],2)?>
	<?php $_SESSION['utils']['grandTotal']=($grandTotal+$_SESSION['utils']['tip'])-$_SESSION['utils']['applied_coupan']?>
   				 <?php }else{ echo "$ 0 ";}?></strong>
                        </div>
                        <div class="col-lg-8">                       
                            <strong>Order Status: </strong> 
                            </div>
                        <div class="col-lg-4">
                            <p style="text-transform:capitalize"> <?php if(isset($_SESSION['utils']['mainStatus'])){
                           echo $_SESSION['utils']['mainStatus']==1?"n/a":$_SESSION['utils']['mainStatus']; }?></p>                      
                         </div>
                         <?php if($_SESSION['utils']['nowltrSts']=="later"){?> 
                        <div class="col-lg-12"> 
                             <small>Custom time choosen (<?=$_SESSION['utils']['customeTime']?>)</small>  
                       </div>
                         <?php }?>
                        
                        <?php if($_SESSION['utils']['mainStatus']=="delivery"  &&$grand>=25 || $_SESSION['utils']['mainStatus']=="pickup")
				{
			?>
                        <a href="checkout.php" class="btn btn-primary" style="width:100%; border-radius:0 0 4px 4px;">Checkout</a>
                        <?php } elseif($_SESSION['utils']['mainStatus']==1){?>
                        <a href="javascript:;"  class="btn btn-primary" onclick="changeOrderType();" style="width:100%; border-radius:0 0 4px 4px;">Checkout</a>
                        <?php }?>
                      </div>
                </div>
            </div>
            <?php }?>
           