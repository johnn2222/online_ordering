function changeOrderType(){
                        $("#selectOrder").html('<p>Please Select Order Type</p>');    
                        $("#justBrowse").hide();
		//	var ordType = $("#orderTypeSet").val();
					
					$('#Popup').modal({

					backdrop: 'static',

					keyboard: false
 
				});
				
				
				
				
				$("#map-view").load(location.href + " #map-view");

						

	}


var host = window.location.host;

var proto = window.location.protocol;
 //define tax;
   var tax_val=8;
   var text_tax="Tax (8%)";
  

//var Root ="localhost:81/online_ordering/";

var Root ="http://a2zwebmaster.com/online_ordering/";


//for open item list when jump category
function openItemList(id){
   $(".openItem-"+id).trigger("click");
}
//end



$(document).ready(function() {
   
        var d="";
          showCartItem(d);
          //for addon
          var addOnData="";
          showAddOn(addOnData);
          
          //show utils msg
          var stsmsg="";
          showOrderStatus(stsmsg);
          //end
          if(window.localStorage.getItem("utils")){
              var utilD=JSON.parse(window.localStorage.getItem("utils"));
            $("#mainStatus").val(utilD.mainStatus);
          }
$("#justBrowse").click(function(){ 
      $(".close").trigger('click');      
       var dt={"mainStatus":1};
       window.localStorage.setItem("utils",JSON.stringify(dt));
        showOrderStatus({"mainStatus":1});
       
});	

 //open popup

 

 var mainSts = $("#mainStatus").val();

  //alert($("#mainStatus").val());

 if(mainSts=="")
 { 
$('#Popup').modal({
    backdrop: 'static',
    keyboard: false
})
 }



	//modal open by sidebar clicked on change order type

	




	$("#expnd").change(function(){

		

		var chk = $("#expnd:checked").length;

			if(this.checked)

			{	

		$(".block-collapse").trigger('click',

		$("#expnd").change(function(){

			$(".block-collapse").trigger('click');

			})

			);

			}

			

					

	});

	

	

	

  $('.zooming').magnificPopup({

        type: 'image',

        closeOnContentClick: true,

        mainClass: 'mfp-fade',

        image: {

            verticalFit: true

        }

          

    });

	

	

	$("#asc_quantity").click(function(){

		

		

		

		

		var qty = $("#quantity-selector").val();

			qty++;

			

			$("#quantity-selector").val(qty);

		

	});

	

	$("#des_quantity").click(function(){	

	

		var qty = $("#quantity-selector").val();

			if(qty>1)

			{

			qty--;

			$("#quantity-selector").val(qty);

			}

	});

	

	



	

	

	

 });

 

 function qtyPlus2(price)

 	{	 	 var QtySel = document.getElementById('quantity-selector');

			var subtotal=(price*QtySel.value);

			$("#subTotal").empty().html('<div class="pull-right"><strong>'+'Sub total $'+subtotal+'</strong></div>');

	 		

 	}

	

	 function qtyMinus2(price)

 	{	 	 var QtySel = document.getElementById('quantity-selector');

			var subtotal=(price*QtySel.value);

			$("#subTotal").empty().html('<div class="pull-right"><strong>'+'Sub total $'+subtotal+'</strong></div>');

	 		

 	}



 

 

  function qtyPlus(price)

 	{	 	 var QtySel = document.getElementById('quantity-selector');

			var subtotal=(price*QtySel.value);

			$("#subTotal").empty().html('<div class="pull-right"><strong>'+'Sub total $'+subtotal+'</strong></div>');

	 		

 	}

	

	 function qtyMinus(price)

 	{	 	 var QtySel = document.getElementById('quantity-selector');

			var subtotal=(price*QtySel.value);

			$("#subTotal").empty().html('<div class="pull-right"><strong>'+'Sub total $'+subtotal+'</strong></div>');

	 		

 	}



 //item view in modal

 function CartOpen(openData)
 {
     var opnData=atob(openData);
        opnData=JSON.parse(opnData);
        var ids=opnData.ids;
        var sn=opnData.sn+1;
        var itemName=opnData.itemName;
        var desc=opnData.desc;
        var price=opnData.price;
        var addNow=opnData.addNow;
	//ids,sn,itemName,desc,price,addNow

	// alert(ids);

	 $("#itemName").html('<h4> '+sn+'.'+' '+itemName+'</h4><input type="hidden" id="getId" value="'+ids+'">');

	 $("#itemDesc").html('<div class="pull-left"><em>'+desc+'</emp></div>');

	 $("#itemPrice").html('<div class="pull-right"><strong>'+'$'+price+'</strong></div><Br>');

	var qty=document.getElementById('quantity-selector');
//                price=parseFloat(price);
                qty=qty.value;
		var subtotal=(qty*price);
                
              			

	 $("#subTotal").html('<div class="pull-right"><strong>'+'Sub total $'+subtotal.toFixed(2)+'</strong></div>');

	 	 

	$("#asc_quantity").click(function(){

		

		qtyPlus(price); 

			

		});

		

				

	$("#des_quantity").click(function(){

		

		qtyPlus(price); 

			

		});

		

		//update car hidden

		$("#UpdId").val(ids);

		//when cart model view for add		

		$("#AddCartNow").show();

		$("#UpdateCartNow").hide();

		$("#special-request").val(' ');

		$("#quantity-selector").val('1');

		

		var qtyNew=document.getElementById('quantity-selector');

		subtotal=(qtyNew.value*price);

		$("#subTotal").html('<div class="pull-right"><strong>'+'Sub total $'+subtotal+'</strong></div>');

		//end
		

		 if(addNow==2){		

		//update Cart

		 	//view in model

			var reqspl = $("#Spl-"+ids).val();		

			var viewQty = $("#sideQty-"+ids).val();

			$("#special-request").val(reqspl);

			$("#quantity-selector").val(viewQty);

			//end

			$("#AddCartNow").hide();

			$("#UpdateCartNow").show();

						

			$("#UpdateCartNow").click(function(){				 

			updateCart($("#UpdId").val(),$("#special-request").val(),$("#quantity-selector").val());

			});

		}

		

		

		

		

 }

 

 function searchItems(key)
 {

	 var action = "getSearch";

	 $.ajax({

	type:'post',

	dataType:"json",

	cache:false,

	url:'process-library.php',

	data:'key='+key+'&action='+action,

	success: function(dt)

	{

		if(dt.length>0)

		{

			searchItem='';

			j=1;

			for(i=0;i<dt.length;i++)

			{

				var desc = "'"+dt[i].description+"'";

				var ids = "'"+dt[i].id+"'";

				var sn = "'"+j+"'";

				var name = "'"+dt[i].name+"'";

				var price = "'"+dt[i].price+"'";
                               var openData={"ids":ids,"sn":sn,"itemName":name,"desc":desc,"price":price,"addNow":"1"};
                               var openStrData=btoa(JSON.stringify(openData)); 
				searchItem+='<div class="menu-item-container" id="menuItemId">';
                                
				searchItem+='<div class="panel panel-default menu-item"  data-toggle="modal" data-target="#AddCart"  onclick="CartOpen("'+openStrData+'");" >';

							searchItem+='<div class="menu-item-information has-image" data-container="body" data-toggle="popover" data-placement="top" data-content="This category is currently closed.">';

				

								searchItem+='<div class="menu-item-price-name">';			 				

									searchItem+='<div class="menu-item-name menuitem-name-defined">'+j+++'.'+dt[i].name+'</div>';		 				

									searchItem+='<div class="menu-item-price menuitem-price-defined">'+"$"+dt[i].price+'</div>';

								searchItem+='</div>';

					 searchItem+='<div class="menu-item-description menuitem-description-defined">'+dt[i].description+'</div>';

							searchItem+='</div>';				 				 		

						searchItem+='</div>';			 						

						searchItem+='<div class="magnific-popup-wrap magnific-item image-popup-embed" menus_id="6956">';

						//$itemImg =($item->image!="")?IMAGE_ROOT."product/".$item->image:'default.png';?>

							searchItem+='<a class="zooming" href="repository/product/'+dt[i].image+'" title="">';

						searchItem+='<img src="repository/product/'+dt[i].image+'" class="mfp-fade item-gallery img-responsive">';

							searchItem+='</a>';			

						searchItem+='</div>';

						searchItem+='</div>';	

				

				}

		

		$("#SearchItem").empty().html(searchItem);

		}

		else{

			

			$("#SearchItem").empty().css({'color':'red'}).html('there are no result for "'+key+'" ');

		}

	}

		 

		 

	 });

	 

	

	 $("#SearchItem").empty()

 }

 

 //end

 

 function pluMinusIcon(id){
		$("#glyphicon-"+id).toggleClass("glyphicon-minus glyphicon-plus");
               // $("#Cat-"+id).toggleClass("showTab hideTab");
                

	}

	

	



	

	

	function AddToCart(id,spl,qty)

	{

		//get addonw
		chk =new Array();
		$("input[name='addOn']:checked").each(function(){
            chk.push($(this).val());
        });
		
		
		//end
		$("#AddCartNow").hide();
		//

		//alert(id);

		/*;

		alert(spl);

		alert(qty);*/

		var action = "addCart";
		$.ajax({

		type:'post',

		dataType:"json",

		cache:false,

		url:'process-library.php',

		data:'itemId='+id+'&action='+action+'&spl='+spl+'&qty='+qty+'&addonChkd='+chk,
//		beforeSend: function()
//		{
//			$(".loader2").html('<img src="'+Root+'images/loader.gif">');
//		},
		success: function(dt)
		{
			$("#PrdClose").trigger('click');
			
			if(dt.res==1)
			{			
                        var carData=JSON.stringify(dt.data);
			window.localStorage.setItem("cartItem",carData);		
			//$("#side-cont").load(location.href + " #side-cont");			
			$("#chkout").load(location.href + " #chkout");
                       	showCartItem(dt.data);				
                            //if addon
                            if(dt.addOns){
                             var addonData=JSON.stringify(dt.addOns);
			     window.localStorage.setItem("addOns",addonData);
                              showAddOn(dt.addOns);
                            }
                            //end
			}

			//$(".loader2").empty();
			}

		

		

	 });

}



