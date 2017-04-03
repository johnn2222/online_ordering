	var host=window.location.host;
$(document).ready(function(){

	$("#img").change(function(){
		files = this.files;
size1 = files[0].size;
name1 = files[0].name;
//alert(size1+" " +files);
 if(name1!="" && size1 > 800*1000)
  { 
     document.getElementById('img_error').innerHTML="Please upload less than 800kb file size";
		$('#sbmt').attr("disabled", true);
		 return false;
	 	}
			else
				  {
					$('#sbmt').removeAttr("disabled");
					 document.getElementById('img_error').innerHTML="";
					return true;
				  }


	});

	
	$("#owl-slider").owlCarousel({

		navigation : true,

		navigationText : false,

		pagination : false,

		slideSpeed : 300,

		paginationSpeed : 400,

		singleItem:true,

		autoPlay : 3000

	});

	

	var owlreview = $("#owl-review");

	var owlsimilar = $("#owl-similar");

	

	owlreview.owlCarousel({

		itemsCustom : [

			[0, 1],

			[320, 1],

			[640, 2],

			[991, 3],

			[1200, 3]

		],

		navigation : true,

		navigationText : ["&#xf104","&#xf105"],

		pagination : false

	});

	

	owlsimilar.owlCarousel({

		itemsCustom : [

			[0, 1],

			[380, 2],

			[480, 3],

			[768,4],

			[991, 5],

			[1200, 6]

		],

		navigation : true,

		navigationText : ["&#xf104","&#xf105"],

		pagination : false

	});

	

	

	

	

	/*========= Product Slider ===============*/

	

	var bigImg = $("#bigImg");

	var thumbImg = $("#thumbImg");

 

	bigImg.owlCarousel({

		singleItem : true,

		slideSpeed : 1000,

		navigation : true,

		navigationText : ["&#xf104","&#xf105"],

		pagination : false,

		afterAction : syncPosition,

		responsiveRefreshRate : 200,

	});

 

	thumbImg.owlCarousel({

		

		itemsCustom : [

			[0, 2],

			[380, 3],

			[550, 4],

			[767, 5],

			[991, 4],

			[1200, 5]

		],

		pagination:false,

		responsiveRefreshRate : 100,

		afterInit : function(el){

			el.find(".owl-item").eq(0).addClass("synced");

		}

	});

 

	function syncPosition(el){

		var current = this.currentItem;

		$("#thumbImg")

		.find(".owl-item")

		.removeClass("synced")

		.eq(current)

		.addClass("synced")

		if($("#thumbImg").data("owlCarousel") !== undefined){

			center(current)

		}

	}

 

	$("#thumbImg").on("click", ".owl-item", function(e){

		e.preventDefault();

		var number = $(this).data("owlItem");

		bigImg.trigger("owl.goTo",number);

	});

 

	function center(number){

		var thumbImgvisible = thumbImg.data("owlCarousel").owl.visibleItems;

		var num = number;

		var found = false;

		for(var i in thumbImgvisible){

			if(num === thumbImgvisible[i]){

				var found = true;

			}

		}

 

		if(found===false){

			if(num>thumbImgvisible[thumbImgvisible.length-1]){

				thumbImg.trigger("owl.goTo", num - thumbImgvisible.length+2)

			}else{

				if(num - 1 === -1){

					num = 0;

				}	

				thumbImg.trigger("owl.goTo", num);

			}

		} else if(num === thumbImgvisible[thumbImgvisible.length-1]){

			thumbImg.trigger("owl.goTo", thumbImgvisible[1])

		} else if(num === thumbImgvisible[0]){

			thumbImg.trigger("owl.goTo", num-1)

		}

    }

	/*========= Product Slider ===============*/

	



	$('#back-to-top').on('click', function (e) {

		e.preventDefault();

		$('html,body').animate({

			scrollTop: 0

		}, 700);

	});



	

	

	$(document).delegate('*[data-toggle="lightbox"]:not([data-gallery="navigateTo"])', 'click', function(event) {

		event.preventDefault();

		return $(this).ekkoLightbox({

			onShown: function() {

				if (window.console) {

					return console.log('onShown event fired');

				}

			},

			onContentLoaded: function() {

				if (window.console) {

					return console.log('onContentLoaded event fired');

				}

			},

			onNavigate: function(direction, itemIndex) {

				if (window.console) {

					return console.log('Navigating '+direction+'. Current item: '+itemIndex);

				}

			}

		});

	});



	$(document).delegate('*[data-gallery="navigateTo"]', 'click', function(event) {

		event.preventDefault();

		return $(this).ekkoLightbox({

			onShown: function() {

				var lb = this;

				$(lb.modal_content).on('click', '.modal-footer a', function(e) {

					e.preventDefault();

					lb.navigateTo(2);

				});

			}

		});

	});



	var submitIcon = $('.searchbox-icon');

	var inputBox = $('.searchbox-input');

	var searchBox = $('.searchbox');

	var isOpen = false;

	submitIcon.click(function(){

		if(isOpen == false){

			searchBox.addClass('searchbox-open');

			inputBox.focus();

			isOpen = true;

		} else {

			searchBox.removeClass('searchbox-open');

			inputBox.focusout();

			isOpen = false;

		}

	});  

	 submitIcon.mouseup(function(){

		return false;

	});

	searchBox.mouseup(function(){

		return false;

	});

	$(document).mouseup(function(){

		if(isOpen == true){

			$('.searchbox-icon').css('display','block');

			submitIcon.click();

		}

	});

	$(".headsearch input[type='search']").bind('focus', function() {

		$(this).css('background-color', 'white');

	});


});




