<?php
function __autoload($classname)

{

	require_once "class/$classname.php";

}

$objConnect = new connect();

$objConnect->checkConnection();

date_default_timezone_set('America/New_York');


//defines text and value

	define('text_tax','Tax (7.83%)');
	define('tax_val','7.83');
	
	//for delivery chargest acording to km
	define('Distance','0'); //set criteria in km  like 10
	//define('KM',2)
	
	//end
//end


ini_set('display_errors','0');
/*
define('WEBROOT','http://'.$_SERVER['SERVER_NAME'].'/clients/online-order/');



define('WEBROOT_ADMIN','http://'.$_SERVER['SERVER_NAME'].'/clients/online-order/admin/');



define('REPOSITORY',$_SERVER['DOCUMENT_ROOT'].'/clients/online-order/repository/');



define('UPLOAD_REPOSITORY',$_SERVER['DOCUMENT_ROOT'].'/clients/online-order/uploads/');



define('THUMB_REPOSITORY',$_SERVER['DOCUMENT_ROOT'].'/clients/online-order/');



define('WEBROOT_REPOSITORY','http://'.$_SERVER['SERVER_NAME'].'/clients/online-order/repository/');



define('WEBROOT_FRONT','http://'.$_SERVER['SERVER_NAME'].'/clients/online-order/');



define('IMAGE_ROOT','http://'.$_SERVER['SERVER_NAME'].'/clients/online-order/repository/');

define('IMAGES','http://'.$_SERVER['SERVER_NAME'].'/clients/online-order/images/');



define('SELL_IMAGE_ROOT','http://'.$_SERVER['SERVER_NAME'].'/clients/online-order/uploads/');*/

define('WEBROOT','http://'.$_SERVER['SERVER_NAME'].'/online_ordering/');



define('WEBROOT_ADMIN','http://'.$_SERVER['SERVER_NAME'].'/online_ordering/admin/');



define('REPOSITORY',$_SERVER['DOCUMENT_ROOT'].'/online_ordering/repository/');



define('UPLOAD_REPOSITORY',$_SERVER['DOCUMENT_ROOT'].'/online_ordering/uploads/');



define('THUMB_REPOSITORY',$_SERVER['DOCUMENT_ROOT'].'/online_ordering/');



define('WEBROOT_REPOSITORY','http://'.$_SERVER['SERVER_NAME'].'/online_ordering/repository/');



define('WEBROOT_FRONT','http://'.$_SERVER['SERVER_NAME'].'/online_ordering/');



define('IMAGE_ROOT','http://'.$_SERVER['SERVER_NAME'].'/online_ordering/repository/');

define('IMAGES','http://'.$_SERVER['SERVER_NAME'].'/online_ordering/images/');



define('SELL_IMAGE_ROOT','http://'.$_SERVER['SERVER_NAME'].'/online_ordering/uploads/');







define('PAGE_LIMIT','25');





//check if restorent close

			$restoTime="08";

			$title="PM";		

			$date=date('h:i:s:A');

			

			$date2=explode(":",$date);				

			

			//print_r($date2);

			

			//if($date2[1]==$match_time[0]&&$date1[2]==$match_time[1])

			($date2[0]>=$restoTime && $date2[3]==$title)?$_SESSION['utils']['restoOpenSt']=1:$_SESSION['utils']['restoOpenSt']=0;

		
		

			



?>  