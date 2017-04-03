//var j = $.noConflict();

$(document).ready(function () {



  // var count=0;

/*	$("#sbmt2").click(function(){

		

	$(".valid").each(function(index, element) {

		//alert(element.value);

		$("#"+"lbl"+element.id+"").remove();

		var el_value = $("#"+element.id).val();

		if(el_value=="")

		{			

		 //$("#"+element.id).addClass("error");

		 $("#"+element.id).after('<label class="error" id="'+"lbl"+element.id+'">This field is required.</label>');

		 count=count+parseInt(1);

				

		}

		else{			

		// $("#"+element.id).removeClass("error");

			//$("#new-listing").submit();	

		 $("#"+"lbl"+element.id+"").remove();

		 count=0;

		}

		

	

		

		



		});

		if(count==0)

		{

			$("#new-listing").submit();	

		}

	});	

   

*/





	 



$("#CheckoutForm").validate({

	   rules:{

		    

		   'info[name]':{

			required:true   

		   },

		   

		   

		   'info[email]':{

			required:true,

			email:true   

		   },	   

		    'info[creditCard]':{

			required:true,

			number:true   

		   },	

		   

		    'info[expr]':{

			required:true,

			   

		   },	

		   

		    'info[cvv]':{

			required:true,

			number:true   

		   }	

		   

	

	   }

});

   

   

  	   

   $("#popupForm").validate({

	   rules:{

		   

		   

		   addrs:{

			required:true   

		   },

		  		 

		   

	   },

	   			messages:{					

				addrs:{

				required:"Please provide your address!"	

					}	

				}

   

   });

   

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

						
						
						headMsg='';
						 headMsg+='<div class="border-panel margin-bottom">';
            			headMsg+='<div class="panel-body panel-header-right no-padding">';
            			headMsg+='<input type="hidden" id="orderTypeSet" value="'+dt.ordStsMsg+'" >';	

            headMsg+='<strong style="color:#ea7f7f;">'+dt.ordStsMsg+'<a href="javascript:void(0);" id="orderType"><br /><small class="text-right">Change Order Type!</small></a></strong></div></div>';

						
			
					$(".close").trigger('click');
						$("#side-cont").load(location.href + " #side-cont");
						$("#chkout").load(location.href + " #chkout");		

						
					$("#headerMsg").empty().html(headMsg);
							//end

							

						

					}

					 

				 });

  

  			 });

	 







});

	  

	  

	  

   