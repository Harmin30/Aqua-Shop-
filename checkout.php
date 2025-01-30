<?php
include('functions/userfunctions.php');
include('includes/header.php');

include('authenticate.php');

?>
<div class="py-5">
    <div class="container">
        <div class="bg-transparent">
            <div class="card-body">
                <form action="functions/placeorder.php" method="POST">
                    <div class="row">
                        <div class="col-md-7">
                            <h5> Basic Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Name</label>
                                    <input type="text" required name="name" placeholder="Enter your full name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">E-mail</label>
                                    <input type="email" required name="email" placeholder="Enter your email" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Phone</label>
                                    <input type="number" required  name="phone" placeholder="Enter your phone Number" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Pin Code</label>
                                    <input type="number" required  name="pincode" placeholder="Enter your pin code" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Address</label>
                                    <textarea name="address" required class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-5">
                                <h5>Order Details</h5>
                                <hr>                           
                                    <?php $items = getCartItems();
                                    $totalPrice = 0;
                                    foreach ($items as $citem) {
                                    ?>
                                        <div class="mb-1 border">
                                            <div class="row align-items-center">
                                                <div class="col-md-2">
                                                    <img src="uploads/<?= $citem['image'] ?>" alt="Image" class="60px">
                                                </div>
                                                <div class="col-md-5">
                                                    <label><?= $citem['pname'] ?></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Rs <?= $citem['selling_price'] ?></label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>x<?= $citem['prod_qty'] ?></label>
                                                </div>

                                            </div>
                                        </div>
                                    <?php
                                    $totalPrice += $citem['selling_price'] * $citem['prod_qty'];

                            }
                            ?>
                            <hr>
                            <h5>Total price : <span class="float-right fw-bold">Rs <?=$totalPrice?></span> </h5>
                            <div class="">
                                <input type="hidden" name="payment_mode" value="COD">
                                <button type="submit" name="placeOrderBtn" class="btn btn-primary w-100">Confirm and Place order | COD</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- end about -->
<?php include('includes/footer.php'); ?>

<!-- Replace the "test" client-id value with your client-id -->
<!-- <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script> -->