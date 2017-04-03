<?php
ob_start();
include_once "sessionCheck.php";
//include_once "includes/config.php";
include_once "class/connect.php";
include_once "includes/library-functions.php";
$objConnect = new connect();
if ($objConnect->checkConnection())
{

$action = mysql_real_escape_string($_REQUEST['action']);

switch ($action)
{

		

		//coupan 

			case 'addCoupan':



		$coupan = new coupan();



		$coupan->addCoupan($_POST['info']);

		header('location:coupan-list.php');

		break;







	case 'editCoupan':

		$coupan = new coupan();

		$coupan->editCoupan($_POST['info'],$_POST['coupanId']);

		header('location:' . $_POST['returnUrl']);

		break;







	case 'deleteCoupan':



		$coupan = new coupan();



		$coupan->deleteCoupan($_POST['coupanId']);

		header('location:' . $_POST['returnUrl']);

		break;







	case 'activateCoupan':



		$coupan = new coupan();



		$coupan->activateCoupan($_POST['coupanId']);



		header('location:' . $_POST['returnUrl']);



		break;

		

		case 'deActivateCoupan':



		$coupan = new coupan();



		$coupan->deActivateCoupan($_POST['coupanId']);

		header('location:' . $_POST['returnUrl']);



		break;

		//end

		



	case 'change-password':

		$login = new login();

		$login->changePassword($_POST,$_POST['user_id']);

		header('location:'.$_POST['returnUrl']);

		break;

		

        

        case'UserLogin':
		$login = new login();
		$login->adminLogin($_POST);
		//header('location:'.$_POST['returnUrl']);
		break;

				

		



	case 'addCategory':



		$objCategory = new category();



		$objCategory->addCategory($_POST['info'],$_FILES['img']);



		header('location:show-food-category.php');



		break;







	case 'editCategory':



		$objCategory = new category();

		$objCategory->editCategory($_POST['info'], $_FILES['img'], $_POST['categoryId'],$_POST['oldFile']);

		header('location:' . $_POST['returnUrl']);

		break;







	case 'deleteCategory':



		$objCategory = new category();



		$objCategory->deleteCategory($_POST['category_id']);



		header('location:' . $_POST['returnUrl']);



		break;







	case 'activateCategory':



		$objCategory = new category();



		$objCategory->activateCategory($_POST['category_id']);



		header('location:' . $_POST['returnUrl']);



		break;

		

		case 'deActivateCategory':



		$objCategory = new category();



		$objCategory->deActivateCategory($_POST['category_id']);



		header('location:' . $_POST['returnUrl']);



		break;







	



	case 'addBrand':



		$objBrand = new brand();



		$objBrand->addBrand($_POST['info']);



		header('location:show-brand.php');



		break;







	case 'editBrand':



		$objBrand = new brand();



		$objBrand->editBrand($_POST['info'], 'id=' . $_POST['brandId']);



		header('location:show-brand.php');



		break;







	case 'deleteBrand':



		$objBrand = new brand();



		$objBrand->deleteBrand($_POST['brandId']);



		header('location:show-brand.php');



		break;







	case 'activateBrand':



		$objBrand = new brand();



		$objBrand->activateBrand($_POST['brandId']);



		header('location:show-brand.php');



		break;







	case 'deActivateBrand':



		$objBrand = new brand();



		$objBrand->deActivateBrand($_POST['brandId']);



		header('location:show-brand.php');



		break;







		//for search







	case 'addSearch':



		$objSearch = new search();



		$objSearch->addSearch($_POST['info']);



		header('location:'.$_POST['returnUrl']);



		break;



	



	case 'editSearch':



		$objSearch = new search();



		$objSearch->editSearch($_POST['info'], 'id=' . $_POST['moduleId']);



		header('location:show-search-module.php');



		break;







	case 'deleteSearch':



		$objSearch = new search();



		$objSearch->deleteSearch($_POST['searchId']);



		header('location:show-search-module.php');



		break;







	case 'activateSearch':



		$objSearch = new search();



		$objSearch->activateSearch($_POST['searchId']);



		header('location:show-search-module.php');



		break;







	case 'deActivateSearch':



		$objSearch = new search();



		$objSearch->deActivateSearch($_POST['searchId']);



		header('location:show-search-module.php');



		break;











		//for filters



		



	case 'addFilter':



		$objSearch = new search();



		$objSearch->addFilter($_POST['info']);



		header('location:'.$_POST['returnUrl']);



		break;



			



	case 'mapFilter':



		$objSearch = new search();



		$objSearch->mapFilter($_POST['info'],$_POST['filter_opt']);

		header('location:'.$_POST['returnUrl']);



		break;



			



			



	case 'editFilter':



		$objSearch = new search();



		$objSearch->editFilter($_POST['info'], 'id=' . $_POST['filterId']);



		header('location:'.$_POST['returnUrl']);



		break;







	case 'deleteFilters':



		$objSearch = new search();



		$objSearch->deleteFilters($_POST['filterId']);



		header('location:'.$_POST['returnUrl']);



		break;







	case 'activateFilters':



		$objSearch = new search();



		$objSearch->activateFilters($_POST['filterId']);



		header('location:'.$_POST['returnUrl']);



		break;







	case 'deActivateFilters':



		$objSearch = new search();



		$objSearch->deActivateFilters($_POST['filterId']);



		header('location:'.$_POST['returnUrl']);



		break;



		



	case 'getBrand':



		$objBrand = new brand();



		$objBrand->displayListingBrand();



	 	break;



		



	case 'getCountry':



		echo "";



	 	break;



		//







	case 'addProduct':



		$objProduct = new product();

		$objProduct->addProduct($_POST['info'],$_FILES['img'],$_POST['addon']);

		break;







	case 'updateProduct':



		$objProduct = new product();



		$objProduct->updateProduct($_POST['info'],$_FILES['img'],$_POST['productId'],$_POST['oldFile'],$_POST['addon']);



		header('location:show-food-item.php');



		break;







	case 'deleteProducts':



		$objProduct = new product();



		$objProduct->deleteProducts($_POST['productId']);



		header('location:'.$_POST['returnUrl']);



		break;







	case 'activateProducts':



		$objProduct = new product();

		$objProduct->activateProducts($_POST['productId']);

		header('location:'.$_POST['returnUrl']);



		break;

		



	case 'deActivateProducts':



		$objProduct = new product();



		$objProduct->deActivateProducts($_POST['productId']);

		header('location:'.$_POST['returnUrl']);

		break;

	default:
	    $url=explode("?",$_POST['returnUrl']);
		flushTable(basename($url[0]));
		//header("location:" . $_POST['returnUrl']);



	}



}



else



{



	echo "error in connection";



}







?>