<?php
function __autoload($classname)
{
	require_once "class/$classname.php";
}

function generatePaginationLink($numOfPages, $page)
{
	$l = ($page > 1) ? '?page=' . ($page - 1) : 'javascript:void(0)';
	$pagination = "";
	$pagination.= "<nav class='pag-nav'><ul class=pagination>";
	$preDisplay = ($page == 1) ? 'disabled' : '';
	$pagination.= "<li class='" . $preDisplay . "'><a href='" . $l . "' aria-label='Previous'>";
	$pagination.= "<span aria-hidden=true>&laquo;</span></a></li>";
	for ($i = 1; $i <= $numOfPages; $i++) {
		$idisplay = ($page == $i) ? 'active' : '';
		$pagination.= "<li class='" . $idisplay . "'><a href='?page=$i'>$i</a></li>";
	}

	$p = ($page < $numOfPages) ? '?page=' . ($page + 1) : 'javascript:void(0)';
	$nextDisplay = ($page == $numOfPages) ? 'disabled' : '';
	$pagination.= "<li class='" . $nextDisplay . "'><a href='" . $p . "' aria-label='Next'><span aria-hidden=true>&raquo;</span></a></li>";
	$pagination.= "</ul></nav>";
	echo $pagination;
}

function uploadBannerImages($count, $files)
{
	$time = date('Y-m-d h:i:s', time());
	if (!is_dir(REPOSITORY . 'slider')) {
		mkdir(REPOSITORY . 'slider');
	}

	for ($i = 0; $i < $count; $i++) {
		$fileName = time() . "_" . $files['name'][$i];
		$fileLocation = REPOSITORY . 'slider' . "/" . $fileName;
		if (move_uploaded_file($files['tmp_name'][$i], $fileLocation)) {
			$query = "insert into tbl_banner_image(image_name,created)values('$fileName','$time')";
			mysql_query($query);
		}
	}
}

function uploadAddImages($count, $files, $data)
{
	$time = date('Y-m-d h:i:s', time());
	if (!is_dir(REPOSITORY . 'slider')) {
		mkdir(REPOSITORY . 'slider');
	}

	for ($i = 0; $i < $count; $i++) {
		$fileName = time() . "_" . $files['name'][$i];
		$fileLocation = REPOSITORY . 'slider' . "/" . $fileName;
		if (move_uploaded_file($files['tmp_name'][$i], $fileLocation)) {
			$query = "insert into tbl_banner_image(image_name,advertisement,url,created)values('$fileName','$data[isAdd]','" . $data['advertisement'][$i] . "','$time')";
			mysql_query($query);
		}
	}
}

function UploadProductImage($productId, $count, $files)
{
	$time = date('Y-m-d h:i:s', time());
	if (!is_dir(REPOSITORY . $productId)) {
		mkdir(REPOSITORY . $productId);
	}

	for ($i = 0; $i < $count; $i++) {
		$fileName = time() . "_" . $files['name'][$i];
		$fileLocation = REPOSITORY . $productId . "/" . $fileName;
		if (move_uploaded_file($files['tmp_name'][$i], $fileLocation)) {
			$query = "insert into tbl_product_image(image_name,product_id,created,dealer_id)values('$fileName','$productId','$time','".$_SESSION['administrator']['dealer']['dealer_id']."')";
			$re=mysql_query($query);
		}
	}
	if($re)
	{
		$_SESSION['succ_message'] = 'Product added successfully in the list, We will activate soon!';
	}
}


function UploadPrdImage($productId, $count, $files)
{
	$time = date('Y-m-d h:i:s', time());
	if (!is_dir(REPOSITORY . $productId)) {
		mkdir(REPOSITORY . $productId);
	}	
	for ($i = 0; $i < $count; $i++) {
		
		$fileName = time() . "_" . $files['name'][$i];
		$fileLocation = REPOSITORY . $productId . "/" . $fileName;
		if (move_uploaded_file($files['tmp_name'][$i], $fileLocation)) {
			$query = "insert into tbl_product_image(image_name,product_id,created,dealer_id)values('$fileName','$productId','$time','".$_SESSION['administrator']['dealer']['dealer_id']."')";	
			$re=mysql_query($query);			
			
		}
	}
	
	
	
}

function UploadProductBackgroundImage($productId, $files)
{
	if (!is_dir(REPOSITORY . $productId)) {
		mkdir(REPOSITORY . $productId);
	}

	$fileName = time() . "_" . $files['name'];
	$fileLocation = REPOSITORY . $productId . "/" . $fileName;
	if (move_uploaded_file($files['tmp_name'], $fileLocation)) {
		return $fileName;
	}
}

function uploadFileToDestination($files)
{
	$fileExtension = pathinfo($files['name']);
	$fileName = $fileExtension['filename'] . "." . $fileExtension['extension'];
	$fileLocation = REPOSITORY . $fileName;
	if (move_uploaded_file($files['tmp_name'], $fileLocation)) {
		return $fileName;
	}
	else {
		return false;
	}
}


