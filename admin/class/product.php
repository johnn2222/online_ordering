<?php
class product
{

	public function addProduct($data,$files,$addon)

	{

		if(!is_dir(REPOSITORY."product"))

			{

				mkdir(REPOSITORY."product");	

			}

			$imgPath=REPOSITORY."product/".$files['name'];

			if(move_uploaded_file($files['tmp_name'],$imgPath))

			{

			$data['image']=$files['name'];	

			}	

			

		$dbcol = '';

		$dbval = '';



		$data['created'] = date('Y-m-d h:i:s', time());



		foreach($data as $column => $val)
		{
			$dbcol.= $column . ",";



			$dbval.= "'" . mysql_real_escape_string($val) . "',";



		}







		$dbcol = '( ' . substr($dbcol, 0, -1) . ' )';



		$dbval = ' VALUES ( ' . substr($dbval, 0, -1) . ' )';



		 $q = "INSERT INTO `tbl_product` {$dbcol} {$dbval}";
		$r = mysql_query($q);
		$inserId=mysql_insert_id();
			foreach($addon as $addons)
			{
				
				$insertAddon=mysql_query("insert into addon set prd_id='$inserId', addon_id='$addons' ")or die(mysql_error());
					
			}



		if($r)

		{

		header('location:show-food-item.php');	

		}

	}

	

	public function updateProduct($data,$files,$prd_id,$oldFile,$addon)

	{

		if(!empty($files['name']))

			{

				$imgPath=REPOSITORY."product/".$files['name'];

				if(move_uploaded_file($files['tmp_name'],$imgPath))

				{

				$data['image']=$files['name'];

					unlink(REPOSITORY."product/".$oldFile);	

				}

			}

			else

			{

			$data['image']=$oldFile;	

			}

		

			$data['modified'] = date('Y-m-d h:i:s', time());

			foreach($data as $index => $val)



		{



			$dbval.= ' ' . $index . '=\'' . mysql_real_escape_string($val) . '\',';



		}







		$dbval = substr($dbval, 0, -1);



		 $q = "UPDATE `tbl_product` SET {$dbval} WHERE id='".$prd_id."' ";

		if($q)
		{
			$remove=mysql_query("delete from  addon where prd_id='$prd_id' ")or die(mysql_error());	
			
			if($remove){
				
			
				foreach($addon as $addons)
					{
																				
				$insertAddon=mysql_query("insert into addon set prd_id='$prd_id', addon_id='$addons' ")or die(mysql_error());
					
					}
			}
			
				
				
			
				
		}



		if (mysql_query($q))



		{



			$_SESSION['succ_message'] = 'Product information Saved successfully';



			return true;



		}



		else



		{



			$_SESSION['fail_message'] = 'Unable to Save product information';



			return true;



		}



		

	}

			

	

	function getProductById($id)

	{

		$qry=mysql_query("select * from tbl_product where id='$id'");

		$val=array();

		while($res=mysql_fetch_object($qry))

		{

		$val[]=$res;	

		}

		return $val;

	}

	

	

	function getAllproduct($page)

	{

		$startFrom = ($page - 1) * PAGE_LIMIT;

		

		$qry=mysql_query("select cat.category as parent_cat, p.*

		 from tbl_product p

		 left join tbl_category cat on cat.id=p.category limit ". $startFrom . "," . PAGE_LIMIT)or die(mysql_error());

		$val=array();

		while($res=mysql_fetch_object($qry))

		{

		$val[]=$res;	

		}

		return $val;

	}

	

	

	function getTotalRecords()



	{



		$query = "select count(*) as products from tbl_product";



		$data = mysql_query($query);



		$studentInfo = array();



		$result = mysql_fetch_assoc($data);



		return $result['products'];



	}







	function getNumOfPages()



	{



		return ceil($this->getTotalRecords() / PAGE_LIMIT);



	}

	

	

	//end

	

	

	

	



	public function DeletePrdByUser($id)

	{		

		$qry=mysql_query("delete from tbl_product where id='$id' and user_id='".$_SESSION['administrator']['dealer']['dealer_id']."' ")or die(mysql_error());

		if($qry)

		{

		$msg['error']="Deleted!";	

		}

		else{

		$msg['error']="Error in delete process!";		

		}

		echo json_encode($msg);

	}

	

	public function getImageTop($id){



	    $strsqlViewAdmin="select * from tbl_product_image where product_id='".$id."' and display_top=1 and status=1";



		$dt=mysql_query($strsqlViewAdmin);



		$resultSet=mysql_fetch_assoc($dt);

		return $resultSet['image_name'];



	}

	

	

	

	public function deleteProducts($data)

	{

				if (count($data) > 0)



		{



			$flag = 0;



			for ($j = 0; $j < count($data); $j++)



			{



				echo $q = "delete from `tbl_product` where id=" . $data[$j]. "  ";



				if (mysql_query($q))



				{



					$flag = 1;



				}



				else



				{



					$flag = 0;



				}



			}

			





			if ($flag == 1)



			{



				$_SESSION['succ_message'] = $j . ' product(s) has been deleted successfully.';



				return true;



			}



			else



			{



				$_SESSION['fail_message'] = 'Unable to delete product in the list.';



				return false;



			}



		}



		else



		{



			$_SESSION['fail_message'] = 'Please select at least one product to delete.';



			return false;



		}

			

			

			

			

	}

	

	

		public function activateProducts($data)

		{

				if (count($data) > 0)



		{



			$flag = 0;



			for ($j = 0; $j < count($data); $j++)



			{



		 $q = "update `tbl_product` set status=1 where id=" . $data[$j]. "  ";



				if (mysql_query($q))



				{



					$flag = 1;



				}



				else



				{



					$flag = 0;



				}



			}





			if ($flag == 1)



			{



				$_SESSION['succ_message'] = $j . ' product(s) has activated successfully.';



				return true;



			}



			else



			{



				$_SESSION['fail_message'] = 'Unable to activate product in the list.';



				return false;



			}



		}



		else



		{



			$_SESSION['fail_message'] = 'Please select at least one product to activate.';



			return false;



		}

			

			

			

			

	}

	

	

	

	public function deActivateProducts($data)

		{

				if (count($data) > 0)



		{



			$flag = 0;



			for ($j = 0; $j < count($data); $j++)



			{



			$q = "update `tbl_product` set status=0 where id=" . $data[$j]. " ";



				if (mysql_query($q))



				{



					$flag = 1;



				}



				else



				{



					$flag = 0;



				}



			}

		



			if ($flag == 1)



			{



				$_SESSION['succ_message'] = $j . ' product(s) has been deactivated successfully.';



				return true;



			}



			else



			{



				$_SESSION['fail_message'] = 'Unable to deactivate product in the list.';



				return false;



			}



		}



		else



		{



			$_SESSION['fail_message'] = 'Please select at least one product to deactivate.';



			return false;



		}

			

			

			

			

	}


	public function getAddonList()
	{
		$value=array();
		$qry=mysql_query("select * from addon_list where status=1")or die(mysql_error());	
		while($res=mysql_fetch_object($qry))
		{
			$value[]=$res;
		}
		return $value;
	}
	
	public function getAddonListByPrd($prdId)
	{
		$value=array();
		
		$qry=mysql_query("select * from addon where prd_id='$prdId'")or die(mysql_error());	
		while($res=mysql_fetch_object($qry))
		{
			$value[]=$res;
		}
		return $value;
	}


}













?>