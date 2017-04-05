<?php
class utils{



	public function getFoodCat()

	{

		$val=array();

		$qry=mysql_query("select * from tbl_category where status=1;");

		while($res=mysql_fetch_object($qry))

		{

		$val[]=$res;	

		}

	

	return $val;

		

	}

	

	public function getFoodItemByCat($id)

	{

		$val=array();

		$qry=mysql_query("select * from tbl_product where category='$id' and status=1")or die(mysql_error());

		while($res=mysql_fetch_object($qry))

		{

		$val[]=$res;	

		}

		return $val;

	}

	

	public function countItemByCat($id)

	{

		

	$qry=mysql_query("select count(*) as item_count from tbl_product where category='$id' and status=1")or die(mysql_error());

		$res=mysql_fetch_object($qry);

		return $res->item_count;

		

	}

	

	public function getSearchItem($key)

	{

		if($key!="")

		{			

			$itemVal=array();

			$catQry=mysql_query("select * from tbl_category where category='$key' ")or die(mysql_error());

				$catNum=mysql_num_rows($catQry);

			if($catNum==0)

			{			

				$qry=mysql_query("select * from tbl_product where name like '%".$key."%' limit 0,50 ")or die(mysql_error());		

				while($item=mysql_fetch_object($qry))

				{

					$itemVal[]=$item;

					

				}	

				}

			else{

					while($cat=mysql_fetch_object($catQry))

					{						

						$itemVal=array();

						$item2=mysql_query("select * from tbl_product where category='".$cat->id."' limit 0,50 ")

						or die(mysql_error());

						while($items=mysql_fetch_object($item2))

						{

							$itemVal[]=$items;

							

						}

					}

				}

				

			echo json_encode($itemVal);

		}

	}

	

	

	

