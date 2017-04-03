<?php include_once('includes/header.php');
if($_SESSION['utils']['mainStatus']=="delivery"  &&$_SESSION['utils']['sub_total']<15 || $_SESSION['utils']['mainStatus']==1){
?>
<script>
document.location.href="http://www.a2zwebmaster.com/online_ordering/";
</script>
<?php }?>   

   <div class="content" id="Main-Cont">   

    	<div class="col-lg-12 col-sm-12">

        	<div class="row">
                <div id="chkout">
                    <div class="col-sm-7 col-lg-7">
    
                    <h5>Checkout</h5>
    
                    <hr />
    
                    
    
                   
    
                    
    
                  <div class="clearfix"></div>
    
                   <div class="col-lg-12"> 	
    
                   <div class="row">		 
    
                        <div class="col-sm-12">
    
                        <strong>Account Information</strong>
    
                        <hr / style="margin-top:0;">
    
                        </div>      
    
                      </div> 
    
                      <div id="checkoutNew">    
    
                     <form action="" id="CheckoutForm" method="post" >
    
                          <?php
						   if(isset($_SESSION['addOns']))
						  	{
								$addonId='';
								$addonTotal='';
							 foreach($_SESSION['addOns'] as $adonItem){
                             
								$addonId.=$adonItem['addon_id'].",";
								$addonTotal+=$adonItem['addon_price'];  
							 	}
								
							  }?>              
    
    			
                    
                     <input type="hidden"  name="nowltrSts" value="<?=$_SESSION['utils']['nowltrSts']?>" />
    
                     <input type="hidden"  name="info[custome_time]" value="<?=$_SESSION['utils']['customeTime']?>" />
    
                     <input type="hidden"  name="info[order_status]" value="<?=$_SESSION['utils']['mainStatus']?>" />
                     <input type="hidden"  name="info[addons]" value="<?=rtrim($addonId,",")?>" />
                    <input type="hidden"  name="info[addons_amount]" value="<?=$addonTotal?>" />
    
                       
                     <input type="hidden"  name="info[address]" value="<?=$_SESSION['utils']['address']?>" />
    
                     <input type="hidden" name="info[tax]"  value="<?=round($_SESSION['utils']['tax'],2)?>" />
    
                      <input type="hidden" name="info[discount]" value="<?=$_SESSION['utils']['mainDiscount']?>" />
    
                      <input type="hidden" name="info[sub_total]" value="<?=$_SESSION['utils']['sub_total']?>" />
    
                        
    
                         <input type="hidden" name="info[coupan_discount]" value="<?=$_SESSION['utils']['applied_coupan']?>" />
    
                         <input type="hidden" name="info[coupan_code]" value="<?=$_SESSION['utils']['coupan_code']?>" />
    
                         <input type="hidden"  name="info[tip]" value="<?=$_SESSION['utils']['tip']?>" />
    
                      <input type="hidden" name="info[total_amount]" value="<?=round($_SESSION['utils']['grandTotal'],2)?>" />
    
                    
    
                    <div class="form-group"> 
    
                    <div class="row">    
    
                         <div class="col-lg-2">
    
                         <label>Full Name</label>
    
                         </div>
    
                         <div class="col-lg-10">
    
                         <input type="text" class="form-control" name="info[name]" />
    
                         </div>                     
    
                     </div>
    
                     </div>
    
                     
    
                      <div class="form-group">     
    
                        <div class="row">
    
                         <div class="col-lg-2">
    
                         <label>Email</label>
    
                         </div>
    
                         <div class="col-lg-10">
    
                         <input type="text" class="form-control" name="info[email]" />
    
                         </div>                     
    
                         </div>
    
                     </div>
    
                     
    
                     
    
                      <div class="form-group">     
    
                        <div class="row">
    
                         <div class="col-lg-2">
    
                         <label>Phone</label>
    
                         </div>
    
                         <div class="col-lg-10">
    
                         <input type="text" class="form-control" name="info[mobile]" />
    
                         </div>                     
    
                     </div>
    
                     </div>
    
                     
    
                     
    
                     
    
                     <div class="form-group">     
    
                            <div class="row">
    
                         <div class="col-lg-2">
    
                         &nbsp;
    
                            </div>
    
                           <div class="col-lg-10">
    
                           <input type="button" onclick="CheckoutNow();" class="btn btn-primary" name="submit" value="Order Now" />
    
                           </div> 
    
                        </div>
    
                    </div>
    
                     
    
                     </form>         
    
                     </div> 
    
                    </div>         
    
                            
    
                  
    
                  
    
                  </div> <!--end main-col8-->
                </div>
            	

                <?php include_once('includes/sidebar.php');?>

                

        </div>

    </div>   

 

 

 

</div> 

<?php 

/*echo "<pre>";

print_r($_SESSION);

echo  "</pre>";*/

?>



<?php include_once('includes/footer.php');?>

