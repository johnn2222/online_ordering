<?php
class category 
{
	
	public function getCategoryById($id)
	{
	
	$qry=mysql_query("select * from tbl_category where id='$id'")or die(mysql_error());		
	$val=array();
	while($res=mysql_fetch_object($qry))
		{
		$val[]=$res	;		
		}
		return $val;
	}
	
    public function displayAllCategory($page)
    {
		$startFrom=($page-1)*PAGE_LIMIT;
        $strsqlViewCategory="select * from  tbl_category order by id DESC limit ".$startFrom.",".PAGE_LIMIT; 
        $resultViewCategory = mysql_query($strsqlViewCategory);
        $CategoryList = array();
        while($infoViewCategory=mysql_fetch_object($resultViewCategory))
        {			
                $CategoryList[]=$infoViewCategory;			
        }
        return $CategoryList;
    }
    

	
    function getTotalRecords()
    {
	    $query="select count(*) as pages from tbl_category";
	    $data=mysql_query($query);
	    $studentInfo=array();
	    $result=mysql_fetch_assoc($data);
	    return $result['pages'];
    }
    
    function getNumOfPages()
    {
      return ceil($this->getTotalRecords()/PAGE_LIMIT);
    }
    
    public function addCategory($data,$files)
	  {
			if(!is_dir(REPOSITORY."category"))
			{
				mkdir(REPOSITORY."category");	
			}
			$imgPath=REPOSITORY."category/".$files['name'];
			if(move_uploaded_file($files['tmp_name'],$imgPath))
			{
			$data['image']=$files['name'];	
			}	
			
			$dbcol='';$dbval='';
			$data['created']=date('Y-m-d h:i:s',time());
			foreach($data as $column => $val)
			{ 
				$dbcol .= $column . ",";
				$dbval .= "'" . mysql_real_escape_string($val) . "',";
			}
			$dbcol = '( ' . substr($dbcol,0,-1) . ' )';
			$dbval = ' VALUES ( ' . substr($dbval,0,-1) . ' )';      
			$q = "INSERT INTO `tbl_category` {$dbcol} {$dbval}";
			$r = mysql_query($q);
			if(mysql_insert_id()>0)
			{
				$_SESSION['succ_message']='Category Item added successfully in the list';
				return true;
			}
			else
			{
				$_SESSION['fail_message']='Unable to add Category Item in the list';
				return false;
			}
		
    }
	
	
    public function editCategory($data,$files,$id,$oldFile)
	    {
			if(!empty($files['name']))
			{
				$imgPath=REPOSITORY."category/".$files['name'];
				if(move_uploaded_file($files['tmp_name'],$imgPath))
				{
				$data['image']=$files['name'];
					unlink(REPOSITORY."category/".$oldFile);	
				}
			}
			else
			{
			$data['image']=$oldFile;	
			}
		
		$dbval='';	
		$data['modified']=date('Y-m-d h:i:s',time());
		foreach($data as $index => $val)
		{
		 $dbval .= ' ' . $index . '=\'' .mysql_real_escape_string($val) . '\',';
		}
		$dbval = substr($dbval,0,-1);
		$q = "UPDATE `tbl_category` SET {$dbval} WHERE id='".$id."'";
		if(mysql_query($q))
		{
		 $_SESSION['succ_message']='Category Item Updated successfully!';
		  return true;
		}
		else
		{
		   $_SESSION['fail_message']='Unable to update category Item information';
		   return true;
		}	
    }
	
	
	
	
		public function deleteCategory($data)

    {

       if(count($data)>0){

			$flag=0;

			for($j=0;$j<count($data);$j++){

				 $q = "delete from `tbl_category` where id=".$data[$j];

				 if(mysql_query($q)){

					$flag=1;

				 }else{

					$flag=0;

				 }

			}

			if($flag==1){

				$_SESSION['succ_message']=$j.' Category has been deleted successfully.';

				return true;

			}else{

				$_SESSION['fail_message']='Unable to delete category in the list.';

				return false;

			}

		}else{

			$_SESSION['fail_message']='Please select at least one category to delete.';

			return false;

		}

    }

    

    public function deActivateCategory($data)

    {

		if(count($data)>0){

			$flag=0;

			for($j=0;$j<count($data);$j++){

				 $q = "update `tbl_category` set status=0 where id=".$data[$j];

				 if(mysql_query($q)){

					$flag=1;

				 }else{

					$flag=0;

				 }

			}

			if($flag==1){

				$_SESSION['succ_message']=$j.' category has been deactivated successfully.';

				return true;

			}else{

				$_SESSION['fail_message']='Unable to set status of category in the list.';

				return false;

			}

		}else{

			$_SESSION['fail_message']='Please select at least one category to deactivate.';

			return false;

		}

    }

	

	public function activateCategory($data)

    {

	   if(count($data)>0){

			$flag=0;

			for($j=0;$j<count($data);$j++){

				$q = "update `tbl_category` set status=1 where id=".$data[$j];

				 if(mysql_query($q)){

					$flag=1;

				 }else{

					$flag=0;

				 }

			}
 
			if($flag==1){

				$_SESSION['succ_message']=$j.' category has been activated successfully.';

				return true;

			}else{

				$_SESSION['fail_message']='Unable to set status of category in the list.';

				return false;

			}

		}else{

			$_SESSION['fail_message']='Please select at least one category to activate.';

			return false;

		}

    }
	
	
	public function getParentNum()
	{
	$qry=mysql_query("select * from tbl_category where status=1")or die(mysql_error());
	$numrow=mysql_num_rows($qry);
	return $numrow;	
	}
	
	public function getParentCat()
	{
		
		$qry=mysql_query("select * from tbl_category where status=1 and lable=0")or die(mysql_error());
		$val=array();
		while($res=mysql_fetch_object($qry))
		{
		$val[]=$res;	
		}
		return $val;
	}
	
}


