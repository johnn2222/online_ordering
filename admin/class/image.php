<?php
class image
{
  public function getAllProductImages($productId)
  {
        $strsqlViewImage="select * from  tbl_product_image where product_id='$productId' ";
        $resultViewImage = mysql_query($strsqlViewImage);
        $imageList = array();
        while($infoViewImage=mysql_fetch_assoc($resultViewImage))
        {			
                $imageList[]=$infoViewImage;			
        }
        return $imageList;
  }
  
  public function getAllSellProductImages($productId)
  {
        $strsqlViewImage="select * from  tbl_sell_product_image where product_id=$productId";
        $resultViewImage = mysql_query($strsqlViewImage);
        $imageList = array();
        while($infoViewImage=mysql_fetch_assoc($resultViewImage))
        {			
                $imageList[]=$infoViewImage;			
        }
        return $imageList;
  }
 
  public function deletePrdImg($id,$prd_id)
  {
        $image=$this->getProdImageName($id);
      $strsqlViewImage="delete from  tbl_product_image where id='$id' and dealer_id='".$_SESSION['administrator']['dealer']['dealer_id']."' ";
	
        $resultViewImage = mysql_query($strsqlViewImage);		
		$msg='';
		if($resultViewImage)
		{
		    unlink($_SERVER['DOCUMENT_ROOT']."/clients/new-car1000/dealer/repository/".$prd_id."/".$image['image_name']);
		    $msg['error']= "1#Product image deleted";
		}
		else
		{
			$msg['error']="2#Unable to delete product image";
		}
		echo json_encode($msg);
   }
   
     public function deletePrdImgAll($id,$prd_id)
  	{		
		$idExp = explode(",",$id);
		$msg=array();
		$c=1;
			for($i=0;$i<count($idExp);$i++)
			{
				$image=$this->getProdImageName2($idExp[$i]);						
				$strsqlViewImage="delete from  tbl_product_image where id='".$idExp[$i]."' and dealer_id='".$_SESSION['administrator']['dealer']['dealer_id']."' ";
				$resultViewImage = mysql_query($strsqlViewImage);			
				if($resultViewImage)
				{
					unlink($_SERVER['DOCUMENT_ROOT']."/clients/new-car1000/dealer/repository/".$prd_id."/".$image);
					$msg['error']=$c++."#Product image deleted";
				}
				else
				{
					$msg['error']=$c++."#Unable to delete product image";
				}
			}
		echo json_encode($msg);
   }
   
   
   public function delSellProdImage($id)
  {
        $image=$this->getSellProdImageName($id);
        $strsqlViewImage="delete from  tbl_sell_product_image where id=$id";
        $resultViewImage = mysql_query($strsqlViewImage);		
		
		if($resultViewImage)
		{
		    //unlink(SELL_IMAGE_ROOT.$image['image_name']);
		    echo '1#Product image deleted';
		}
		else
		{
			echo '2#Unable to delete product image';
		}
   }
   
   public function getProdImageName($id)
   {
    	$query="select * from tbl_product_image where id=$id";
		$dataSet=mysql_query($query);
		$imageName=mysql_fetch_assoc($dataSet);
		return $imageName;
   }
   
      
   public function getProdImageName2($id)
   {
    $query="select * from tbl_product_image where id='$id' ";		
		$dataSet=mysql_query($query);
		$imageName=mysql_fetch_assoc($dataSet);
		return $imageName['image_name'];
   }
   
   public function getSellProdImageName($id)
   {
    	$query="select * from tbl_sell_product_image where id=$id";
		$dataSet=mysql_query($query);
		$imageName=mysql_fetch_assoc($dataSet);
		return $imageName;
   }
   
   
   public function SetFrontImg($data)
	{
		
		$q = "select * from tbl_product_image where display_top=1 and product_id=" . $data['productid'] . " ";
		$r = mysql_query($q);
		$resold=mysql_fetch_object($r);		
		$num=mysql_fetch_row($r);
		
		if($num==0)
		{	$msg=array();	
			$sel=mysql_query("select * from tbl_product_image where id='".$data['id']."' and display_top=1 ");
			$selNum=mysql_num_rows($sel);
			if($selNum==0)
			{				
				$upd="update tbl_product_image set display_top=1 where id='".$data['id']."' and product_id='".$data['productid']."' ";
				$updre=mysql_query($upd);
					if($updre)
					{							
						$delold=mysql_query("update tbl_product_image set display_top=0 where id='".$resold->id."' ");										
					}
					
					$msg['error']="1 image set to front!";
			}
			else{				
			$msg['error']="this image already set in Front!";	
			
			}			
			
		echo json_encode($msg);				
		}
		
		

	}
	
	 public function SetBackImg($data)
		{
		$q = "select * from tbl_product_image where display_back=1 and product_id=" . $data['productid'] . " ";
		$r = mysql_query($q);
		$resold=mysql_fetch_object($r);		
		$num=mysql_fetch_row($r);
		
		if($num==0)
		{	$msg=array();	
			$sel=mysql_query("select * from tbl_product_image where id='".$data['id']."' and display_back=1 ");
			$selNum=mysql_num_rows($sel);
			if($selNum==0)
			{				
				$upd="update tbl_product_image set display_back=1 where id='".$data['id']."' and product_id='".$data['productid']."' ";
				$updre=mysql_query($upd);
					if($updre)
					{							
						$delold=mysql_query("update tbl_product_image set display_back=0 where id='".$resold->id."' ");										
					}
					
					$msg['error']="1 image set to back!";
			}
			else{				
			$msg['error']="this image already set in Back!";	
			
			}			
			
		echo json_encode($msg);				
		}
		
		
	

	}




	
   
}
?>