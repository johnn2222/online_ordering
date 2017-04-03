</div>

 

<!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

-->

   <script src="js/jquery-1.11.1.min.js"></script>

 	<script src="js/bootstrap.min.js"></script> 

  <script src="js/jquery.magnific-popup.js"></script> 





   <script src="js/validate/jquery.validate.min.js"></script>
   <script src="js/validate/additional-methods.min.js"></script>

   <script src="js/validate/all_validation.js"></script>
   <script src="js/custom.js"></script>

<?php include_once('includes/modal.php');?>



</body>

</html>
<?php if($_REQUEST['success']==1)
{?>
<script>
$(document).ready(function(){
	
   //$("#closePopup").trigger('click');
   //$("#openMsg").trigger('click');
   $("#succMsgs").html('<p style="color:#2ab75d">Thank you for ordering with us!</p>');						
	   
});
</script>

<?php }?>



