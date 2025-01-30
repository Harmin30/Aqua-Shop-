<?php
include('functions/userfunctions.php');
include('includes/header.php');

include('authenticate.php');

if(isset($_GET['t']))
{
    $tracking_no=$_GET['t'];
    $orderData=checkTrakingNoValid($tracking_no);
    if(mysqli_num_rows($orderData) < 0)
    {
        ?>
            <h3>Something went wrong T</h3>
        <?php
        die();
    }

}
else 
{
    ?>
        <h3>Something went wrong</h3>
    <?php
    die();
}

$data=mysqli_fetch_array($orderData);
?>
<div class="py-5">
    <div class="container">
        <div class="">
            <div class="col-md-12">               
                <div class="card bg-transparent">
                    <div class="card-header">                      
                        <h2>
                            View Order
                            <a href="my-orders.php" class="btn btn-warning float-end"><i class="fa fa-reply"></i>Back</a>
                        </h2>
                        
                    </div>
                    <div class="card-body">
                        <div class="row"> 
                            <div class="col-md-6">
                                <h4>Delivery Details</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <label class="fw-bold">Name</label>
                                        <div class="border p-1">
                                            <?=$data['name']?>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="fw-bold" class="fw-bold">Email</label>
                                        <div class="border p-1">
                                            <?=$data['email']?>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="fw-bold">Phone No</label>
                                        <div class="border p-1">
                                            <?=$data['phone']?>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="fw-bold">Tracking No.</label>
                                        <div class="border p-1">
                                            <?=$data['tracking_no']?>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="fw-bold">Address</label>
                                        <div class="border p-1">
                                            <?=$data['address']?>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="fw-bold">Pincode</label>
                                        <div class="border p-1">
                                            <?=$data['pincode']?>
                                        </div>
                                    </div>

                                </div>
                            </div>                           
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <hr>
                                <table class="table" style="color:white;">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                                                                                 
                                        <?php
                                            $userId= $_SESSION['auth_user']['user_id'];
                                            $order_query= "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*,oi.qty as orderqty, p.* FROM res_order_master o,res_order_items_master oi,
                                                products p WHERE o.user_id='$userId' AND oi.order_id=o.id AND p.id=oi.prod_id
                                                AND o.tracking_no='$tracking_no' ";
                                            $order_query_run = mysqli_query($con,$order_query);

                                            if (mysqli_num_rows($order_query_run)>0)
                                            {
                                                foreach ($order_query_run as $items)
                                                {
                                                    ?>
                                                    <tr>
                                                        <td class="align-middle">
                                                            <img src="uploads/<?=$items['image']?>" width="50px" height="50px" alt="<?=$items['pname']?>" >
                                                            <?=$items['pname']?>
                                                        </td>
                                                        <td class="align-middle">
                                                            <?=$items['price']?>
                                                        </td>
                                                        <td class="align-middle">
                                                            <?=$items['orderqty']?>
                                                        </td>
                                                    </tr> 
                                                    <?php
                                                    
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <hr>
                                <h2>Total Price : <span class="float-end fw-bold"><?=$data['total_price'];?></span></h3>
                                <hr>
                                <label class="fw-bold">Payment Mode: </label>
                                <div class="border p-1 mb-3">                                  
                                    <?=$data['payment_mode'];?>   
                                </div>

                                <label class="fw-bold">Order Status: </label>
                                <div class="border p-1 mb-3">                                  
                                    <?php 
                                        if ($data['status'] == 0) 
                                        {
                                            echo "under Process";
                                        } 
                                        elseif ($data['status'] == 1) 
                                        {
                                            echo "Completed";
                                        }
                                        elseif ($data['status'] == 2) 
                                        {
                                            echo "Cancelled";
                                        }

                                    ?>   
                                </div>
                            </div>                                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end about -->
<?php include('includes/footer.php'); ?>