	public function addCart($id,$spl,$qty,$addonIds)
	{	
			//session_destroy();
		//addon id expl
		//addon here//
		if($addonIds!="")
		{
			$explAddon=explode(',',$addonIds);
			//end
			$addonItem=array();
			
			if(is_array($explAddon))
			{
							
			$sql=mysql_query("SELECT addon_list.*, addon.prd_id,addon.addon_id
			from addon 
			left join addon_list on addon_list.id=addon.addon_id
			where addon.addon_id in (".$addonIds.")")or die(mysql_error());
			}
			else{
				
			$sql=mysql_query("SELECT addon_list.*, addon.prd_id,addon.addon_id
			from addon 
			left join addon_list on addon_list.id=addon.addon_id
			where addon.addon_id=".$addonIds." ")or die(mysql_error());	
			}
			
			while($resAddon=mysql_fetch_object($sql))
			{
				$addonItem[]=$resAddon;
			}
		
			$foundAddon=false;
			for($j=0;$j<count($_SESSION['addOns']);$j++)
			{
					//if(!in_array($_SESSION['addOns'][$j],$explAddon))
				if(is_array($explAddon))
				{
					for($j=0;$j<count($addonIds);$j++){
						if($_SESSION['addOns'][$j]['addon_id']==$addonIds[$j])
						{					
						$foundAddon=true;
						$add=array(
						'addon_id'=>$_SESSION['addOns'][$j]['addon_id'],
						'addon_name'=>$_SESSION['addOns'][$j]['addon_name'],
						'addon_price'=>$_SESSION['addOns'][$j]['addon_price'],
						'prd_id'=>$_SESSION['addOns'][$j]['prd_id']
							);	
						$_SESSION['addOns'][$j]=$add;	
						}
					}
				}
				else{
					if($_SESSION['addOns'][$j]['addon_id']==$addonIds)
						{					
						$foundAddon=true;
						$add=array(
						'addon_id'=>$_SESSION['addOns'][$j]['addon_id'],
						'addon_name'=>$_SESSION['addOns'][$j]['addon_name'],
						'addon_price'=>$_SESSION['addOns'][$j]['addon_price'],
						'prd_id'=>$_SESSION['addOns'][$j]['prd_id']
							);	
						$_SESSION['addOns'][$j]=$add;	
						}
					
					}
			}
		
			
		if($foundAddon==false)
		{
			foreach($addonItem as $addons){
			$_SESSION['addOns'][]=array('addon_id'=>$addons->id,'addon_name'=>$addons->addon_name,'addon_price'=>$addons->addon_price,'prd_id'=>$addons->prd_id);						
			}
		
		}
	}
		//end addon //
			
			
			//cart 
		
		$result=array();
		$qry=mysql_query("select * from tbl_product where id='$id'")or die(mysql_error());

		$res=mysql_fetch_object($qry);
                $item=array(

					'id'=>$res->id,

					'name'=>$res->name,

					 'price'=>$res->price,
					
					 'des'=>$res->description,

					 'image'=>$res->image,

					  'discount'=>$res->discount,

					 'qty'=>$qty,

					 'spl'=>$spl
					

				);		

			

			$found=false;

				for($i=0;$i<count($_SESSION['CartItem']);$i++)

				{

					if($_SESSION['CartItem'][$i]['id']==$id)
					{

						$found=true;
									

					$cart=array(

							'id'=>$_SESSION['CartItem'][$i]['id'],

							'name'=>$_SESSION['CartItem'][$i]['name'],

							 'price'=>$_SESSION['CartItem'][$i]['price'],

							 'des'=>$_SESSION['CartItem'][$i]['des'],
							  'image'=>$_SESSION['CartItem'][$i]['image'],

							 'discount'=>$_SESSION['CartItem'][$i]['discount'],

							 'qty'=>$qty,

							 'spl'=>$spl			

						);	

						$_SESSION['CartItem'][$i]=$cart;	

					}

									

										

				}								

			

		if($found==false)
		{
			$_SESSION['CartItem'][]=$item;		
		
		}		
		if(isset($_SESSION['CartItem']))
		{
                $result['data']=$_SESSION['CartItem'];
                $result['addOns']=$_SESSION['addOns'];
		$result['res']=1;	
		}
		echo json_encode($result);			

	
	}

	

	

	public function updateCart($id,$spl,$qty)
	{

                        $res=array();
                        $defaultData=array();
			$found=false;
                        
				for($i=0;$i<count($_SESSION['CartItem']);$i++)
				{

					if($_SESSION['CartItem'][$i]['id']==$id)
					{

						$found=true;

														

					$cart=array(

							'id'=>$_SESSION['CartItem'][$i]['id'],

							'name'=>$_SESSION['CartItem'][$i]['name'],

							 'price'=>$_SESSION['CartItem'][$i]['price'],

							 'des'=>$_SESSION['CartItem'][$i]['des'],
							 'image'=>$_SESSION['CartItem'][$i]['image'],
							 'discount'=>$_SESSION['CartItem'][$i]['discount'],
							 'qty'=>$qty,
							 'spl'=>$spl			

						);	

						$_SESSION['CartItem'][$i]=$cart;
                                              
						
					}			

				}								
                          $res['data']=$_SESSION['CartItem'];
                          $res['addOns']=$_SESSION['addOns'];
                          $res['res']=1;
			echo json_encode($res);

	}

	

	public function removeCartItem($id)
	{
		//echo $id;
                $result=array();
		if(isset($_SESSION['CartItem']))
		{
                    

		$newCart=array();

		foreach($_SESSION['CartItem'] as $cartItem)
		{

			//print_r($cartItem);

			

					if($cartItem['id']!=$id)

					{

						$newCart[]=$cartItem;

						//unset($_SESSION['CartItem'][$id]);

					}				

										

			}

		}

			$_SESSION['CartItem']=$newCart;
                        $result['data']=$_SESSION['CartItem'];
                        $result['res']=1;
                    echo json_encode($result);    

			

	}

	

	///get mile from geo by address

	//remove addon
	public function removeAddon($id)
	{	
                 $result=array();
		if(isset($_SESSION['addOns']))
		{
		$newCart=array();
			foreach($_SESSION['addOns'] as $addon)
			{
				if($addon['addon_id']!=$id)
				{
					$newCart[]=$addon;
		
				}

					

			}

		}

			$_SESSION['addOns']=$newCart;		
                        $result['data']=$_SESSION['CartItem'];
                        $result['data']['addOns']=$newCart;
                        $result['res']=1;
                           echo json_encode($result); 
	}
	//end

	

	public function getDistance($addressTo,$unit){ 

			 //echo"<pre>";print_r($addressTo."-".$unit);

			//Change address format

			$formattedAddrFrom = str_replace(' ','+','236 South Street Philadelphia, PA United States');

			$formattedAddrTo = str_replace(' ','+',$addressTo);

			

			//Send request and receive json data

		   $geocodeFrom = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false');

			$outputFrom = json_decode($geocodeFrom);

			$geocodeTo = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false');

			$outputTo = json_decode($geocodeTo);

			//Get latitude and longitude from geo data

			$latitudeFrom = $outputFrom->results[0]->geometry->location->lat;

			$longitudeFrom = $outputFrom->results[0]->geometry->location->lng;

			$latitudeTo = $outputTo->results[0]->geometry->location->lat;

			$longitudeTo = $outputTo->results[0]->geometry->location->lng;

			

			//Calculate distance from latitude and longitude

			$theta = $longitudeFrom - $longitudeTo;

			$dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));

			$dist = acos($dist);

			$dist = rad2deg($dist);

			$miles = $dist * 60 * 1.1515;

			$unit = strtoupper($unit);

			if ($unit == "K") {

					$DisTance =$miles * 1.609344;

					

					if($DisTance<=3)
					{

							if($DisTance >2 && $DisTance<=3)

							{

								$_SESSION['utils']['dlv_charge']=3.50;	
								$arr['dlv_charge']="$3.50";	

							}

							elseif($DisTance >=1 && $DisTance<=2)

							{

								$_SESSION['utils']['dlv_charge']=2.50;	
								$arr['dlv_charge']="$2.50";

							}

							
							else{

								$_SESSION['utils']['dlv_charge']=0;	
								$arr['dlv_charge']="free";

							}

							

					}

									//$arr['distance']=($miles * 1.609344).' km';

				$arr['distance']=(round($miles * 1.609344));

			} else if ($unit == "N") {

				$arr['distance']= ($miles * 0.8684).' nm';

			} else {

				$arr['distance'] = $miles.' mi';

			}
				
				if($DisTance >3)
				{					

				$arr['msg']='We can not deliver your order at the current location';
				$arr['Sts']=0;
				$arr['deliverySt']=0;	

				}
				else 
				{
				$arr['msg']='We can deliver your order at the current location.';
				$arr['Sts']=1;
				}

				
			echo json_encode($arr);

		}

	

	

	

