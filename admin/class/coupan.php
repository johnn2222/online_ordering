<?php
class coupan
{
	
	public function getCoupanById($id)
	{
	
	$qry=mysql_query("select * from coupan where id='$id'")or die(mysql_error());		
	$val=array();
	while($res=mysql_fetch_object($qry))
		{
		$val[]=$res	;		
		}
		return $val;
	}
	
    public function displayAllCoupan($page)
    {
		$startFrom=($page-1)*PAGE_LIMIT;
        $qry="select * from  coupan order by id DESC limit ".$startFrom.",".PAGE_LIMIT; 
        $sql = mysql_query($qry);
        $coupans = array();
        while($res=mysql_fetch_object($sql))
        {			
                $coupans[]=$res;
        }
        return $coupans;
    }
    

	
    function getTotalRecords()
    {
	    $query="select count(*) as pages from coupan";
	    $data=mysql_query($query);
	    $studentInfo=array();
	    $result=mysql_fetch_assoc($data);
	    return $result['pages'];
    }
    
    function getNumOfPages()
    {
      return ceil($this->getTotalRecords()/PAGE_LIMIT);
    }
    
   
    public function addCoupan($data)
	  {
		
			$dbcol='';$dbval='';
			$data['created']=date('Y-m-d h:i:s',time());
			foreach($data as $column => $val)
			{ 
				$dbcol .= $column . ",";
				$dbval .= "'" . mysql_real_escape_string($val) . "',";
			}
			$dbcol = '( ' . substr($dbcol,0,-1) . ' )';
			$dbval = ' VALUES ( ' . substr($dbval,0,-1) . ' )';      
			$q = "INSERT INTO `coupan` {$dbcol} {$dbval}";
			$r = mysql_query($q);
			if(mysql_insert_id()>0)
			{
				$_SESSION['succ_message']='Coupan  added successfully in the list';
				return true;
			}
			else
			{
				$_SESSION['fail_message']='Unable to add coupan in the list';
				return false;
			}
		
    }
	
	
    public function editCoupan($data,$id)
	    {
					
		$dbval='';	
		$data['modified']=date('Y-m-d h:i:s',time());
		foreach($data as $index => $val)
		{
		 $dbval .= ' ' . $index . '=\'' .mysql_real_escape_string($val) . '\',';
		}
		$dbval = substr($dbval,0,-1);
		$q = "UPDATE `coupan` SET {$dbval} WHERE id='".$id."'";
		if(mysql_query($q))
		{
		 $_SESSION['succ_message']='Coupan Item Updated successfully!';
		  return true;
		}
		else
		{
		   $_SESSION['fail_message']='Unable to update Coupan  information';
		   return true;
		}	
    }
	
	
	
	
		public function deleteCoupan($data)

    {

       if(count($data)>0){

			$flag=0;

			for($j=0;$j<count($data);$j++){

				 $q = "delete from `coupan` where id=".$data[$j];

				 if(mysql_query($q)){

					$flag=1;

				 }else{

					$flag=0;

				 }

			}

			if($flag==1){

				$_SESSION['succ_message']=$j.' Coupan has been deleted successfully.';

				return true;

			}else{

				$_SESSION['fail_message']='Unable to delete coupan in the list.';

				return false;

			}

		}else{

			$_SESSION['fail_message']='Please select at least one coupan to delete.';

			return false;

		}

    }

    

    public function deActivateCoupan($data)

    {

		if(count($data)>0){

			$flag=0;

			for($j=0;$j<count($data);$j++){

				 $q = "update `coupan` set status=0 where id=".$data[$j];

				 if(mysql_query($q)){

					$flag=1;

				 }else{

					$flag=0;

				 }

			}

			if($flag==1){

				$_SESSION['succ_message']=$j.' coupan has been deactivated successfully.';

				return true;

			}else{

				$_SESSION['fail_message']='Unable to set status of coupan in the list.';

				return false;

			}

		}else{

			$_SESSION['fail_message']='Please select at least one coupan to deactivate.';

			return false;

		}

    }

	

	public function activateCoupan($data)

    {

	   if(count($data)>0){

			$flag=0;

			for($j=0;$j<count($data);$j++){

				$q = "update `coupan` set status=1 where id=".$data[$j];

				 if(mysql_query($q)){

					$flag=1;

				 }else{

					$flag=0;

				 }

			}
 
			if($flag==1){

				$_SESSION['succ_message']=$j.' coupan has been activated successfully.';

				return true;

			}else{

				$_SESSION['fail_message']='Unable to set status of coupan in the list.';

				return false;

			}

		}else{

			$_SESSION['fail_message']='Please select at least one coupan to activate.';

			return false;

		}

    }
	
	
	
	
}