function buttonUp(){

	var inputVal = $('.searchbox-input').val();

	inputVal = $.trim(inputVal).length;

	if( inputVal !== 0){

		$('.searchbox-icon').css('display','none');

	} else {

		$('.searchbox-input').val('');

		$('.searchbox-icon').css('display','block');

	}

}


function getAllAttrByCat(cat_id){		
	//alert(cat_id);		
			var action="GetAttributeByCat";
			$.ajax({
			type:'post',
			//dataType:"json",
			cache:false,
			url:"process-library.php",	
			data:"action="+action+"&cat_id="+cat_id,
			beforeSend: function(){
		$("#vehicel-details").empty().html("<center><img src='images/loader.gif'></center>");},
			success: function(dt)
			{
				//alert(dt);
				$("#vehicel-details").html(dt);
				/*if(dt)
				{
					var action1="createAttrObjCat";
					$.ajax({
						type:'post',
						//dataType:"json",
						cache:false,
						url:"process-library.php",	
						data:"action="+action1+"&CatId="+cat_id,
						success: function(data)
						{						
							alert(data);		
						}
					});
				}*/
				//alert(dt);
				
			}
	
			});
		
	}
	
	



function getSubCategory(parent_id)
{
	
	var action='getSubCat';
	$.ajax({
	type:'post',
	dataType:"json",
	cache:false,
	url:"process-library.php",	
	data:"action="+action+"&parent_id="+parent_id,
	beforeSend: function(){
		$("#getSubCat").empty().html("<center><img src='images/loader.gif'></center>");		
	},
	success:function(dt){			
		//alert(dt);
		if(dt.length>0){
		getSubCat='';
						getSubCat+='<div class="form-group">';
                    	getSubCat+='<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">';
                    	getSubCat+='<label for="" class="control-label">Sub Category<span>*</span></label></div>';
                    	getSubCat+='<div class="col-lg-9 col-lg-push-0 col-md-10 col-sm-10 col-xs-12  input-effect">';
                    	getSubCat+='<select class="form-control" name="info[sub_category]" onChange="getMakeBySubCat(this.value);">';
						getSubCat+='<option value="">Please Select</option>';
		for(i=0;i<dt.length;i++)
		{                  	
        	getSubCat+='<option value="'+dt[i].id+'">'+dt[i].category+'</option>';                    
		}
		    		  	getSubCat+='</select>';
                    	getSubCat+='</div>';
                    	getSubCat+='</div>';
		
			$("#getSubCat").empty().html(getSubCat);
			$("#p-years").hide();
			$("#make").empty().html();
			$("#model").empty().html();
					
		}
		else{
		$("#getSubCat").empty();		
		$("#p-years").show();
		getMake(parent_id);
		$("#make").show();
		$("#model").empty();
		}
	}
		
		
	});
}


function getMake(parent_id)
{	
	var action='getMake';
	$.ajax({
	type:'post',
	dataType:"json",
	cache:false,
	url:"process-library.php",	
	data:"action="+action+"&parent_id="+parent_id,
	beforeSend: function(){
		$("#make").empty().html("<center><img src='images/loader.gif'></center>");	
	},
	success:function(dt){			
		//alert(dt);
			if(dt.length>0){
						make='';
						make+='<div class="form-group">';
                    	make+='<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">';
                    	make+='<label for="" class="control-label">Make<span>*</span></label></div>';
                    	make+='<div class="col-lg-9 col-lg-push-0 col-md-10 col-sm-10 col-xs-12  input-effect">';
                    	make+='<select class="form-control" name="info[make]" onChange="getModel(this.value);">';
						make+='<option value="">Please Select</option>';
		for(i=0;i<dt.length;i++)
		{                  	
        make+='<option value="'+dt[i].make+'">'+dt[i].make+'</option>';                    
		}
		    		  	make+='</select>';
                    	make+='</div>';
                    	make+='</div>';
		
			$("#make").empty().html(make);
			}
			else{
			$("#make").empty();	
			$("#p-years").hide();
			}
	}
		
		
	});
}



