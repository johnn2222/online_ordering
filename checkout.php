<?php include_once('includes/header.php');
?>
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
    
                     <input type="hidden" name="info[tax]" id="tax"  />
    
                      <input type="hidden" name="info[discount]" id="mainDis" />
    
                      <input type="hidden" name="info[sub_total]" id="subTotal" />   
                        
    
                         <input type="hidden" name="info[coupan_discount]" value="<?=$_SESSION['utils']['applied_coupan']?>" />
    
                         <input type="hidden" name="info[coupan_code]" value="<?=$_SESSION['utils']['coupan_code']?>" />
    
                         <input type="hidden"  name="info[tip]" id="tipAmt" />
    
                      <input type="hidden" name="info[total_amount]" id="grandTotal" />
    
                    
    
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
    
                         <div class="col-lg-4">
    
                         <label>Payment Method:</label>
    
                         </div>
    
                         <div class="col-lg-4">    
                             <input type="radio" checked="checked" value="cod" class="payMethod" name="payMethod"> COD    
                         </div>                     
                         <div class="col-lg-4">    
                             <input type="radio" value="paypal" class="payMethod" name="payMethod"> PayPal    
                         </div>
    
                     </div>
    
                     </div>
                    
    
                     <div class="form-group" id="checkoutCod">
                         <div class="row">    
                         <div class="col-lg-2">    
                         &nbsp;    
                         </div>    
                           <div class="col-lg-10">    
                                <input type="button" onclick="CheckoutNow();" class="btn btn-primary" name="submit" value="Order Now" />    
                           </div>     
                        </div>    
                    </div>
                      
                      <div  id="checkoutPayPal" style="display: none;">
                       <div class="form-group">
                          <div class="row">    
                         <div class="col-lg-2">    
                             &nbsp;       
                         </div>    
                           <div class="col-lg-10">    
                               <img src="images/paypal-logo.png">
                           </div>     
                            </div>    
                        </div>
                      
                         <div class="form-group">
                         <div class="row">    
                         <div class="col-lg-2">    
                             &nbsp;         
                         </div>    
                           <div class="col-lg-10">    
                               <a href="javascript:;" onclick="payPaypal();" class="btn btn-primary">Pay Now</a> 
                           </div>     
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

<script>
     function payPaypal()
	{   
            var grandTotal=$("#grandTotal").val();
            if(grandTotal!="" && grandTotal>0){
              $("#amount").val(grandTotal);
//              alert( $("#amount").val());
             document.payPalForm.submit();
            }
		//var all_data=$("#CheckoutForm").serialize();
                
			
	}
    
    $(document).ready(function(){        
       
        $(document).on("change","input[name='payMethod']",function(){
           var payMethod=$(this).val();
           if(payMethod=="paypal"){
             $("#checkoutCod").hide(); 
             $("#checkoutPayPal").show();
           }
        });
        
       var chkout=window.localStorage.getItem("checkoutInfo");
       chkout=JSON.parse(chkout); 
                   
       $("#tax").val(chkout.tax.toFixed(2));
       $("#mainDis").val(chkout.mainDiscount.toFixed(2));
       $("#subTotal").val(chkout.subTotal.toFixed(2));
       $("#grandTotal").val(chkout.grandTotal.toFixed(2));
       $("#tipAmt").val(chkout.tipAmt);  
    
    if(window.localStorage.getItem("utils")){        
        var utilsData=JSON.parse(window.localStorage.getItem("utils"));
        }
        
         if(utilsData.mainStatus=="delivery" && chkout.subTotal<15 || utilsData.mainStatus==1){
            document.location.href="http://www.a2zwebmaster.com/online_ordering/";
            //document.location.href="http://localhost/online_ordering/";
        }

    });
</script>
<?php 
$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr';

//PayPal Business Email
$paypalID = 'cooljohnn@rediffmail.com';
?>

<!--        <form  action="<?php echo $paypalURL; ?>" name="payPalForm" id="payPalForm" method="post">
             Identify your business so that you can collect the payments. 
            <input type="hidden" name="business" value="<?php echo $paypalID; ?>">
            
             Specify a PayPal Shopping Cart Add to Cart button. 
            <input type="hidden" name="cmd" value="_xclick">
                     
             Specify details about the item that buyers will purchase. 
 
            <input type="hidden" name="amount" id="amount">
    
            <input type="hidden" name="currency_code" value="USD">
            
            
             Specify URLs 
            <input type='hidden' name='return' value='http://localhost/online_ordering/success.php'>
            <input type='hidden' name='cancel_return' value='http://localhost/online_ordering/cancel.php'>
            
         
        </form>-->

<form class="paypal" action="payments.php" method="post" name="payPalForm" id="paypal_form" target="_blank">
		<input type="hidden" name="cmd" value="_xclick" />
		<input type="hidden" name="no_note" value="1" />		
            <input type="hidden" name="currency_code" value="USD">
		<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
		<input type="hidden" name="first_name" value="Customer's First Name"  />
		<input type="hidden" name="last_name" value="Customer's Last Name"  />
		<input type="hidden" name="payer_email" value="customer@example.com"  />
		<input type="hidden" name="item_number" value="123456"/>
                
	</form>