function updateCart(updId,spl,qty)
	{
		$("#UpdateCartNow").hide();

		var action = "updateCart";

		$.ajax({

		type:'post',

		dataType:"json",

		cache:false,

		url:'process-library.php',

		data:'updId='+updId+'&action='+action+'&spl='+spl+'&qty='+qty,
//		beforeSend: function()
//		{
//			$(".loader2").html('<img src="'+Root+'images/loader.gif">');
//		},

		success: function(data)
		{
			if(data.res==1)
			{
                            var carData=JSON.stringify(data.data);
                            window.localStorage.setItem("cartItem",carData);
				$("#PrdClose").trigger('click');

                                       // $("#side-cont").load(location.href + " #side-cont");					
				       $("#chkout").load(location.href + " #chkout");	
					//$(".loader2").empty();
                                        //show cart item
                                        showCartItem(data.data);
                                        
                                         //if addon
                                     if(data.addOns){
                                    var addonData=JSON.stringify(data.addOns);
                                     window.localStorage.setItem("addOns",addonData);
                                      showAddOn(data.addOns);
                                        }
                                    //end
			}

		}

		

	 });

}

//remove addon

function removeAddon(addonId)
{

	var action = "removeAddons";

		$.ajax({

		type:'post',

		dataType:"json",

		cache:false,

		url:'process-library.php',

		data:'addonId='+addonId+'&action='+action,
//		beforeSend: function()
//		{
//			$("#rev"+addonId).empty().html('<img src="'+Root+'images/loadersmall.gif">');
//		},

		success: function(data)
		{
			if(data.res==1)
			{		

			     //$("#side-cont").load(location.href + " #side-cont");
				$("#chkout").load(location.href + " #chkout");	
                                showCartItem(data.data);
                                  //if addon
                                     if(data.addOns){
                                    var addonData=JSON.stringify(data.addOns);
                                     window.localStorage.setItem("addOns",addonData);
                                     showAddOn(data.addOns);
                                        }
                                       
                                    //end

			}

		}

		

	 });	

}