function getModel(make)
{	
	var action='getModel';
	$.ajax({
	type:'post',
	dataType:"json",
	cache:false,
	url:"process-library.php",	
	data:"action="+action+"&make="+make,
	beforeSend: function(){
		$("#model").empty().html("<center><img src='images/loader.gif'></center>");		
	},
	success:function(dt){			
		//alert(dt);
			if(dt.length>0){
						model='';
						model+='<div class="form-group">';
                    	model+='<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">';
                    	model+='<label for="" class="control-label">Model<span>*</span></label></div>';
                    	model+='<div class="col-lg-9 col-lg-push-0 col-md-10 col-sm-10 col-xs-12  input-effect">';
                    	model+='<select class="form-control" name="info[model]" id="model_id" onChange="GetAdditionlInfo(this.value)" >';
						model+='<option value="0">Please Select</option>';
		for(i=0;i<dt.length;i++)
		{                  	
        model+='<option value="'+dt[i].brand_name+'">'+dt[i].brand_name+'</option>';                    
		}
		    		  	model+='</select>';
                    	model+='</div>';
                    	model+='</div>';
		
			$("#model").empty().html(model);
			}
			else{
			$("#model").empty();	
			}
	}
		
		
	});
}


function getMakeBySubCat(subcat)
{
	var action='getMakeBySubCat';
	$.ajax({
	type:'post',
	dataType:"json",
	cache:false,
	url:"process-library.php",	
	data:"action="+action+"&subcat="+subcat,
	beforeSend: function(){
		$("#make").empty().html("<center><img src='images/loader.gif'></center>");		
	},
	success:function(dt){			
		//alert(dt);
			if(dt.length>0){
						makeBySubCat='';
						makeBySubCat+='<div class="form-group">';
                    	makeBySubCat+='<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">';
                    	makeBySubCat+='<label for="" class="control-label">Make<span>*</span></label></div>';
                    	makeBySubCat+='<div class="col-lg-9 col-lg-push-0 col-md-10 col-sm-10 col-xs-12  input-effect">';
                    	makeBySubCat+='<select class="form-control" name="info[make]" onChange="getModel(this.value);">';
						makeBySubCat+='<option value="">Please Select</option>';
		for(i=0;i<dt.length;i++)
		{                  	
        makeBySubCat+='<option value="'+dt[i].make+'">'+dt[i].make+'</option>';                    
		}
		    		  	makeBySubCat+='</select>';
                    	makeBySubCat+='</div>';
                    	makeBySubCat+='</div>';
			
			$("#p-years").show();
			$("#make").empty().html(makeBySubCat);
			$("#model").empty();												
			}
			else{
			$("#make").empty();	
			$("#p-years").hide();
			$("#model").empty();
			}
	}
		
		
	});
	
}



function GetAdditionlInfo(opt_val)
{		//alert(opt_val);
		//$("#additionalInfo").empty().html("<center><img src='images/loader.gif'></center>");
		if(opt_val!=0)
		{
		$("#additionalInfo").show()

		}
		else{			
		$("#additionalInfo").hide();	
		}
		
}


//update value

function getModel2(make,select_model)
{	

	var action='getModel2';
	$.ajax({
	type:'post',
	//dataType:"json",
	//cache:false,
	url:"process-library.php",	
	data:"action="+action+"&make="+make+"&select_model="+select_model,
	success:function(dt){			
		//alert(dt);
		
			if(dt){
			    $("#model2").empty().html(dt);               
				}
				else{
				$("#model2").empty();	
				}
		
			
			}
		
		
	});
}

function DeletePrdByUser(id)
{		
		var action="DeletePrdByUser";
		var cond=confirm("do you realy want to delete");
		if(cond==true)
		{
			$.ajax({
			type:'POST',
			cache:false,
			dataType:"json",	
			url:'process-library.php',
			data:'action='+action+'&prd_id='+id,
			beforeSend: function()
			{
			$("#"+id).html('<center><img src="images/loader.gif"></center>');	
			},
			success:function(dt)
			{
				//alert(dt.error);
				if(dt)
				{
				$("#tbl-my-listing").load(location.href + " #tbl-my-listing");
				$("#userMsg").show().html(dt.error);					
				setTimeout(function(){
					$("#userMsg").slideUp();
					},3000);
				}
			}
						
			});
	}
	else{
		
		return false;
	}
}
	

