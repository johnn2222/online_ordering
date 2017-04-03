<?php $ords = new orders();?>
<aside>

  <div id="sidebar"  class="nav-collapse ">

    <!-- sidebar menu start-->

    <ul class="sidebar-menu" id="nav-accordion">

    

      <li> <a class="<?=$page==1?'active':''?>" href="<?=WEBROOT_ADMIN?>dashboard.php"> <i class="fa fa-tachometer"></i> <span>Dashboard</span> </a> </li>

     
 <li class="<?=$subPage=="orders"?'active':''?>"><a  href="orders.php"><i class="fa fa-minus-square"></i><span>
 Orders (<?=$ords->getCountOrders()?>)</span></a></li>
    

      <li class="sub-menu"> <a href="javascript:;" class="<?=($page==5)?'active':''?>" ><i class="fa fa-wheelchair"></i><span>Manage Food Category</span> </a>

        <ul class="sub" style="display:<?=($page==5)?'block':'none'?>">

          <li class="<?=$subPage=="add-food-category"?'active':''?>"><a  href="add-food-category.php"><i class="fa fa-plus-square"></i><span>Add Food Category</span></a></li>

          <li class="<?=$subPage=="show-food-category"?'active':''?>"><a  href="show-food-category.php"><i class="fa fa-minus-square"></i><span>Show Food Category</span></a></li>

          <li class="<?=$subPage=="add-food-item"?'active':''?>"><a  href="add-food-item.php"><i class="fa fa-plus-square"></i><span>Add Food Item</span></a></li>

          

          <li class="<?=$subPage=="show-food-item"?'active':''?>"><a  href="show-food-item.php"><i class="fa fa-minus-square"></i><span>Show Food Item</span></a></li>

          

          

          <li class="<?=$subPage=="add-coupan"?'active':''?>"><a  href="add-coupan.php"><i class="fa fa-plus-square"></i><span>Add Coupan </span></a></li>

                    

          <li class="<?=$subPage=="coupan-list"?'active':''?>"><a  href="coupan-list.php"><i class="fa fa-minus-square"></i><span>Coupan list</span></a></li>

          

           <li class="<?=$subPage=="change-password"?'active':''?>"><a  href="change-password.php"><i class="fa fa-minus-square"></i><span>Change Password</span></a></li>

        </ul>

      </li>

     

	  

      <!--multi level menu start-->

      <!--multi level menu end-->

    </ul>

    <!-- sidebar menu end-->

  </div>

</aside>

