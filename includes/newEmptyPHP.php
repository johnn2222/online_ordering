<?php $i=1;

                    if(!empty($_SESSION['CartItem']))
                    {	$itemDiscount='';

                        $subTotal='';

                        $price='';

                        $qty='';

                         foreach($_SESSION['CartItem'] as $cart)

                        {?>

                        <div class="row">
                        <div class="col-xs-3">
                            <input type="hidden" name="price" value="<?=$cart['price']?>" id="cartPrice" />
                            <input type="hidden" name="spl" value="<?=$cart['spl']?>" id="Spl-<?=$cart['id']?>" />
                           <div id="orderQtyH-<?=$cart['id']?>">    

                            <div class="checkout-quantity" style="float:left;" onClick="CatQtyMinus(<?=$cart['id']?>)">

                            <i class="fa fa-minus-circle cart-item-desc" style="margin: 4px;"></i></div>               

                           <input id="sideQty-<?=$cart['id']?>" readonly="readonly" type="text" class="my-input2"  maxlength="4" autocomplete="off" value="<?=$cart['qty']?>">

                           <div class="checkout-quantity qty-asc" style="float:left;" onclick="CatQtyPlus(<?=$cart['id']?>);"><i class="fa fa-plus-circle cart-item-asc" id="CatQtyPlus" style="margin: 4px;"></i></div>

                           </div>

                    

                    </div>

             <div class="col-xs-3 checkout-item lang-item no-padding">
                 <span class="order-item-name"><?=$i.".".$cart['name']?>             
             </span>

                    <?php if($cart['spl']!=""){?>

                    <div class="col-lg-12"><small class="text-color"><em><?=$cart['spl']?></em></small></div>

                    <?php }?></div>

                      <div class="col-xs-2 checkout-price lang-price"><?="$ ".$cart['price']?></div>
						 <div class="col-xs-2 checkout-price lang-price"><?="$ ".$cart['price']*$cart['qty']?></div>

                      

                      <div class="col-xs-1 checkout-edit">

                      <a href="javascript:void();" data-target="#AddCart" data-toggle="modal" onclick="CartOpen('<?=$cart['id']?>','<?=$i?>','<?=$cart['name']?>','<?=$cart['des']?>','<?=$cart['price']?>','2');">

                      <span class="glyphicon glyphicon-edit text-danger cart-item-edit"  title="Edit" idx="0"></span>

                      </a>

                      </div>

                      <div class="col-xs-1 checkout-close">

                      <a href="javascript:void();" onclick="RemoveCartItem(<?=$cart['id']?>)"><span class="glyphicon glyphicon-remove text-danger cart-item-remove"  title="Remove"></span>

                      </a>

                      </div>

                        </div>

                        

                      <?php 

                      $itemDiscount+=$cart['discount'];

                      $subTotal+=($cart['qty']*$cart['price']);

                      

                        $i++;}

                  }else{?>