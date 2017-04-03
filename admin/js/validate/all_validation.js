//var j = $.noConflict();
$(document).ready(function () {
//disabled condetails tab							
//   $("#ac_detail").attr('href','').css({'color':'#ccc','pointer-events':'none','cursor':'default'});

   //$("#ac_detail").addClass('remove_atag');
   
   var count=0;
	$("#sbmt2").click(function(){
		
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
   
   
   $("#change-pwd").validate({
	   rules:{
		   
		   
		   old_pwd:{
			required:true   
		   },
		  pwd:{
					required:true,
					minlength:8
					},
									
				cfpwd:{
					required:true,
					equalTo:"#pwd"
					}
					 
		   
	   },
	   			messages:{					
				cfpwd:{
				equalTo:"Password do not match!"	
					}	
				}
   });
   
	  $("#dealer-signup").validate({							 
			rules:{			
					
				name:{
					required:true
					},
					postal:{
					required:true,
					number:true
					},	
												
				phone:{
				required:true,
				number:true,
				minlength:10,
				maxlength:10
					},
					
							
				email:{
				required:true,
				email:true
				},
				
				pwd:{
					required:true,
					minlength:8
					},
									
				cfpwd:{
					required:true,
					equalTo:"#pwd"
					},
					
							
			},
				messages:{					
				cfpwd:{
				equalTo:"Password do not match!"	
					}	
				
					
					
				}
						
								
							 
		 });
	  
	 
	 //hide flash msg
	
	
	
});

window.onload = function(){
	
var msg = $("#msgs").html();
		if(msg==""){
	$("#msgs").hide();	
	}	
	
};






	  
	  
	  
   