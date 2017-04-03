<header class="header white-bg">
 </div>
 
 <!--logo start--> 
 
 <a href="<?=WEBROOT_ADMIN?>" class="logo">Haveli Indian Restaurant</span></a> 
 
 <!--logo end-->
 
 <div class="nav notify-row" id="top_menu"> 
  
  <!--  notification start -->
  
  <ul class="nav top-menu">
  </ul>
  
  <!--  notification end --> 
  
 </div>
 <div class="top-nav "> 
  
  <!--search & user info start-->
  
  <ul class="nav pull-right top-menu">
   
   <!-- user login dropdown start-->
   
   <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <img alt="" src="img/avatar1_small.png" height="29px" width="29px"> <span class="username">
    <?=$_SESSION['admin']['username']?>
    </span> <b class="caret"></b> </a>
    <ul class="dropdown-menu extended logout">
     <div class="log-arrow-up"></div>
     
     <!--<li><a href="#"><i class=" icon-suitcase"></i>Profile</a></li>



                            <li><a href="#"><i class="icon-cog"></i> Settings</a></li>



                            <li><a href="#"><i class="icon-bell-alt"></i> Notification</a></li>-->
     
     <li><a href="<?=WEBROOT_ADMIN?>logout.php"> <i class="icon-key"></i> Log Out</a></li>
    </ul>
   </li>
   
   <!-- user login dropdown end -->
   
  </ul>
  
  <!--search & user info end--> 
  
 </div>
</header>
