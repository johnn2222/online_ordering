  <!--footer end-->

<footer class="site-footer">

  <div class="text-center">

    <?=date('Y',time())?>

   &copy; online ordering <a href="javascript:void(0)" class="go-top"> <i class="glyphicon glyphicon-arrow-up"></i> </a> </div>

</footer>
<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--<script src="js/easy-pie-chart.js"></script>-->
<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="js/jquery.sparkline.js" type="text/javascript"></script>
<!--<script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script> 
-->
<script src="js/owl.carousel.js" ></script>
<script src="js/jquery.customSelect.min.js" ></script>
<script src="js/respond.min.js" ></script>
<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
<!--common script for all pages-->
<script src="js/custom.js"></script>
<script src="js/common-scripts.js"></script>
<script src="js/validate/jquery.validate.min.js"></script>
<script src="js/validate/additional-methods.min.js"></script>
<script src="js/validate/all_validation.js"></script>

<!--script for this page-->
<script src="js/sparkline-chart.js"></script>
<script src="js/count.js"></script>
<script>
      //owl carousel
      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
			  slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true
          });

		
      });
      //custom select box
      $(function(){
          $('select.styled').customSelect();
      });
</script>
</body>
</html>



