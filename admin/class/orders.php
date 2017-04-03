<?php
class orders 
{
	public function getAllOrders($page)
	{

		$startFrom = ($page - 1) * PAGE_LIMIT;		
		/*echo "select * from order_history limit ". $startFrom . "," . PAGE_LIMIT;
		die();
*/
		$qry=mysql_query("select * from order_history order by order_date desc limit ". $startFrom . "," . PAGE_LIMIT)or die(mysql_error());

		$val=array();

		while($res=mysql_fetch_object($qry))
		{
		$val[]=$res;	
		}

		//print_r($val);
		return $val;

	}
	
	public function getNewOrders(){
	$qry=mysql_query("select count(*) order_count from order_history where view_status=0")or die(mysql_error());
	$res=mysql_fetch_object($qry);
	return $res->order_count;
		
	}
	
	
	public function getCountOrders(){
	$qry=mysql_query("select count(*) order_count from order_history")or die(mysql_error());
	$res=mysql_fetch_object($qry);
	return $res->order_count;
		
	}
	
	public function updateOrderViewStatus($id)
	{
		$qry=mysql_query("update order_history set view_status=1 where id='$id' ")or die(mysql_error());
		return $qry;
	}
	
	public function GetOrderDetailsItems($orderId)
	{
		$qry=mysql_query("select * from  order_items where order_id='$orderId' ")or die(mysql_error());	
		$val=array();
		while($res=mysql_fetch_object($qry))
		{
		$val[]=$res;	
		}

		return $val;
	}
	public function GetOrderDetails($id)
	{	
		$qry=mysql_query("select * from order_history where id='$id' ")or die(mysql_error());
		$res=mysql_fetch_object($qry);
		return $res;

	}
	
	

	
}