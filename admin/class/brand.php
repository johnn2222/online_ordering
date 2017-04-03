<?php
class brand 
{
    public function displayBrand($page)
    {
		$startFrom=($page-1)*PAGE_LIMIT;
        $strsqlViewAdmin="select * from  tbl_brand  order by id DESC limit ".$startFrom.",".PAGE_LIMIT;
        $resultViewAdmins = mysql_query($strsqlViewAdmin);
        $AdminsList = array();
        while($infoViewAdmins=mysql_fetch_assoc($resultViewAdmins))
        {			
                $AdminsList[]=$infoViewAdmins;			
        }
        return $AdminsList;
    }
	
	public function displayParentBrand()
    {
        $strsqlViewAdmin="select * from  tbl_brand where parent_id=0 order by id DESC ";
        $resultViewAdmins = mysql_query($strsqlViewAdmin);
        $AdminsList = array();
        while($infoViewAdmins=mysql_fetch_assoc($resultViewAdmins))
        {			
                $AdminsList[]=$infoViewAdmins;			
        }
        return $AdminsList;
    }
    
	public function displayParentBrandByModel()  
    {
        $strsqlViewAdmin="select * from  tbl_brand where parent_id<>0 order by id DESC ";
        $resultViewAdmins = mysql_query($strsqlViewAdmin);
        $AdminsList = array();
        while($infoViewAdmins=mysql_fetch_assoc($resultViewAdmins))
        {			
                $AdminsList[]=$infoViewAdmins;			
        }
        return $AdminsList;
    }
	
	public function displayParentBrandId($id)
    {
        $strsqlViewAdmin="select * from  tbl_brand where parent_id=$id order by id DESC ";
        $resultViewAdmins = mysql_query($strsqlViewAdmin);
        $AdminsList = array();
        while($infoViewAdmins=mysql_fetch_assoc($resultViewAdmins))
        {			
                $AdminsList[]=$infoViewAdmins;			
        }
        return $AdminsList;
    }
	
    function getTotalRecords()
    {
	    $query="select count(*) as pages from tbl_brand";
	    $data=mysql_query($query);
	    $studentInfo=array();
	    $result=mysql_fetch_assoc($data);
	    return $result['pages'];
    }
    
    function getNumOfPages()
    {
      return ceil($this->getTotalRecords()/PAGE_LIMIT);
    }
	
	function getBrandById($brandId)
    {
		$query="select * from tbl_brand where id=$brandId";
		$dataSet=mysql_query($query);
		$userInformation=mysql_fetch_assoc($dataSet);
		return $userInformation;
    }
    
    public function addBrand($data) 
    {
		if($this->validateBrand($data['brand_name']))
		{
			$_SESSION['message']='this brand name already created,please try another one';
			return false;
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
        $q = "INSERT INTO `tbl_brand` {$dbcol} {$dbval}";
        $r = mysql_query($q);
        if(mysql_insert_id()>0)
        {
            $_SESSION['succ_message']='brand added successfully in the list';
            return true;
        }
        else
        {
            $_SESSION['fail_message']='Unable to add brand in the list';
            return false;
        }
    }
	
	public function validateBrand($brandName)
	{
		$q="select * from tbl_brand where brand_name='".$brandName."'";
		$r=mysql_query($q);
		if(mysql_num_rows($r)==1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
    public function deleteBrand($data)
    {
       if(count($data)>0){ 
			$flag=0;
			for($j=0;$j<count($data);$j++){
				$q = "delete from `tbl_brand` where id=".$data[$j];
				 if(mysql_query($q)){
					$flag=1;
				 }else{
					$flag=0;
				 }
			}
			if($flag==1){
				$_SESSION['succ_message']=$j.' brand has been deleted successfully.';
				return true;
			}else{
				$_SESSION['fail_message']='Unable to delete brand in the list.';
				return false;
			}
		}else{
			$_SESSION['fail_message']='Please select at least one brand to delete.';
			return false;
		}
    }
    
    public function deActivateBrand($data) 
    {
		if(count($data)>0){
			$flag=0;
			for($j=0;$j<count($data);$j++){
				 $q = "update `tbl_brand` set status=0 where id=".$data[$j];
				 if(mysql_query($q)){
					$flag=1;
				 }else{
					$flag=0;
				 }
			}
			if($flag==1){
				$_SESSION['succ_message']=$j.' brand(s) has been deactivated successfully.';
				return true;
			}else{
				$_SESSION['fail_message']='Unable to set status of brand in the list.';
				return false;
			}
		}else{
			$_SESSION['fail_message']='Please select at least one brand to deactivate.';
			return false;
		}
    }
	
	public function activateBrand($data) 
    {
	   if(count($data)>0){
			$flag=0;
			for($j=0;$j<count($data);$j++){
				$q = "update `tbl_brand` set status=1 where id=".$data[$j];
				 if(mysql_query($q)){
					$flag=1;
				 }else{
					$flag=0;
				 }
			}
			if($flag==1){
				$_SESSION['succ_message']=$j.' brand(s) has been activated successfully.';
				return true;
			}else{
				$_SESSION['fail_message']='Unable to set status of brand in the list.';
				return false;
			}
		}else{
			$_SESSION['fail_message']='Please select at least one brand to activate.';
			return false;
		}
    }
    
    public function editBrand($data,$validation=1) 
    {
		$dbval='';
		$data['modified']=date('Y-m-d h:i:s',time());
		foreach($data as $index => $val)
		{
		 $dbval .= ' ' . $index . '=\'' .mysql_real_escape_string($val) . '\',';
		}
		$dbval = substr($dbval,0,-1);
		$q = "UPDATE `tbl_brand` SET {$dbval} WHERE $validation";
		if(mysql_query($q))
		{
		  $_SESSION['succ_message']='Brand information updated successfully';
		  return true;
		}
		else
		{
		   $_SESSION['fail_message']='Unable to update Brand information';
		   return true;
		}
	
    }
	
}