	//coupan validation

			public function coupanValidate($code,$subTotal)

			{		$msg='';

			

			$sbtl = round($subTotal);

			$chekCoupan=mysql_query("select * from order_history where coupan_code='$code' ");

			$CoupNum=mysql_num_rows($chekCoupan);

			if($CoupNum>0)

			{

				$msg['RepeatCoupan']=1;	

			}
			else{							

					$qry="select * from coupan where coupan_code='$code' and status=1 ";

					$sql=mysql_query($qry)or die(mysql_error());

					$res=mysql_fetch_assoc($sql);

					

					if(is_array($res))

					{

						//echo "coup".$res['coupan_amt']."sub".$sbtl;			
						$msg['RepeatCoupan']='';
						if($res['coupan_amt']>=$sbtl)

						{

						$msg['CoupanMsg']=3;

						}

						else{
							
					$_SESSION['utils']['applied_coupan']=$res['coupan_amt'];

					$_SESSION['utils']['coupan_code']=$code;


							$msg['CoupanMsg']=1;	

							$msg['coupan_amt']=$res['coupan_amt'];

							

							}

					}

					else{

					$msg['CoupanMsg']=0;				

					}

			}

			echo json_encode($msg);

			

		}

	//end

	public function insetOrder($data,$nowltrSts)

	{
	$ord_no=rand(99999,10000);
	$data['order_no']="T".$ord_no;
			
	//mail to users
	$this->MailToUser($data, $nowltrSts);
	//end
	
	//mail to clients
	$this->MailToClients($data, $nowltrSts);
	//end

		

	$dbkey='';

	$dbval='';

		if($nowltrSts=="now" && $nowltrSts!="")

		{

		$data['now']=date('y-m-d h:i:s A',time());	

		}

	

	

	$newDate =date('y-m-d h:i:s A',time());

	$data['order_date']=$newDate;

		foreach($data as $key=>$val)

		{

			$dbkey.= $key . ",";

			

			$dbval.= "'". mysql_real_escape_string($val) . "',";

				

			//$qry="INSERT into '".$tbl."' () ";

			

		}

		$keys='('.substr($dbkey,0,-1).')';	

		$values=' VALUES('.substr($dbval,0,-1).')';

		 $qry="INSERT INTO `order_history` {$keys} {$values}";

		$insert=mysql_query($qry)or die(mysql_error());

		$insert_id=mysql_insert_id();
		if(isset($_SESSION['CartItem'])){
			foreach($_SESSION['CartItem'] as $cart)
			{
				
			
					
			$sql=mysql_query("insert into order_items set order_id='$insert_id',prd_id='".$cart['id']."',item_name='".$cart['name']."',price='".$cart['price']."',qty='".$cart['qty']."',special_instruction='".$cart['spl']."' ")or die(mysql_error());
					
				
			}
		}
		
		
			
			if($insert)
			{	
				$res['res']=1;
								
			}
			else
			{
				$res['res']=0;	
			}
		echo json_encode($res);
	}

	

