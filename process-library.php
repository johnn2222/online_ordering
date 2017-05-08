<?php

ob_start();

session_start();

include_once "includes/config.php";

$objConnect = new connect();

if ($objConnect->checkConnection())

{



	$action = mysql_real_escape_string($_REQUEST['action']);



	switch ($action)



	{

	

	

	case 'getSearch':

	$search = new utils();

	$search->getSearchItem($_POST['key']);

	break;

	

	

	case 'getDistance':

	$utils = new utils();

	$utils->getDistance($_POST['addr'],'K');

	break;

	

	

	

	case 'addCart':

	$utils = new utils();

	$utils->addCart($_POST['itemId'],$_POST['spl'],$_POST['qty'],$_POST['addonChkd']);

	break;

	

	case 'removeCartItem':

	$utils = new utils();

	$utils->removeCartItem($_POST['removeId']);

	break;

	
	case 'removeAddons':
	$utils = new utils();
	$utils->removeAddon($_POST['addonId']);
	break;

	

	

	

	case 'updateCart':

	$utils = new utils();

	$utils->updateCart($_POST['updId'],$_POST['spl'],$_POST['qty']);

	//$menu = new search();

	//$menu->GetAttributeByModule($_POST['module_id']);

	break;

	

	

	case 'coupanValidate':

	$utils = new utils();

	$utils->coupanValidate($_POST['CoupanCode'],$_POST['sbtotal']);	

	break;

	

	case'CheckoutNow':

	echo "<pre>";

	print_r($_REQUEST);

	echo "</pre>";

	break;

	case 'justBrowse':
	$_SESSION['utils']['mainStatus']=$_POST['status'];  
            
        break;

	case 'ChoosePickup':

	$_SESSION['utils']['mainStatus']=$_POST['DelSts'];

	$_SESSION['utils']['nowltrSts']=$_POST['nowltrSts'];

	$_SESSION['utils']['customeTime']=$_POST['customTime'];
                $res=array();
		$msg='';

		if($_POST['customTime']!="")

		{
			$_SESSION['utils']['msg']="Your Pickup will be ready According to your time (".$_POST['customTime'].")";
		$msg="Your Pickup will be ready According to your time (".$_POST['customTime'].")";

		}

		else{
			$_SESSION['utils']['msg']="Your Pickup will be ready in next 25 minutes.";
			$msg="Your Pickup will be ready in next 25 minutes.";

		}
          $res['data']=$_SESSION['CartItem'];
          $res['utils']['utilsMsg']=$msg;
          $res['utils']['mainStatus']=$_SESSION['utils']['mainStatus'];
          $res['utils']['nowltrSts']=$_SESSION['utils']['nowltrSts'];
          $res['utils']['customeTime']=$_SESSION['utils']['customeTime'];
          $res['res']=1;
	echo json_encode($res); 

	break;

	

	

	

	case 'ChooseDelivery':
         $res=array();
	if($_POST['DelSts']!="")
	{
		$msg='';

	$_SESSION['utils']['mainStatus']=$_POST['DelSts'];

	$_SESSION['utils']['address']=$_POST['Address'];

	$_SESSION['utils']['msg']="Your Package will be delivered in Next 60 minutes";
	$msg="Your Package will be delivered in Next 60 minutes";
	//clear session
		$_SESSION['utils']['DelSts']=$_POST['DelSts'];

		$_SESSION['utils']['nowltrSts']=$_POST['nowltrSts'];

		$_SESSION['utils']['customeTime']=$_POST['customTime'];

	

		//end
            $res['data']=$_SESSION['CartItem'];
          $res['utils']['utilsMsg']=$msg;
          $res['utils']['mainStatus']=$_SESSION['utils']['mainStatus'];
          $res['utils']['nowltrSts']=$_SESSION['utils']['nowltrSts'];
          $res['utils']['customeTime']=$_SESSION['utils']['customeTime'];
          $res['utils']['address']=$_SESSION['utils']['address'];
          $res['res']=1;
	echo json_encode($res);

	}

	break; 
	

	case'Tip':
	$_SESSION['utils']['tip']=$_POST['TipAmt'];
           $res=array();
          $res['res']=1;
          $res['data']=$_SESSION['CartItem'];
          echo json_encode($res);
          break;
	
	case'addons':           
	$utils = new utils();           
	$utils->getAddonByPrdId($_POST['pId']);
	break;



	case'Checkout':

	$utils = new utils();

	$utils->insetOrder($_POST['info'],$_POST['nowltrSts'],$_POST['payMethod']);        
	session_destroy();      
	//header('location:'.WEBROOT);
	break;	

	

	default:



	    $url=explode("?",$_POST['returnUrl']);



		flushTable(basename($url[0]));



		header("location:" . $_POST['returnUrl']);



	}



}



else



{



	echo "error in connection";



}







?>