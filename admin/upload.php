<?php
include_once('sessionCheck.php');
include_once('includes/config.php');
include_once('includes/library-functions.php');
$objConnect=new connect();
if($objConnect->checkConnection())
{
		
	$action=$_POST['action'];
	$productId=$_POST['productid'];
	switch($action)
	{
		 case 'backgroundimage':
			 $objProduct=new product();
			  $imageName=UploadProductBackgroundImage($productId,$_FILES['backgroundimage']);
			 $objProduct->updateProductBackgroundImage($productId,$imageName,$_POST['lastimage']);
			 header('location:add-image.php?productid='.$productId);
		  break;
		  
		 case 'addBanners':
		     $count=count($_FILES['banners']['name']);
			 uploadBannerImages($count,$_FILES['banners']);
			 header('location:add-banners.php');
		  break;
		  case'UploadPrdImage':
		 	 $count=count($_FILES['prdImg']['name']);			
			UploadPrdImage($productId,$count,$_FILES['prdImg']);
			header('location:'.$_POST['returnUrl']);		
			break;
		  
		   case 'addAdvertisement':
		     $count=count($_FILES['banners']['name']);
			 uploadAddImages($count,$_FILES['banners'],$_POST);
			 header('location:show-advertisement.php');
		  break;
		 default:	 
			$count=count($_FILES['prdImg']['name']);			
			uploadProductImage($productId,$count,$_FILES['prdImg']);
			header('location:my-listing.php');
			
	}
	
		
	
}
?>