	public function MailToUser($data, $nowltrSts)
	{

			$msg='';		

			$to=$data['email'];

		 	$subject=$data['order_status'];

			//$ordDate = strtotime($data['order_date']);

			$NewDate = date('y-m-d h:i:s A',time());

			$msg.= '<html>

		<body> 
		
		<p>Thank <strong>'.$data['name'].'</strong> for ordered with Us.</p>

		<p>Your order no is ('.$data['order_no'].')</p>


		<table width="620px" border="1px solid black" cellpadding="4" cellspacing="0">

		<caption><strong>Lovash Indian Restaurant</strong> | <strong>order status:</strong>'.$data['order_status'].' | <strong>Order DateTime:</strong> '.$NewDate.'</caption>';	

		if($data['order_status']=="delivery")

		{

		$msg.='<tr><td colspan="4">Your Order will be reach in next 60 minute</td></tr>';

		}

		elseif($data['order_status']=="pickup" && $nowltrSts=="now")

		{

		$msg.='<tr><td colspan="4">Your Pickup will be ready in next 25 minute</td></tr>';

		}

		elseif($data['order_status']=="pickup" && $nowltrSts=="later"){

			$msg.='<tr><td colspan="4">Your Pickup will be ready acording to you custome time('.$data['custome_time'].')</td></tr>';	

		}

	

		

		$msg.='

		<tr>

		<th align="center">item(s)</th>

		<th align="center">qty</th>

		<th align="center">price</th>		

		<th align="center">sub total</th>

		</tr>';
		if(isset($_SESSION['CartItem']))
		{
			foreach($_SESSION['CartItem'] as $cartItem)

			{

		$msg.='

		<tr>

<td align="center">'.$cartItem['name'].'<br>(<font style="font-size:11px color:#ddd;">'.$cartItem['spl'].')</font><br>';
		 
		 		
		$msg.='</td>

		<td align="center">'.$cartItem['qty'].'</td>

		<td align="center">$ '.$cartItem['price'].'</td>

		<td align="center">$ '.$cartItem['qty']*$cartItem['price'].'</td>

		</tr>';

			}
		}
		$msg.='	

		<tr>

		<td colspan="2"><strong>Addons</strong>:';
		
		if(!empty($_SESSION['addOns'])){
			 $addonTotal='';
			 foreach($_SESSION['addOns'] as $addonItem){
				
					 $addonTotal+=$addonItem['addon_price'];
             $msg.='<small>'.$addonItem['addon_name']."  $".$addonItem['addon_price'].'</small>';
          		  
			 	
				 } 
			}
	
		
		$msg.='</td>

		<td colspan="2">
		
		<strong>Addons:  </strong> + $ '.$addonTotal.'<br>
		
		<strong>Sub total:  </strong> $ '.$data['sub_total'].'<br>

		<strong>Tip:  </strong> + $ '.$data['tip'].'<br>';
		


		$msg.='

		<strong>Discount:  </strong> - $'.$data['discount'].'<br>
		';
	
		if($data['coupan_discount']!=""){
		$msg.='<strong>Coupan Discount:  </strong> - $'.$data['coupan_discount'].'.<br>';
		}else{
			$msg.='<strong>Coupan Discount:  </strong> - $0<br>';
		}
	
		$msg.='<strong>Tax:  </strong> + $'.$data['tax'].'<br>

		<strong>Grand Total:  </strong>$'.$data['total_amount'].'<br>

		</td>		

		</tr>

		</table>

		</body>

		</html>';

		

		$from='sales@a2zwebmaster.com';

		$headers = "From: $from"."\r\n";

		$headers .= 'Content-type: text/html;';

		$mail = @mail($to,$subject,$msg,$headers);

		

		return $mail;

		

	}


	public function MailToClients($data, $nowltrSts)

