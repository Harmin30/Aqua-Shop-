<?php
include('functions/userfunctions.php');
include('includes/header.php');

include('authenticate.php');

?>
<div class="py-5">
   <div class="container">
      <div class="bg-transparent">
         <div class="row">
            <div class="col-md-12">
               <div id="mycart">
                  <?php 
                     $items = getCartItems();
                     if(mysqli_num_rows($items) > 0)
                     {
                        ?>
                        <div class="row row align-items-center">
                           <div class="col-md-5">
                              <h6>Product</h6>
                           </div>
                           <div class="col-md-3">
                              <h6>Price</h6>
                           </div>
                           <div class="col-md-2">
                              <h6>Quantity</h6>
                           </div>
                           <div class="col-md-2">
                              <h6>Action</h6>
                           </div>
                        </div>
                        <div id="">                               
                           <?php               
                              foreach ($items as $citem) 
                              {
                                 ?>
                                 <div class="card product_data bg-transparent mb-3">
                                    <div class="row align-items-center">
                                       <div class="col-md-2">
                                          <img src="uploads/<?= $citem['image'] ?>" alt="Image" class="80px">
                                       </div>
                                       <div class="col-md-3">
                                          <h5><?= $citem['pname'] ?></h5>
                                       </div>
                                       <div class="col-md-3">
                                          <h5>Rs <?= $citem['selling_price'] ?></h5>
                                       </div>
                                       <div class="col-md-2">
                                          <input type="hidden" class="prodId" value="<?= $citem['prod_id'] ?>">
                                          <div class="input-group mb-3" style="width:130px">
                                             <button class="input-group-text decrement-btn updateQty">-</button>
                                             <input type="text" class="form-control text-center input-qty bg-white" value="<?= $citem['prod_qty']?>" disabled>
                                             <button class="input-group-text increment-btn updateQty">+</button>
                                          </div>
                                       </div>
                                       <div class="col-md-2">
                                          <button class="btn btn-outline-danger btn-sm deleteItem" value="<?= $citem['cid'] ?>">
                                             <i class="fa fa-trash me-2"></i>Remove</button>
                                       </div>
                                    </div>
                                 </div>
                                 <?php
                                 
                              }
                                    
                           ?>
                        </div>
                        <div class="float-right">
                           <a href="checkout.php" class="btn btn-outline-primary">Proceed to checkout</a>
                        </div>
                        <?php
                     }
                     else 
                     {
                        ?>
                        <div class="text-center">
                           <h2 class="py-3">Your cart is empty</h2>
                        </div>
                        <?php
                     }
                  ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- end about -->
<?php include('includes/footer.php'); ?>