<?php
$page=1;
include_once "includes/head-section.php";
//$ord = new orders();
?>
<style>
.ord-style{color: #fff;
    background: #F33;
    border-radius: 8px 0 8px 0;
    padding: 4px 6px;
    text-align: center;
    margin: 0 0 0 129px;}
</style>
</head>

<body>

<section id="container" >

  <!--header start-->

  <?php include_once "includes/header.php";?>

  <!--header end-->

  <!--sidebar start-->

 

  <!--sidebar end-->

  <!--main content start-->

  

  

  <section id="main-content">

    <section class="wrapper"> 

      <!--state overview start-->

		<div class="row cta-options">

			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

				<div class="cta-circle">

					<div class="cta-area" id="manage-pages">

                    <a href="show-food-category.php">

						<div class="circle-icon"><i class="fa fa-file-text"></i></div>

						<div class="circle-content"><h3>Food Category</h3></div>

                        </a>

					</div>

				</div>

			</div>

			

			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

				<div class="cta-circle">

					<div class="cta-area" id="manage-menu">

                    <a href="show-food-item.php">

						<div class="circle-icon"><i class="fa fa-tasks"></i></div>

						<div class="circle-content"><h3>Food Item</h3></div>

                        </a>

                        

					</div>

				</div>

			</div>

       

            

			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

				<div class="cta-circle">

					<div class="cta-area last" id="manage-slider">

                    <a href="orders.php">

						<div class="circle-icon"><i class="fa fa-picture-o"></i></div>

						<div class="circle-content">
                       <center>
                                      <h3>Orders</h3>
                                      </center>
                                      </div>

                        </a>

					</div>

				</div>

			</div>

            

                 

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

				<div class="cta-circle">

					<div class="cta-area" id="manage-languages">

                    <a href="change-password.php">

						<div class="circle-icon"><i class="fa fa-language"></i></div>

						<div class="circle-content"><h3>Change Password</h3></div>

                        </a>

					</div>

				</div>

			</div>

            

		</div>

        </section>

        </section>



  <!--main content end-->

  <!--footer start-->

  <?php include_once "includes/footer.php";?>