//end

function RemoveCartItem(id)
{
	var action = "removeCartItem";

		$.ajax({

		type:'post',
		dataType:"json",
		cache:false,                
		url:'process-library.php',

		data:'removeId='+id+'&action='+action,
//		beforeSend: function()
//		{
//			$("#revId-"+id).empty().html('<img src="'+Root+'images/loadersmall.gif">');
//		},

		success: function(data)
		{

			if(data.res==1)
			{                           
			//$("#side-cont").load(location.href + " #side-cont");
                        var carData=JSON.stringify(data.data);                       
			window.localStorage.setItem("cartItem",carData);                         
			$("#chkout").load(location.href + " #chkout");                      
			showCartItem(data.data);
			}

		}

		

	 });	

}



function CatQtyPlus(id){
	//alert(id);

			var qty = $('#sideQty-'+id).val();

			qty++;			

			$("#sideQty-"+id).val(qty);

		//alert(qty);

		

		//update cart when qty plus

		updateCart(id,$("#Spl-"+id).val(),$("#sideQty-"+id).val());

		//end

	}

	

	function CatQtyMinus(id){

		//alert(id);

			var qty = $('#sideQty-'+id).val();

			if(qty>1)

			{

			qty--;

			$("#sideQty-"+id).val(qty);

			//update cart when qty minus

			updateCart(id,$("#Spl-"+id).val(),$("#sideQty-"+id).val());

			//end

			}

	}

	