function fileCSVDownload($exportData)
{
	$dataCsv = "";
	$fileName = REPOSITORY . "reports/report.csv";
	$fp = fopen($fileName, 'w');
	foreach($exportData as $fields) {
		foreach($fields as $value) {
			$value = str_replace(",", "", $value);
			$dataCsv = $dataCsv . $value . ",";
			fputcsv($fp, $value);
		}

		$dataCsv = $dataCsv . "\n";
	}

	fwrite($fp, $dataCsv);

	// open your directory

	$fp = fopen($fileName, "r");
	if ($fp) {
		$fileSize = filesize($fileName);
		header('content-type:application/octet-stream');
		header('content-disposition:filename=report.csv');
		header("content-length:$fileSize");
		header("cache-content:private");
		while (!feof($fp)) {
			$fileToDownload = fread($fp, $fileSize);
			echo $fileToDownload;
		}
	}

	fclose($fp);
	exit;
}

function fileCouponDownload($exportData)
{
	$dataCsv = "";
	$fileName = REPOSITORY . "reports/coupon.csv";
	$fp = fopen($fileName, 'w');
	foreach($exportData as $fields) {
		foreach($fields as $value) {
			$value = str_replace(",", "", $value);
			$dataCsv = $dataCsv . $value . ",";
			fputcsv($fp, $value);
		}

		$dataCsv = $dataCsv . "\n";
	}

	fwrite($fp, $dataCsv);

	// open your directory

	$fp = fopen($fileName, "r");
	if ($fp) {
		$fileSize = filesize($fileName);
		header('content-type:application/octet-stream');
		header('content-disposition:filename=coupon.csv');
		header("content-length:$fileSize");
		header("cache-content:private");
		while (!feof($fp)) {
			$fileToDownload = fread($fp, $fileSize);
			echo $fileToDownload;
		}
	}

	fclose($fp);
	exit;
}


function getMsg()
{
	if (isset($_SESSION['succ_message'])) {
		echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>' . $_SESSION['succ_message'] . '</strong></div>';
		unset($_SESSION['succ_message']);
	}
	elseif (isset($_SESSION['fail_message'])) {
		echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>' . $_SESSION['fail_message'] . '</strong></div>';
		unset($_SESSION['fail_message']);
	}
}

function getAllUser()
{
	$query = "select count(*) as totalUsers from tbl_users";
	$data = mysql_query($query);
	$numberUser = mysql_fetch_array($data);
	return $numberUser['totalUsers'];
}

function getAllOrder()
{
	$query = "select count(*) as totalOrder from tbl_order";
	$data = mysql_query($query);
	$numberOfOrder = mysql_fetch_array($data);
	return $numberOfOrder['totalOrder'];
}

function getAllShippedOrder()
{
	$query = "select count(*) as totalShippedOrder from tbl_order where order_status=3";
	$data = mysql_query($query);
	$numberOfShippedOrder = mysql_fetch_array($data);
	return $numberOfShippedOrder['totalShippedOrder'];
}

function getAllDiscountCoupon()
{
	return 0;
}

// functin : print array

function printArray($data)
{
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}


function printApprove($st)
{
	if($st==0)
	{
	echo "Approval Pending from admin!";	
	}
	else{
	echo "Approved by admin";	
	}
}

function printStatus($st)
{
	if($st==1)
	{
	echo "Active";	
	}
	else{
	echo "deActive";	
	}
}


// function: print table name
function  createObject($objectType,$array,$type){
	$object="";
	if($objectType=="select"){
			$object.="<select class='form-control makeofcar' name='info[".$type."]' id='".$type."'>";
			$object.="<option value=''>Select ".ucwords($type)."</option>";
			if($array){
				foreach($array as $data){
						$object.="<option value='".trim($data)."'>".$data."</option>";
				}          
				 $object.="</select>";
			 }
	}
	
	if($objectType=="text"){
			$object.="<input type='text' class='form-control' name='info[".$type."]' id='".$type."'>";
	}
	
	if($objectType=="checkbox"){
	    if($array){
	        foreach($array as $options){
			    $object.="<label class='checkbox-inline'>";
				$object.="<input type='checkbox' value='".$options."' id='".$type."' class='advcheckbox' name='info[".$type."]'>".$options;
				$object.="</label>";
			}
		}
	}
	
	if($objectType=="radio"){
	    if($array){
	        foreach($array as $options){
			    $object.="<label class='checkbox-inline'>";
				$object.="<input type='radio' value='".$options."' id='".$type."' class='advcheckbox' name='info[".$type."]'>"."&nbsp;&nbsp;&nbsp;".$options;
				$object.="</label>";
			}
		}
	}
	
	echo $object;
}


?>