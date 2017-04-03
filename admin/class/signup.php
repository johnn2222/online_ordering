<?php
class signup
{
	public function UserSignup($post,$msg=NULL){
			
		if($post){
			$digit=rand(999999,100000);
			$user_id=$post['name'].$digit;
			
			$chknum=mysql_query("select * from tbl_users where email='".$post['email']."' ");
			$num=mysql_num_rows($chknum);
				if($num>0){		
						
						$_SESSION['fail_message']='Sorry this email Id is already exist!';	
					
				}
				else{
			$qry="insert into tbl_users set name='".$post['name']."', email='".$post['email']."', postal_code='".$post['postal_code']."', phone='".$post['phone']."', password='".md5($post['pwd'])."', created=now(), dealer_id='".$user_id."' ";		
				$re=mysql_query($qry) or die(mysql_error());
					if($re){
						$_SESSION['succ_message']='Your account has been submitted for moderation by an administrator and will be activated shortly!';
						}
					else{
					$_SESSION['fail_message']='error';	
					}
				}
				
				 
			}
			

		
	}
	
}
?>