<a href="javascript:;"  data-toggle="modal" id="openMsg" style="display:none;" data-target="#forMsg">Open Msg</a>

<div class="modal fade" id="forMsg" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         
          <h4 class="modal-title">Message</h4>
        </div>
        <div class="modal-body">
          <p>Thank you for ordering with us!</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  




<div class="modal fade" id="AddCart" role="dialog">

    <div class="modal-dialog">



    <!-- Modal content-->

    <div class="modal-content">

      <div class="modal-header">

  <button type="button" class="close" id="PrdClose" data-dismiss="modal">&times;</button>



        

        <div id="itemName"></div>

        <div id="itemDesc"></div>

        <div id="itemPrice"></div>

        <div id="subTotal"></div>

     	<input type="hidden" name="spcl" id="UpdId" value="" />

        <input type="hidden" name="spcl" id="UpdQty" value="" />  	        

      </div>

      <div class="modal-body">      

  

        <div class="panel control-group panel-default">

			<div class="panel-body ">

				<div class="control-group-title lang-instructions">* Special Instructions</div>

				<div class="order-input-line">

					<div class="order-input">

						<i class="input-icon fa fa-asterisk"></i>

						<input id="special-request" type="text" class="form-control rounded instructions-input" placeholder="Example: No pepper please." maxlength="100">

						<div class="text-right">

							

						</div>

					</div>

				</div>

			</div>

		</div>
        
               


        <div id="AddOn"></div>

           

         

      

      <div class="modal-footer">

      

      <div class="col-lg-12 no-padding">

      	<div class="col-lg-7 no-padding">

        <div class="pull-left"><span>Quantity</span></div>

        </div>

        <div class="col-lg-5">&nbsp;</div>

      <div class="col-lg-7 no-padding">		

		<div class="item-popup-bottom-action clearfix">			

			 <a href="javascript:void(0)" class="btn-quantity" id="des_quantity">

        		<div class="glyphicon glyphicon-minus icon-collapse"></div>

			</a>

			

			<div class="quantity-selector">

				<label>

	<input id="quantity-selector" readonly="readonly" type="text" class="form-control quantity_mask" value="1" maxlength="4" autocomplete="off">

				</label>

			</div>

            <a href="javascript:void(0)" class="btn-quantity" onclick="qtyPlus($('#quantity-selector').val());" id="asc_quantity">        

				<div class="glyphicon glyphicon-plus icon-collapse"></div>

			</a>

            			<input type="hidden" id="options-item-price" value="4.50">

		</div>     

     </div>  

     <div class="col-lg-5"> 

     <button type="button" class="btn btn-primary" style="display:none" id="UpdateCartNow">Update Cart</button>
		
       <button type="button" class="btn btn-primary" onclick="AddToCart($('#getId').val(),$('#special-request').val(),$('#quantity-selector').val());" id="AddCartNow">Add Cart</button>    

        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

        </div>

      </div>

    </div>



  </div>

</div>



</div>

</div>







<!--popup-->



<div class="modal fade" id="Popup" role="dialog">

    <div class="modal-dialog">



    <!-- Modal content-->

    <form method="post" action="" id="popupForm">

    <div class="modal-content">    

		<div class="modal-header">
        <center><div id="succMsgs"></div></center>
        <br />
        <a href="javascript:;" id="closePopup" class="close" data-dismiss="modal" style="display:none;">close</a>

        <h4>Haveli Indian Restaurant </h4>

        <span><strong>Address : </strong>9720 Page Ave, St. Louis, MO 63132, United States </span> 	  
		<br/><span><strong>Restaurant Timing : </strong>Sunday to Thursday - 11:00 am to 08:30 pm  <strong>(Monday Closed)</strong></span>
		<br/>
		<span><strong>Call : </strong>+1 314-423-7300</span>
      </div>

      

      <div class="modal-body">  

          <div class="panel control-group panel-default">

      

			<div class="panel-body ">

            	<div class="col-lg-12">

                	<div class="row">

                        <div class="col-lg-3">
							<input type="radio" name="DelPick" id="DelPick" onclick="ChooseOpt(this.value);" value="pickup" checked="checked" style="display:none" /> 
							
						</div>

					</div>    

                    
				<div class="row" id="now-ltr" style="">

                    <div class="col-lg-12">

                    	<div class="row">

                            <div class="col-lg-12">

								<h4 style="color:#23acb1;">Ready for Pickup in : 25 min</h4>

								<?php 

									$Ctime=time();		

									$currTime = date('h:i:A',$Ctime);

									$time = explode(":",$currTime);

									//print_r($time);

									?>

								<input type="radio" checked="checked" name="nowltr" class="nowltr" id="now" onClick="chkNowLtr('1');" value="<?=$currTime?>" /> Now

                            </div>

                        </div>

                        

                      	<div class="row margin-bottom">  

                            <div class="col-lg-12">

								<input type="radio" name="nowltr" class="nowltr" id="later" onClick="chkNowLtr('2');" /> Later(You will be prompted to select Date/Time)

                            </div>

                        </div>

                       

                       <div class="row margin-bottom">  

                            <div class="col-lg-12">						

								<input id='timepicker' type='text' class="form-control" name='timepicker' value="<?=$currTime?>"/>					

							</div>

                        </div>

                        <div class="row">  

                            <div class="col-lg-12">	

								<button name="Go2" type="button" class="btn btn-primary" id="Go2">Go</button> 

                        	</div>

                        </div>

                    </div>

                        

				</div>

				</div>

			</div> 		

				  <div class="modal-footer">

					<div class="col-lg-12">

						<button type="button" name="Go" style="display:none;" class=" btn btn-primary" id="Go" >Go</button>

					</div>

					</div>

	

        </div>

      </div>

    </div>

    </form>

  </div>

   </div>





<script>






   <script type='text/javascript'src='js/timepicki.js'></script>

					  <script type="text/javascript"> 

					    $('#timepicker').timepicki(); 

                        </script>