//delete image

	
	
	function showUpload()
	{
		//alert("hi");
		/*$("#show-upload").toggle('slow',function(){
			
			$("#show-upload").toggle('slow');
		});*/
		
		$("#show-upload").toggleClass("show-up show-hide");

		
	}
	

	



	function deleteImage(id,prd_id)
	{		
		var  action='deletePrdImg';
		var cond=confirm("do you realy want to delete");
		if(cond==true)
		{
		$.ajax({			
			type:'post',
			url:"process-library.php",
			dataType:"json",
			data:'action='+action+'&ImgId='+id+'&prd_id='+prd_id,
			beforeSend: function()
			{
			$("#"+id).empty().html('<img src="images/loader.gif">');	
			},
			success:function(dt)
			{
				//alert(dt.error);
				if(dt)
				{					
				$(".btn-front-success").show().html(dt.error);
				$("#prdCont").load(location.href + " #prdCont");
					setTimeout(function(){
					$(".btn-front-success").slideUp();
					},3000);
				}
			}
			
			});
		}
		else
			{
			return false;	
			}
}

function deleteImageMulti(prd_id)
	{		
		var allImgId= new Array();
		var chkLenght = $("input[name='imgchk']:checked").length;
		if(chkLenght==0)
		{
			$("#lenError").show().html('Please select at least 1 to delete!');
			setTimeout(function(){
							$("#lenError").slideUp('slow');
						},3000);
		}
		else{

			$("input[name='imgchk']:checked").each(function(){				
				 allImgId.push($(this).val());  
			});
			
			var  action='deletePrdImgAll';
			var cond=confirm("do you realy want to delete?");
			if(cond==true)
			{
			$.ajax({			
				type:'post',
				url:"process-library.php",
				dataType:"json",
				data:'action='+action+'&allImgId='+allImgId+'&prd_id='+prd_id,
				beforeSend: function()
				{
				$("#prdCont").empty().html('<img src="images/loader.gif">');	
				},
				success:function(dt)
				{
					//alert(dt.error);
					if(dt)
					{					
					$(".btn-success").show().html(dt.error);
					$("#prdCont").load(location.href + " #prdCont");
						setTimeout(function(){
						$(".btn-success").slideUp();
						},3000);
					}
				}
				
				});
			}
			else
				{
				return false;	
				}
		}
}



	function setFront(prd_id)
	{		
		var allImgId= new Array();
		//alert(allImgId);
		var chkLenght = $("input[name='imgchk']:checked").length;
		if(chkLenght>1 || chkLenght==0)
		{
			$("#lenError").show().html('Please select at least 1 to Set Front Image!');
			setTimeout(function(){
							$("#lenError").slideUp('slow');
						},3000);
		}
		else{

			$("input[name='imgchk']:checked").each(function(){				
				 allImgId.push($(this).val());  
			});
			
			var  action='SetFrontImg';
			var cond=confirm("do you want to use this image to Front?");
			if(cond==true)
			{
			$.ajax({			
				type:'post',
				url:"process-library.php",
				dataType:"json",
				data:'action='+action+'&id='+allImgId+'&productid='+prd_id,
				beforeSend: function()
				{
				$("#prdCont").empty().html('<img src="images/loader.gif">');	
				},
				success:function(dt)
				{
					//alert(dt.error);
					if(dt)
					{					
					$(".btn-front-success").show().html(dt.error);
						setTimeout(function(){
							$(".btn-front-success").slideUp('slow');
						},3000);
					$("#prdCont").load(location.href + " #prdCont");
						
					}
				}
				
				});
			}
			else
				{
				return false;	
				}
		}
}


function setBack(prd_id)
	{		
		var allImgId= new Array();
		var chkLenght = $("input[name='imgchk']:checked").length;
		if(chkLenght>1 || chkLenght==0)
		{
			$("#lenError").show().html('Please select at least 1 to Set Back Image!');
			setTimeout(function(){
							$("#lenError").slideUp('slow');
						},3000);
		}
		else{

			$("input[name='imgchk']:checked").each(function(){				
				 allImgId.push($(this).val());  
			});
			
			var  action='SetBackImg';
			var cond=confirm("do you want to use this image to Back?");
			if(cond==true)
			{
			$.ajax({			
				type:'post',
				url:"process-library.php",
				dataType:"json",
				data:'action='+action+'&id='+allImgId+'&productid='+prd_id,
				beforeSend: function()
				{
				$("#prdCont").empty().html('<img src="images/loader.gif">');	
				},
				success:function(dt)
				{
					//alert(dt.error);
					if(dt)
					{					
					$(".btn-front-success").show().html(dt.error);
							setTimeout(function(){
							$(".btn-front-success").slideUp('slow');
						},3000);
					
					$("#prdCont").load(location.href + " #prdCont");
						
					}
				}
				
				});
			}
			else
				{
				return false;	
				}
		}
}

