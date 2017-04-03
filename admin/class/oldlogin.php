<?php
class login
{
    public $messageCode;
	public function adminLogin($post)
	{
            
                 
            
	   	if($this->validateAdminLogin($post))
		{
			if($this->setAdminLogin($post))
			{			
			echo'<script>window.location.href="dashboard.php"</script>';
			}
			else
			{
				return false;
			}

		}
		else
		{
			return false;
		}
	}

	public function validateAdminLogin($post)
	{
		if(empty($post['username']))
		{
			$this->messageCode=1;
			return false;
		}
		if(empty($post['password']))
		{
			$this->messageCode=2;
			return false;
		}
		return true;
	}

	public function setAdminLogin($post)
	{
          
          
            
		$strsqlAdmin = "select id from tbl_admin where (username='".mysql_real_escape_string($post['username'])."' or email='".mysql_real_escape_string($post['username'])."') and password='".mysql_real_escape_string($post['password'])."' ";
		$resultAdmin = mysql_query($strsqlAdmin);
		if(mysql_num_rows($resultAdmin)>=1)
		{
			$infoAdmin = mysql_fetch_assoc($resultAdmin);
			if($this->setAdminSession($infoAdmin['id']))
			{
				return true;
			}
			else
			{
				$_SESSION['admin']['message']='There is an error during process your request. Please try again.';
				return false;
			}
		}
		else
		{
			$this->messageCode=3;
			return false;
		}
	}

	public function setAdminSession($userId)
	{
		$strsqlAdmin = "select * from tbl_admin where id=".$userId;
		$resultAdmin = mysql_query($strsqlAdmin);
		if(mysql_num_rows($resultAdmin)>=1)
		{
		
			$infoAdmin = mysql_fetch_assoc($resultAdmin);
			$_SESSION['admin']=$infoAdmin;
			return true;
		}
		else
		{
			return false;
		}
	}

	public function setAdminLogout()
	{
		$_SESSION['admin']=array();
		unset($_SESSION['admin']);
		header('location:index.php');
	}

	public function checkLoggedUser()
	{
		if(isset($_SESSION['admin']['id']))
		{
			
		}
		else
		{
			header('location:index.php');
		}

	}
	//change pass
	public function changePassword($post,$userId){
		
		$check=mysql_query("select * from tbl_admin where username='".$_SESSION['admin']['username']."' and password='".$post['old_pwd']."' ")or die(mysql_error());
		$num=mysql_num_rows($check);
		if($num >0){
		$upd=mysql_query("update tbl_admin set password='".$post['pwd']."' where username='".$_SESSION['admin']['username']."' ")or die(mysql_error());
			if($upd)
			{
			$_SESSION['succ_message']="Your Password has been changed!";	
			}
						
		}
		else{
			
		$_SESSION['fail_message']="Your old Password was invalid!";
		}
		
		
		
		
	}
	public function validatePassword($data)
	{
	    if(empty($data['oldpassword']))
		{
		   echo "3#Please enter your current password";
		   return false;
		}
		$query="select * from tbl_admin where password='".$data['oldpassword']."' and id='".$data['id']."' ";
		$dataSet=mysql_query($query);
		if(mysql_num_rows($dataSet)!==1)
		{
		  echo "0#You have enterd incorrect current password";
		  return false;
		}
		else
		{
		  echo "1#correct current password";
		  return false;
		}
	}
	
	
	public function printMessage()
	{
	  switch($this->messageCode)
	  {
	    case 1:
			$this->message="Please Enter Your Username";
		break;
		
		case 2:
			$this->message="Please Enter Your Password";
		break;
		
		case 3:
			$this->message="Please Enter Valid Username and Password";
		break;
		
		default:
			$this->message='';
	  }
	  return $this->message; 
	}
	
	
}
?>