function SearchAddress(){

		$("#SearchAddr").hide();

		var addr = $("#LocSearch").val();

		var action = "getDistance";

		$.ajax({

		type:'post',

		dataType:"json",

		cache:false,

		url:'process-library.php',

		data:'addr='+addr+'&action='+action,

		beforeSend: function()
		{
			$("#addLoader").html('<img src="'+Root+'images/loader.gif">');			

		},

		success: function(data)

		{

			//alert(data.distance);

			if(data)

			{

					//var km =data.distance;		

					

					if(data.Sts==0)
					{

				$("#validateAddr").show().html('<div class="col-lg-12 no-margin"><div class="alert alert-danger">'+data.msg+'</div></div>');
					
					$("#Go").hide().prop('disabled',true);	
					}
					
					if(data.Sts==1)
					{
					$("#validateAddr").show().html('<div class="col-lg-12 no-margin"><div class="alert alert-success">'+data.msg+',<br><font style="color:#f76565;">Note:Minimum order for delivery is $15.</font></div></div>');

					$("#Go").show().prop('disabled',false);
					}			

						

						$("#addLoader").empty();	

						$("#SearchAddr").show();

						

			}					

			

		}

	 });

	// 

	//setTimeout(function(){$("#validateAddr").slideUp('slow');},5000);

}









 function chkNowLtr(sts)

	 {

		 	 

		 if(sts=="1")

		 {			

			$("#timepicker").hide();

		 }

		 if(sts=="2"){

			$("#timepicker").show();		

			$("#Go2").show(); 

		 }

	 }

	 



$(document).ready(function(){
    
    //for delivery
     $("#Go").click(function(){

	   DelSts='';

	   Address='';

	    if($("#popupForm").valid())
		{

			DelSts+= $("#DelPick").val();	

			Address+=$("#LocSearch").val();

		}

			var action ="ChooseDelivery";
				 $.ajax({
				type:'POST',
				url:"process-library.php",
				cache:false,
				dataType:"json",
				data:'action='+action+'&DelSts='+DelSts+'&Address='+Address,
                                success: function(dt)
					{  
                                            if(dt.res==1){
                                            $(".close").trigger('click');
                                            $("#chkout").load(location.href + " #chkout");												                                            
                                            //set orderstatus
                                            showOrderStatus(dt.utils); 
                                            window.localStorage.setItem("utils",JSON.stringify(dt.utils));                                                                                       
                                            //cal show cart
                                            var d="";
                                            showCartItem(d); 
                                            //end
                                             
                                            //end                                    
                                           
                                            }
					}
				 });

  

  			 });
    //end
    
    
                            $("#Go2").click(function(){			
				DelSts='';

				$("input[name='DelPick']:checked").each(function(index, element) {

					 DelSts+= $(this).val();

					//alert(DelSts);

				});

				nowltrSts='';

				$("input[name='nowltr']:checked").each(function(index, element) {

				//var nowltrTime = $(this).val();

				 	nowltrSts+= $(this).attr("id");


				//alert(nowltrTime);

				//alert(nowltrSts);

				 //alert($(this).val()); 

					//get ltr time if custome time is selected

					customTime='';

					if(nowltrSts=="later")

					{				

						 customTime+= $("#timepicker").val();

						//alert(customTime);

							

					}

					  

				 });

				 var action ="ChoosePickup";
				 $.ajax({
				type:'POST',
				url:"process-library.php",
				cache:false,
				dataType:"json",
				data:'action='+action+'&DelSts='+DelSts+'&nowltrSts='+nowltrSts+'&customTime='+customTime,
				success: function(dt)
					{  
                                            if(dt.res==1){
                                            $(".close").trigger('click');
                                            $("#chkout").load(location.href + " #chkout");												                                            
                                            //set orderstatus
                                            showOrderStatus(dt.utils); 
                                            window.localStorage.setItem("utils",JSON.stringify(dt.utils));                                                                                       
                                            //cal show cart
                                            var d="";
                                            showCartItem(d); 
                                            //end
                                             
                                            //end                                    
                                           
                                            }
					}

			 });

		});

});





