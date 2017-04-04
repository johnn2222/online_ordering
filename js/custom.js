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

//var Root ="localhost:81/online_ordering/";

var Root ="http://a2zwebmaster.com/online_ordering/";


//for open item list when jump category
function openItemList(id){
   $(".openItem-"+id).trigger("click");
}
//end



$(document).ready(function() {

//	alert(Root);

        var cartdata="";
          showCartItem(cartdata);

$("#justBrowse").click(function(){
 
         var action = "justBrowse";
	 $.ajax({
	type:'post',
	dataType:"json",
	cache:false,
	url:'process-library.php',
	data:'status=1&action='+action,
	success: function(dt)
	{
           $("#side-cont").load(location.href + " #side-cont");
           $("#chkout").load(location.href + " #chkout"); 
        }

   });
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

		subtotal=(qty.value*price);

				

	 $("#subTotal").html('<div class="pull-right"><strong>'+'Sub total $'+subtotal+'</strong></div>');

	 	 

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
		beforeSend: function()
		{
			$("#rev"+addonId).empty().html('<img src="'+Root+'images/loadersmall.gif">');
		},

		success: function(data)
		{
			if(data.res==1)
			{		

			     //$("#side-cont").load(location.href + " #side-cont");
				$("#chkout").load(location.href + " #chkout");	
                                showCartItem(data.data);

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

					
						headMsg='';
						 headMsg+='<div class="border-panel margin-bottom">';
            			headMsg+='<div class="panel-body panel-header-right no-padding">';
            			headMsg+='<input type="hidden" id="orderTypeSet" value="'+dt.orderStsMsg+'" >';	

            headMsg+='<strong style="color:#ea7f7f;">'+dt.orderStsMsg+'<a href="javascript:;" id="orderType"><br /><small class="text-right">Change Order Type!</small></a></strong></div></div>';
			

						$(".close").trigger('click');
						$("#side-cont").load(location.href + " #side-cont");
						$("#chkout").load(location.href + " #chkout");							
					$("#headerMsg").empty().html(headMsg);
					

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
	
			var sbtotal = $("#subTotal").val();

			$.ajax({

			type:'POST',

			cache:false,

			dataType:"json",			

			url:'process-library.php',

			data:'action='+action+'&CoupanCode='+CoupanCode+'&sbtotal='+sbtotal,

			beforeSend: function()

			{

				$("#Loader").html('<img src="'+Root+'images/loader.gif">');

				

			},

				success:function(dt){   

				$("#Loader").empty();

					$("#apply").show();

					

					

								

									

				//alert(dt.CoupanMsg);

				if(dt.RepeatCoupan==1)

					{

			$("#coupanMsg").empty().html('<div class="alert alert-danger">Sorry! You have already used this coupan!</div>');			

			

								setTimeout(function(){

								$("#side-cont").load(location.href + " #side-cont");

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

							

										

								setTimeout(function(){

								$("#side-cont").load(location.href + " #side-cont");

								$("#checkoutNew").load(location.href + " #checkoutNew");

								$("#chkout").load(location.href + " #chkout");

								},3000);

		

							}

								else

								{

									$("#coupanMsg").empty().html('<div class="alert alert-danger">Sorry! You have entered wrong coupan code try again!.</div>');

									

									setTimeout(function(){

									$("#side-cont").load(location.href + " #side-cont");

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

			//dataType:"json",			

			url:'process-library.php',

			data:'action='+action+'&TipAmt='+tip,

				success:function(dt){    	

				//alert(dt);

					if(dt==1)

					{

						$("#side-cont").load(location.href + " #side-cont");

						$("#chkout").load(location.href + " #chkout");			

					}

				}

		});

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
			beforeSend: function()
			{
			$("#AddOn").html('<center><img src="'+Root+'images/loader.gif"></center>');	
			},
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
                $(".main-cart").hide();
                $("#fixed-cart").show();
               // $("#cart").css("top","right",$(window).scrollTop());
              
            }else{
          $(".main-cart").show();
                $("#fixed-cart").hide();
            }
        });	
        
        
        
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
                       cartData=getData;     
                    }
                }              
                
                var temp='';                       
                 temp='<div class="row no-padding">';
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
                    temp+='</div>';
                  
                   if(cartData){
                  $("#cartData").empty().html(temp); 
                    }else{
                      temp='<div class=" text-center lang-empty-cart " id="emptyCart">Cart is empty</div>';  
                      $("#cartData").empty().html(temp); 
                    }
        }
        
    
         
      