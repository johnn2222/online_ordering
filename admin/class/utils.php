<?php
class utils{
	
	public function getParentCat()
	{
	$qry=mysql_query("select * from tbl_category where lable=0 and status=1")or die(mysql_error());	
	$val=array();
		while($res=mysql_fetch_object($qry))
		{
			$val[]=$res;
		}
		return $val;
	}
	
	public function getSubCat($parentId)
	{
	$qry=mysql_query("select * from tbl_category where lable='$parentId' and status=1")or die(mysql_error());	
	$val=array();
		while($res=mysql_fetch_object($qry))
		{
			$val[]=$res;
		}
		echo json_encode($val);
	}
	
		public function getSubCategory($parentId)
	{
	$qry=mysql_query("select * from tbl_category where lable='$parentId'")or die(mysql_error());	
	$val=array();
		while($res=mysql_fetch_object($qry))
		{
			$val[]=$res;
		}
		return $val;
	}
	
		public function getMake($parentId)
	{		
	$qry=mysql_query("select cat.category as cat_name, b.brand_name as make, b.id as  make_id
from tbl_category cat
left join tbl_brand b on b.category=cat.category
where cat.id='$parentId' and b.status=1")or die(mysql_error());	
	$val=array();
		while($res=mysql_fetch_object($qry))
		{
			$val[]=$res;
		}
		echo json_encode($val);
	}
	
	
	
		public function getMakeBySubCat($subcat)
	{	
	$qry=mysql_query("select cat.category as cat_name, b.brand_name as make, b.id as  make_id
from tbl_category cat
left join tbl_brand b on b.category=cat.category
where cat.id='$subcat' and b.status=1")or die(mysql_error());	
	$val=array();
		while($res=mysql_fetch_object($qry))
		{
			$val[]=$res;
		}
		echo json_encode($val);
	}
	
	
	
		public function getModel($make)
	{		
	$qry=mysql_query("select * from tbl_brand where parent_id='$make' and status=1")or die(mysql_error());	
	$val=array();
		while($res=mysql_fetch_object($qry))
		{
			$val[]=$res;
		}
		echo json_encode($val);
	}
	
	
	
	
	
	public function GetAttributeByCat($cat_id,$prd_id=NULL)
	{					
			
		$qry=mysql_query("select * from tbl_vehicle_details where category_id='$cat_id' and status=1")or die(mysql_error());	
		$val=array();
		while($res=mysql_fetch_object($qry))
		{
			$val[]=$res;
		}
			$attributes='';
			foreach($val as $attr)
			{
				$attributes.= $this->createAttrObj($attr->attribute_name, $attr->attribute_type, $attr->attribute_value, $attr->attribute_mandatory,$prd_id);
				
			}
			echo $attributes;
		
	}
	
	public function createAttrObj($attr_name,$attr_type,$attr_val,$req,$prd_id)
	{				
			$req_field=($req==1)?'<span>*</span>':'';
			$valid=($req==1)?'valid':'';
	        $input_effect='<span class="focus-border"><i></i></span>';
			$allAttr='';
			//create dropdown here
			if($attr_type=="dropdown")
			{	$allAttr.='<div class="form-group">';
                $allAttr.='<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">';
				$allAttr.='<label for="" class="control-label">'.ucwords($attr_name).$req_field.'</label>';
				$allAttr.='</div>';
				$allAttr.='<div class="col-lg-9 col-lg-push-0 col-md-10 col-sm-10 col-xs-12 mrg-t-15 nopadding">';
				$allAttr.='<select class="form-control ' . $valid.'" id="'.str_replace(" ","_",$attr_name).'" name="info['.str_replace(" ","_",$attr_name).']">';
					$opt=explode(",",$attr_val);					
					
					if(!empty($this->getObjVal($attr_name,$prd_id)))					
						{											
							$updOpt=$this->getObjVal($attr_name,$prd_id);
							for($i=0;$i<count($opt);$i++)
							{
							$sel=$opt[$i]==$updOpt?"selected":"";
							$allAttr.='<option value="'.$opt[$i].'" '.$sel.' >'.$opt[$i].'</option>';	
							}
						}
						else
						{
							$allAttr.='<option value="">please select</option>';					
							for($i=0;$i<count($opt);$i++)
							{
							$allAttr.='<option value="'.$opt[$i].'">'.$opt[$i].'</option>';	
							}	
						}
				$allAttr.='</select>';	
				$allAttr.='</div></div>';
			}
			//end
			//create text box here
				if($attr_type=="textbox")
				{	
					$allAttr.='<div class="form-group">';
					$allAttr.='<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">';
					$allAttr.='<label for="" class="control-label">'.ucwords($attr_name).$req_field.'</label>';
					$allAttr.='</div>';
					$allAttr.='<div class="col-lg-9 col-lg-push-0 col-md-10 col-sm-10 col-xs-12  input-effect">';
					
					if(!empty($this->getObjVal($attr_name,$prd_id)))
						{
			$allAttr.='<input type="text" value="'.$this->getObjVal($attr_name,$prd_id).'" name="info['.str_replace(" ","_",$attr_name).']" id="'.str_replace(" ","_",$attr_name).'" class="form-control effect-21 '.$valid.' ">';
						}else{						
					$allAttr.='<input type="text" name="info['.str_replace(" ","_",$attr_name).']" id="'.str_replace(" ","_",$attr_name).'" class="form-control effect-21 '.$valid.' ">';
						}
					$allAttr.=$input_effect.'</div></div>';
				}
			//end
			
			//create textarea  here
				if($attr_type=="textarea")
				{	
					$allAttr.='<div class="form-group">';
					$allAttr.='<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">';
					$allAttr.='<label for="" class="control-label">'.ucwords($attr_name).$req_field.'</label>';
					$allAttr.='</div>';
					$allAttr.='<div class="col-lg-9 col-lg-push-0 col-md-10 col-sm-10 col-xs-12 mrg-t-15 nopadding">';
						if(!empty($this->getObjVal($attr_name,$prd_id)))
						{
						$allAttr.='<textarea name="info['.str_replace(" ","_",$attr_name).']" id="'.str_replace(" ","_",$attr_name).'"  class="form-control">'.
						$this->getObjVal($attr_name,$prd_id).'</textarea>';
						}
						else
						{
							$allAttr.='<textarea name="info['.str_replace(" ","_",$attr_name).']" id="'.str_replace(" ","_",$attr_name).'"  class="form-control"></textarea>';	
						}
					$allAttr.='</div></div>';
				}
			//end
			
			//create radio type here
				if($attr_type=="radio")
				{	
					$allAttr.='<div class="form-group">';
					$allAttr.='<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">';
					$allAttr.='<label for="" class="control-label">'.ucwords($attr_name).$req_field.'</label>';
					$allAttr.='</div>';
					$allAttr.='<div class="col-lg-9 col-lg-push-0 col-md-10 col-sm-10 col-xs-12 mrg-t-15 nopadding">';					
						$opt=explode(",",$attr_val);
						for($i=0;$i<count($opt);$i++)
						{
						$allAttr.='<input type="radio" name="info['.str_replace(" ","_",$attr_name).']" class="form-control">';	
						$allAttr.=$opt[$i];	
						}
					$allAttr.='</div></div>';
				}
			//end
			
			
				//create checkbox here
				if($attr_type=="checkbox")
				{	
					$allAttr.='<div class="form-group">';
					$allAttr.='<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">';
					$allAttr.='<label for="" class="control-label">'.ucwords($attr_name).$req_field.'</label>';
					$allAttr.='</div>';
					$allAttr.='<div class="col-lg-9 col-lg-push-0 col-md-10 col-sm-10 col-xs-12 mrg-t-15 nopadding">';					
						         
					$allAttr.=' <table width="100%" border="0" cellpadding="0" cellspacing="0" class="mrg-t">';                    
                    $allAttr.='<tr>';
						$opt=explode(",",$attr_val);	
										
						//check value
						$chkd='';
						  if(!empty($this->getObjVal($attr_name,$prd_id)))
						   {
							$chkd=explode(",",$this->getObjVal($attr_name,$prd_id));
						   }
						 
						//end				
						  for($i=0;$i<count($opt);$i++)
						  {		
						 	$checked='';
						  	for($j=0;$j<count($chkd);$j++)
							{
						  	$checked.=($opt[$i]==$chkd[$j]?"checked":'');
							}
							
						   if($i % 3==0){$allAttr.='<tr></tr>';}
						   
						 		
               $allAttr.='<td><input type="checkbox" name="'.str_replace(" ","_",$attr_name)."[]".'" '.$checked.' value="'.$opt[$i].'" class="advcheckbox mrg-l-table vehicle_option"></td>';
                 $allAttr.='<td>'.$opt[$i].'</td>';        
								
                    	   
						   }  
                    $allAttr.='</tr></table>';                
					$allAttr.='</div></div>';
				}
			//end
			
			
			return $allAttr;
	}
	
	public function getObjVal($name,$prd_id)
	{
	$nameobj=str_replace(" ","_",$name);
	$qry=mysql_query("select `$nameobj` from tbl_product where id='$prd_id'");
	$res=mysql_fetch_object($qry);
	return $res->$nameobj;		
	}
	
	//get update value
	
		public function getMakeByCatOpt($parentId)
	{		
	$qry=mysql_query("select cat.category as cat_name, b.brand_name as make, b.id as  make_id
from tbl_category cat
left join tbl_brand b on b.category=cat.category
where cat.id='$parentId' and b.status=1")or die(mysql_error());	
	$val=array();
		while($res=mysql_fetch_object($qry))
		{
			$val[]=$res;
		}
		return $val;
	}
		
	
	
	
	
	
		public function getModel2($make,$select_model)
		{		
	$qry=mysql_query("select * from tbl_brand where parent_id='$make' and status=1")or die(mysql_error());	
		$opt='';
		
		while($res=mysql_fetch_object($qry))
		{	
			$sel=($res->brand_name==$select_model)?"selected":"";
			$opt.= '<option value="'.$res->brand_name.'" '.$sel.' >'.$res->brand_name.'</option>';
		}
		echo $opt;
	}
	
	
	
	
	
}