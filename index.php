<?php include_once('includes/header.php');?>   

   <div class="content" id="Main-Cont">   

    	<div class="col-lg-12 col-sm-12">

        	<div class="row">

        	<div class="col-sm-7 col-lg-7">

            				<div class="col-lg-12 col-xs-12 col-sm-12 no-padding margin-bottom">

                            	<div class="border-panel">

                                     <div class="col-lg-4 col-xs-12 col-sm-4 margin-bottom">

                                    	 <div class="dropdown">

                            <button class="btn btn-primary dropdown-toggle col-lg-12 " type="button" data-toggle="dropdown">

                            Jump To Category

                                          <span class="caret"></span></button>

                                          <ul class="dropdown-menu col-lg-12 dropdown-adjust" style="z-index:100000; width:300px;">

                                            <?php 

											$utils = new utils();

											foreach($utils->getFoodCat() as $catlist)

											 	{?>

                                              <li><a href="#jump-category-<?=$catlist->id?>" onclick="openItemList(<?=$catlist->id?>)"><?=$catlist->category?></a></li>

                                            <?php }?>

                                          </ul>

                                       	 </div>





                                    </div>

								

                                    <div class="col-lg-6 col-xs-12 col-sm-6">

                                  

     <input type="text" class="form-control" onkeyup="searchItems(this.value);" id="Skey" placeholder="Search" name="itemSearch" />

        

                

       

                                    </div>

                                    <div class="col-sm-2 col-lg-2">

                                    <input  type="checkbox" name="expend" id="expnd" /> Expand All

                                    </div>

                                 </div>  

                             </div> 

                             

                             <div class="col-lg-12 col-xs-12 col-sm-12 no-padding margin-bottom">

                              <div id="SearchItem"></div>

                             </div>

                             

                         <div class="clearfix"></div>

                               <!--start main-con-->

                      <div id="mainCat">

                      <?php 

					 

					  foreach($utils->getFoodCat() as $cat)

					  {

					   $catImg =($cat->image!="")?IMAGE_ROOT."category/".$cat->image:IMAGE_ROOT.'default.png';?>    

                         <div class="panel panel-default allCat" id="jump-category-<?=$cat->id?>">                            

                            <div class="panel-heading panel-heading-defined panel-heading-image" style="background: rgba(0,0,0,0) url(<?=$catImg?>) no-repeat center center;background-size:cover;">

                          

                            <h3 class="panel-title">

	<a class="block-collapse collapsed openItem-<?=$cat->id?>" id="item-tigger" onclick="pluMinusIcon(<?=$cat->id?>);" data-target="#Cat-<?=$cat->id?>" data-toggle="collapse" href="javascript:void(0);">					

					<div class="category-panel-header">

						<span>

						<span class="right-icon"><i class="glyphicon glyphicon-plus icon-collapse" id="glyphicon-<?=$cat->id?>"></i></span>

                            

						</span>

						<span class="item-title cate-name-defined"><?=$cat->category?></span>

						

						<div class="category-subinfo clearfix">

					 		<div class="pull-left">

					 			<span class="category-subinfo-description cate-description-defined">

					 									 			</span>

					 		</div>

					 	</div>

					 	<span class="badge category-badge-defined"><?=$utils->countItemByCat($cat->id);?></span>

				 	</div>

				</a>

			</h3>

            				 </div>

            				<div id="Cat-<?=$cat->id?>" class="collapse" style="height: 0px;">	

			<div class="panel-body">		 			 				 	

			 	<!-- menuitem detail -->

                <?php 

				$i=1;

				foreach($utils->getFoodItemByCat($cat->id) as $item)

				{?>

			 	<div class="menu-item-container" id="menuItemId-<?=$item->id?>">

                                        <?php                                         
                                        $opnCart=array();
                                        $opnCart["ids"]=$item->id;
                                        $opnCart["sn"]=$i;
                                        $opnCart["itemName"]=$item->name;
                                        $opnCart["desc"]=$item->description;
                                        $opnCart["price"]=$item->price;
                                        $opnCart["addNow"]=1;
                                        $opnData=  base64_encode(json_encode($opnCart));
                                        
                                        ?>

				 	<div class="panel panel-default menu-item" data-target="#AddCart" data-toggle="modal" onclick="CartOpen('<?=$opnData?>');">

				 		<div class="menu-item-information has-image" data-container="body" data-toggle="popover" data-placement="top" data-content="This category is currently closed.">

				 			<div class="menu-item-price-name">				 				

				 				<div class="menu-item-name menuitem-name-defined">

				 					 <?=$i.". ".$item->name?>	

				 					

				 				</div>

				 				

				 				<div class="menu-item-price menuitem-price-defined">

				 				<?="$".$item->price?>

                                </div>

				 			</div>

				 			<div class="menu-item-description menuitem-description-defined"><?=$item->description?></div>

				 		</div>				 				 		

				 	</div>

				 	

				 						

					<div class="magnific-popup-wrap magnific-item image-popup-embed" menus_id="6956">

                    <?php  $itemImg =($item->image!="")?IMAGE_ROOT."product/".$item->image:'default.png';?>

						<a class="zooming" href="<?=$itemImg?>" title="">

							<img src="<?=$itemImg?>" class="mfp-fade item-gallery img-responsive">

						</a>			

					</div>

					

									 	

			 	</div>

			 	<?php $i++; }?>

			 			 				 	

			 	<!-- menuitem detail -->

			 

			 				 	

			</div>

		</div>	

                            

                            </div>

                      <?php }?>     

                                

                      </div> 			

             

              

              

              </div> <!--end main-col8-->

            	

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

