<?php
class dealer_signup{
	
	
	public function Signup($post,$msg=NULL){
			
		if($post){
			$digit=rand(999999,100000);
			$dealer_id=$post['name'].$digit;
			
			$chknum=mysql_query("select * from tbl_dealer_admin where email='".$post['email']."' ");
			$num=mysql_num_rows($chknum);
				if($num>0){		
						
						setFlash('signup_error','Sorry this email Id is already exist!');	
					
				}
				else{
			$qry="insert into tbl_dealer_admin set name='".$post['name']."', email='".$post['email']."',postal_code='".$post['postal']."', phone='".$post['phone']."', password='".md5($post['pwd'])."', created=now(), dealer_id='".$dealer_id."' ";		
				$re=mysql_query($qry) or die(mysql_error());
					if($re){
						setFlash('signup_error','Your account has been submitted for moderation by an administrator and will be activated shortly!');
					}
					else{
					setFlash('signup_error','error');	
					}
				}
				
				 
			}
			

		
	}
	
}