	{

			$msg='';		

			//$to="cooljohnn@rediffmail.com";
			$to="a2zwebmaster2007@gmail.com";

		 	$subject=$data['order_status'];

			//$ordDate = strtotime($data['order_date']);

			$NewDate = date('y-m-d h:i:s A',time());

			$msg.= '<html>

		<body> 

		<h1>Order For Lovash Indian Restaurant </h1>

		<p>Order no is ('.$data['order_no'].')</p>
		
		<p style="float:left;">
		<strong>Customer Information: </strong><br>
		<strong>Name: </strong>'.$data['name'].
		'<br><strong>Email: </strong>'.$data['email'].
		'<br><strong>Mobile: </strong>'.$data['mobile'].
		'<br><strong>Card No.: </strong>'.$data['creditCard'].
		'<br><strong>Exp: </strong>'.$data['expr'].
		'<br><strong>CVV: </strong>'.$data['cvv'].
		'<br/><strong>Address: </strong>'.$data['address'].'
		 </p>	
		<table width="620px"  border="1px solid black" cellpadding="4" cellspacing="0">

		<caption><strong>Lovash Indian Restaurant</strong> | <strong>order status:</strong>'.$data['order_status'].' | <strong>Order DateTime:</strong> '.$NewDate.'</caption>';

		

		if($data['order_status']=="delivery")

		{

		$msg.='<tr><td colspan="4">Your Order will be reach in next 60 minute</td></tr>';

		}

		elseif($data['order_status']=="pickup" && $nowltrSts=="now")
		{

		$msg.='<tr><td colspan="4">Your Pickup will be ready in next 25 minute</td></tr>';

		}

		elseif($data['order_status']=="pickup" && $nowltrSts=="later"){

			$msg.='<tr><td colspan="4">Your Pickup will be ready acording to you custome time('.$data['custome_time'].')</td></tr>';	

		}

	

		

		$msg.='

		<tr>

		<th align="center">item(s)</th>

		<th align="center">qty</th>

		<th align="center">price</th>		

		<th align="center">sub total</th>

		</tr>';
if(isset($_SESSION['CartItem']))
		{
			foreach($_SESSION['CartItem'] as $cartItem)

			{

		$msg.='

		<tr>

<td align="center">'.$cartItem['name'].'<br>(<font style="font-size:11px color:#ddd;">'.$cartItem['spl'].')</font><br>';
		 
		 	
		
		$msg.='</td>

		<td align="center">'.$cartItem['qty'].'</td>

		<td align="center">$ '.$cartItem['price'].'</td>

		<td align="center">$ '.$cartItem['qty']*$cartItem['price'].'</td>

		</tr>';

			}
		}
		
		$msg.='	

		<tr>

		<td colspan="2"><strong>Addons</strong>:';
		
				if(!empty($_SESSION['addOns'])){
			 $addonTotal='';
			 foreach($_SESSION['addOns'] as $addonItem){
				
					 $addonTotal+=$addonItem['addon_price'];
             $msg.='<small> '.$addonItem['addon_name']."  $".$addonItem['addon_price'].'</small>';
          		  
			 	
				 } 
			}
	

		
		$msg.='</td>

		<td colspan="2">
		
		<strong>Addons:  </strong> + $ '.$addonTotal.'<br>
		
		<strong>Sub total:  </strong> $ '.$data['sub_total'].'<br>

		<strong>Tip:  </strong> + $ '.$data['tip'].'<br>';
		


		$msg.='

		<strong>Discount:  </strong> - $'.$data['discount'].'<br>
		';
		if($data['coupan_discount']!=""){
		$msg.='<strong>Coupan Discount:  </strong> - $'.$data['coupan_discount'].'.<br>';
		}else{
			$msg.='<strong>Coupan Discount:  </strong> - $0<br>';
		}
		$msg.='<strong>Tax:  </strong> + $'.$data['tax'].'<br>

		<strong>Grand Total:  </strong>$'.$data['total_amount'].'<br>

		</td>		

		</tr>

		</table>

		</body>

		</html>';

		

		$from='sales@a2zwebmaster.com';

		$headers = "From: $from"."\r\n";

		$headers .= 'Content-type: text/html;';

		$mail = @mail($to,$subject,$msg,$headers);

		

		return $mail;

		

	}

	public function getAddonByPrdId($prdId)
	{
           
		$addons=array();
		$qry=mysql_query("SELECT addon_list.*,addon.addon_id 
		from addon 
		left join addon_list on addon_list.id=addon.addon_id
		where addon.prd_id='".$prdId."'");
                while($res=mysql_fetch_object($qry))
		{					
		$addons[]=$res;	
		}		
		echo json_encode($addons);
		
	}

	

}