function ChooseOpt(delpic)
    {	

	  	if(delpic=="delivery")
		{

			//delivery tab 

		$("#Go").show(); 	

		$("#search-box").show();

		$("#map-canvas").show(); 
			$("#now-ltr").hide();
                }
		 else
		 {

		 //picku tab

		 $("#timepicker").hide();

		$("#search-box").hide();

		$("#map-canvas").hide();

			$("#now-ltr").show();

			$("#Go").hide(); 

	 	}

	 }

	 

	

	

	

	

	//cookie function set And get

	

	 

	 function setCookie(cname,cvalue,exdays){

		 //alert('hi');

	 var d = new Date();

    d.setTime(d.getTime() + (exdays*24*60*60*1000));

    var expires = "expires=" + d.toGMTString();

    document.cookie = cname+"="+cvalue+"; "+expires;

  }

  

  function GetCookie(cname){

	 var  name = cname + "=";

 	  var getCook = document.cookie.split(';');

	  for(i=0;i<getCook.length;i++)

	  {

		  c=getCook[i];

		  while (c.charAt(0)==' ') {

            c = c.substring(1);

        	}

		

		 if (c.indexOf(name) == 0) {

          	return c.substring(name.length);

        }

		

	  }

	  

	  

  }

	//end

	

	

	///coupan validatation

	

	function ValidateCoupan()
	{		
		var CoupanCode =$("#coupanCode").val();
		if(CoupanCode!="")
		{
		$("#apply").hide();
		//alert(coupanCode);
	
			var action ="coupanValidate";
	
			var sbtotal = $("#subTotalAmt").val();

			$.ajax({

			type:'POST',

			cache:false,

			dataType:"json",			

			url:'process-library.php',

			data:'action='+action+'&CoupanCode='+CoupanCode+'&sbtotal='+sbtotal,

//			beforeSend: function()
//			{
//				$("#Loader").html('<img src="'+Root+'images/loader.gif">');
//
//			},

				success:function(dt){   

				//$("#Loader").empty();
                                $("#apply").show();							

				//alert(dt.CoupanMsg);

				if(dt.RepeatCoupan==1)
					{
			$("#coupanMsg").empty().html('<div class="alert alert-danger">Sorry! You have already used this coupan!</div>');			
	

								setTimeout(function(){
								//$("#side-cont").load(location.href + " #side-cont");
								$("#checkoutNew").load(location.href + " #checkoutNew");
								$("#chkout").load(location.href + " #chkout");
								},3000);

					}
					else{
                                            if(dt.CoupanMsg==3)
						{
							$("#coupanMsg").empty().html('<div class="alert alert-danger">Sorry your coupan value is exceeded the total amount!</div>');	
						

						}
						else{
                                                    if(dt.CoupanMsg==1)
                                                    {
						   $("#coupanMsg").empty().html('<div class="alert alert-success">You have successfully applied this coupan($'+dt.coupan_amt+')!</div>');								
        						
                                                        showAppliedCoupon(dt.coupan_amt);
                                                        window.localStorage.setItem("appliedCoupon",dt.coupan_amt);
                                                        
                                                                        setTimeout(function(){
								//$("#side-cont").load(location.href + " #side-cont");

								$("#checkoutNew").load(location.href + " #checkoutNew");
								$("#chkout").load(location.href + " #chkout");

								},3000);

							}
								else
								{
									$("#coupanMsg").empty().html('<div class="alert alert-danger">Sorry! You have entered wrong coupan code try again!.</div>');
							
									setTimeout(function(){
									//$("#side-cont").load(location.href + " #side-cont");

									$("#chkout").load(location.href + " #chkout");

									$("#checkoutNew").load(location.href + " #checkoutNew");

									},3000);

										

								}

						}

					

					}

					

					

								

						

					

					//setTimeout(function(){$("#coupanMsg").slideUp();},5000);

			}	

		});
		
		}
		else{
			
		$("#coupanMsg").empty().html('<div class="alert alert-danger">Please enter coupan code!</div>');			
	
		}

	}

	

	

	function Tip(tip){                
            var action ="Tip";
		$.ajax({
			type:'POST',

			cache:false,

			dataType:"json",			

			url:'process-library.php',

			data:'action='+action+'&TipAmt='+tip,
				success:function(dt){    	
				//alert(dt);
					if(dt.res==1)
					{
					window.localStorage.setItem("Tip",tip);
                                        showCartItem(dt.data);	
                                        $("#chkout").load(location.href + " #chkout");			
                                        
					}

				}

		});
//
	}

	//end
	
	function CheckoutNow()
	{
		var action ="Checkout";
		var all_data=$("#CheckoutForm").serialize();
				
			if($("#CheckoutForm").valid())
			{	
				$.ajax({

			type:'POST',

			cache:false,

			dataType:"json",			

			url:'process-library.php',

			data:'action='+action+'&all_data='+all_data,

				success:function(dt){    	

				//alert(dt);

					if(dt.res==1)
					{
                                            document.location.href=Root+'?success=1';	
                                            window.localStorage.clear();            

					}

				}

		});
			}
		
	}
	
	function getAddon(pId)
	{
		//alert('hello');
		var action = "addons";
		$.ajax({
			type:'POST',
			url:'process-library.php',
			data:'action='+action+'&pId='+pId,
			dataType:"json",
			cache:false,
//			beforeSend: function()
//			{
//			$("#AddOn").html('<center><img src="'+Root+'images/loader.gif"></center>');	
//			},
			success: function(dt)
			{
				//alert(dt);			
			if(dt.length>0){
				
				addon='';
				addon+='<div class="panel control-group panel-default">';
				addon+='<div class="panel-body">';
				addon+='<strong>Addons:</strong><div class="col-lg-12 no-padding">';
				for(i=0;i<dt.length;i++)
				{
										
addon+='<span><input type="checkbox" name="addOn" class="addOn" value="'+dt[i].addon_id+'" /> '+dt[i].addon_name+ ' $'+dt[i].addon_price+'</span>';     			   			       			
           	
				}
				 addon+='</div>';
            	 addon+='</div>';				
	  			addon+='<div class="panel-body">';
       			addon+='<p><font style="color:red;">Please Note:</font>'; 
			addon+='Any instructions that alter the price will reflect your final cost. (extra sauce, extra cheese etc).</p>';
       		addon+='</div>';
      	
				 
				$("#AddOn").empty().html(addon);
			}
			else
			{
			$("#AddOn").empty();	
			}
			
		}
		
			
		});
		
	}
	
        
 $(window).on("scroll", function() {
               if($(window).scrollTop() >=280) {              
                $("#fixed-cart").addClass("fixed-cart");
               // $("#cart").css("top","right",$(window).scrollTop());
              
            }else{
                $("#fixed-cart").removeClass("fixed-cart");
            }
        });	
        
        
        function showAddOn(addOnData){            
           
            var addons="";           
           if(addOnData!=""){           
                addons=addOnData;     
                }else{
                    if(window.localStorage.getItem("addOns")){                      
                     addons=window.localStorage.getItem("addOns");
                     addons=JSON.parse(addons);
//                     alert(JSON.stringify(cartData));
                    }else{
                       addons=addOnData;     
                    }
                }
                
            if(addons!=""){
                var addonTotal=0;
                var addon="";
            	addon='<span><strong>Addons: </strong>';
                 for(var i=0;i<addons.length;i++){
                     var price="$ "+addons[i].addon_price;
                addon+='<small>"'+addons[i].addon_name+'"+"'+price+'"';
                addon+='<a href="javascript:;" id="rev'+addons[i].addon_id+'" onclick="removeAddon('+addons[i].addon_id+');">&times;</a></small></span>';    
                addonTotal+=addons[i].addon_price;
                }			
                $("#addOnData").empty().html(addon);
                $("#addOnTotal").val(addonTotal);
             }
         }   
        
        
        
        function showOrderStatus(utils){           
            var utilsData="";
               if(utils!=""){
                utilsData= utils;               
                }
                else{
                    if(window.localStorage.getItem("utils")){
                    utilsData =JSON.parse(window.localStorage.getItem("utils"));
                    }
                    else{
                     utilsData="";   
                    }
                }                
               
               if(utilsData!="" && utilsData.mainStatus!=1){
                   $("#mainStatus").val(utilsData.mainStatus);
                   $("#nowltrStatus").val(utilsData.nowltrSts);
                   $("#customeTime").val(utilsData.customeTime);
                    $("#deliverAddress").val(utilsData.address);
                   
                   var headMsg='';
                   headMsg+='<div class="border-panel margin-bottom">';
            	   headMsg+='<div class="panel-body panel-header-right no-padding">';
            	   headMsg+='<input type="hidden" id="orderTypeSet" value="'+utilsData.utilsMsg+'" >';	
                   headMsg+='<strong style="color:#ea7f7f;">'+utilsData.utilsMsg+'<a href="javascript:;" onclick="changeOrderType();" id="orderType"><br /><small class="text-right">Change Order Type!</small></a></strong></div></div>';
                   $("#headerMsg").empty().html(headMsg);
               }
        }
        
        function showAppliedCoupon(couponData){           
            var appliedCoupon="";
               if(couponData!=""){
                appliedCoupon= couponData;
                if(window.localStorage.getItem("appliedCoupon")){
                    appliedCoupon = window.localStorage.getItem("appliedCoupon");
                }
                else{
                   appliedCoupon="";
                }                
               }
               if(appliedCoupon!=""){
                   $("#coupApplied").val(appliedCoupon);
               }
        }
        
        function showCartItem(getData){
           var cartData="";           
           if(getData!=""){  
               
                cartData=getData;     
                }else{
                    if(window.localStorage.getItem("cartItem")){                      
                     cartData=window.localStorage.getItem("cartItem");
                     cartData=JSON.parse(cartData);
//                     alert(JSON.stringify(cartData));
                    }else{
                       cartData="";     
                    }
                }              
                
                var calc='';
                var temp='';          
                var subTotal=0;
                var itemDiscount=0;
                 temp='<div class="row no-padding">';
                 if(cartData){
                         for(var i=0;i<cartData.length;i++){     
                        temp+='<div class="col-lg-12 no-padding">';   
                        temp+='<div class="col-xs-3">';                       
                        temp+='<input type="hidden" name="price" value="'+cartData[i].price+'" id="cartPrice" />';
                        temp+='<input type="hidden" name="spl" value="'+cartData[i].spl+'" id="Spl-'+cartData[i].id+'" />';
                        temp+='<div id="orderQtyH-'+cartData[i].id+'">';
                        temp+='<div class="checkout-quantity" style="float:left;" onClick="CatQtyMinus('+cartData[i].id+')">';
                        temp+='<i class="fa fa-minus-circle cart-item-desc" style="margin: 4px;"></i></div>'; 
                        temp+='<input id="sideQty-'+cartData[i].id+'" readonly="readonly" type="text" class="my-input2"  maxlength="4" autocomplete="off" value="'+cartData[i].qty+'">';
                        temp+='<div class="checkout-quantity qty-asc" style="float:left;" onclick="CatQtyPlus('+cartData[i].id+');"><i class="fa fa-plus-circle cart-item-asc" id="CatQtyPlus" style="margin: 4px;"></i></div>';
                        temp+='</div>';
                       temp+='</div>';
                    temp+='<div class="col-xs-3 checkout-item lang-item no-padding">';
                    temp+='<span class="order-item-name">'+cartData[i].name+'</span>';                                 
                   if(cartData[i].spl!=""){
                    temp+='<div class="col-lg-12"><small class="text-color"><em>'+cartData[i].spl+'</em></small></div>';
                    }
                    var total=cartData[i].price*cartData[i].qty;
                    itemDiscount+=cartData[i].discount;
                    subTotal+=total;
                    temp+='</div>';
                    temp+='<div class="col-xs-2 checkout-price lang-price">$ '+cartData[i].price+'</div>';
		   temp+='<div class="col-xs-2 checkout-price lang-price">$ '+total.toFixed(2)+'</div>';                     
                   temp+='<div class="col-xs-1 checkout-edit">';
                   var Id= cartData[i].id;
                   var indx=i;
                   var name=cartData[i].name;
                   var desc=cartData[i].des;
                   var price=cartData[i].price;              
                 
                   var openData={"ids":Id,"sn":indx,"itemName":name,"desc":desc,"price":price,"addNow":"2"};
                   var openStrData=btoa(JSON.stringify(openData));                             
                   
                   temp+='<a href="javascript:;" data-target="#AddCart" data-toggle="modal" onclick=CartOpen("'+openStrData+'")>';                   
                   temp+='<span class="glyphicon glyphicon-edit text-danger cart-item-edit"  title="Edit" idx="0"></span></a>';
                   temp+='</div>';
                   temp+='<div class="col-xs-1 checkout-close">';
                   temp+='<a href="javascript:;" onclick="RemoveCartItem('+cartData[i].id+')"><span class="glyphicon glyphicon-remove text-danger cart-item-remove"  title="Remove"></span>';
                   temp+='</a>';
                   temp+='</div>';
                   temp+='</div>';
                         }
                    }
                    temp+='</div>';
                    
                    //calculation content total subtotal etc
                        var addOnTotal=$("#addOnTotal").val();                    
                     calc='<div class="total-row">';
                     calc+='<div class="pull-left"><span>Sub -Total:</span></div>';
                     calc+='<div id="cart-sub-total" class="pull-right cart-sub-total">$ '+subTotal.toFixed(2)+'</div>';
                     calc+='<input type="hidden" id="subTotalAmt" value="'+subTotal+'">';                
                     calc+='</div>';
                    //end
                    
                    calc+='<div class="total-row ">';
                    calc+='<div class="pull-left">Discount:</div>';
                    var grand=(subTotal+addOnTotal)-itemDiscount;
                    var mainDiscount=0;
                        if(grand>=50){
                             mainDiscount=(subTotal*15/100);                            
                        }
                       var tax=(grand*tax_val/100);
                       var grandTotal=(grand-mainDiscount)+tax;                       
                     calc+='<div id="cart-discount" class="pull-right cart-discount" discount_type="percent">$ '+mainDiscount+'</div>';
                     calc+='</div>';                          
                     calc+='<div class="total-row ">';
                    calc+='<div class="pull-left">';
                    calc+='<span>'+text_tax+'</span>';
                    calc+='</div>';
                    calc+='<div id="cart-taxes" class="pull-right cart-taxes" >$ '+tax.toFixed(2)+'</div>';
                    calc+='</div>';                
                    if(addOnTotal>0){            
                        calc+='<div class="total-row">';
                        calc+='<div class="pull-left"><span class="lang-delivery-fee"><strong>Addons</strong></span>:</div>';
                        calc+='<div id="cart-delivery-fee" class="pull-right text-right">$ '+addOnTotal+'.00</div></div>';            
                            }
                  calc+='<div class="total-row">'
                  calc+='<div class="pull-left"><span class="lang-delivery-fee">Tip</span>:</div>';
                  calc+='<div id="cart-delivery-fee" class="pull-right text-right">';
                  calc+='<strong>$</strong>';
                  var Tip=0;
                  if(window.localStorage.getItem("Tip")){
                       Tip=window.localStorage.getItem("Tip");                     
                  }
                  calc+='<input type="text" onkeyup="Tip(this.value)" name="tip" value="'+Tip+'" class="my-input"  id="tip"></div>';
                  calc+='</div>';
                  calc+='<div class="total-row">';
                  calc+='<div class="col-lg-12 no-padding no-margin">';
                  calc+='<div id="coupanMsg"></div>';
            	  calc+='<div class="col-lg-2 no-padding">';
                  calc+='<div class="pull-left"><span class="lang-delivery-fee"><strong>Coupon</strong></span>:</div>';
                  calc+='</div>';
                  calc+='<div class="col-lg-4 no-padding">';
                  calc+='<div id="cart-delivery-fee" class="pull-left text-left">';
                  calc+='<input type="text" name="coupanCode" class="form-control"  id="coupanCode" placeholder="enter your coupon code"/>';
                  calc+='</div>';
                  calc+='</div>';
                calc+='<div class="col-lg-3 pull-left text-left no-padding" style="margin-left:2px;">';
                calc+='<div id="Loader"></div>';
                calc+='<input type="button" name="apply" id="apply" onClick="ValidateCoupan();" value="Apply Now" class="btn btn-primary" />';
                calc+='</div>';                    
                var appliedCoupon=$("#coupApplied").val();
                if(appliedCoupon>0){
                    calc+='<div class="col-lg-4 pull-right no-padding text-right">';
                    calc+='<strong class="text-color">Applied Coupan </strong> -$('+appliedCoupon+' )';
                    calc+='</div>';
                    }
                calc+='</div>';
                calc+='</div>';
                calc+='<div class="big-total-row" id="big_total_scroll" style="padding:5px;" >';
                calc+='<div class="pull-left">Total:</div>';
                var bigTotal=grandTotal+parseInt(Tip);              
                bigTotal=Math.ceil(bigTotal-appliedCoupon);                
                calc+='<div id="cart-total" class="pull-right cart-total">$ '+bigTotal+'</di>';		                                              
                calc+='</div>';
                calc+='</div>';  
                
                //order status
                calc+='<div id="order-type-selector">';
               calc+='<div class="row">';
               calc+='<div class="col-sm-12">';
               calc+='<div class="col-lg-12 pull-left text-left no-padding">';
               var utilsData='';
               if(window.localStorage.getItem("utils")){
                   var utilsData =JSON.parse(window.localStorage.getItem("utils"));
                    }
               var mainSts=utilsData.mainStatus;              
               var nowltrSts=utilsData.nowltrSts;
               var customeTime=utilsData.customeTime;
               if(mainSts!="" && mainSts!=1){                
                 calc+='<strong>Order Status: </strong>';
                 calc+='<span class="text-color" style="text-transform:captlize;">'+mainSts+'</span>';                   
                    if(nowltrSts=="later"){
                    calc+='| <strong>Time Status: </strong>';   
                    calc+='<span class="text-color">Custom time choosen (<font style="color:#ea7f7f">'+customeTime+'</font>)</span>';  
                    }
               }
                 calc+='</div>';
                 calc+='<div class="row">';
                 calc+='<div class="col-lg-12">';
                 calc+='<hr class="no-margin">';
                 calc+='</div>';
                 calc+='</div>';
                calc+='</div>';
                calc+='</div>';
                calc+='</div>';                
                calc+='<div class="cart_auto_spy" style="top: 630px;">';
                if(mainSts=="delivery" && grandTotal>=25 || mainSts=="pickup"){
                calc+='<a href="checkout.php" class="btn btn-block btn-primary btn-main-defined" id="cart-checkout" data-container="body">Checkout</a>';
                }else if(mainSts==1){
                  calc+='<a href="javascript:;" onclick="changeOrderType();" class="btn btn-primary" style="width:100%;" id="cart-checkout" data-container="body" data-toggle="popover" data-placement="top" data-content="">Checkout</a>';
                }
		calc+='</div>'; 	

                //store checkout info
                var chkout={};
                    chkout.subTotal=subTotal;
                    chkout.grandTotal=grandTotal;
                    chkout.couponApplied=appliedCoupon;
                    chkout.tipAmt=Tip;
                    chkout.tax=tax;
                    chkout.mainDiscount=mainDiscount;
                    chkout=JSON.stringify(chkout);
                window.localStorage.setItem("checkoutInfo",chkout);                
                //end

                //end
                
            
                         //end
         
                   if(cartData!=""){               
                  $("#cartData").empty().html(temp);
                  $("#calcualtionPart").empty().html(calc);                  
                    }else{                     
                      var temp2='<div class=" text-center lang-empty-cart " id="emptyCart">Cart is empty</div>';  
                      $("#cartData").empty().html(temp2); 
                      $("#calcualtionPart").empty().html("");  
                    }
        }
        
    
         
      