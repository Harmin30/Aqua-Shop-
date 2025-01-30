<?php
include('../middleware/adminmiddleware.php');
include('../config/dbcon.php');
include('includes/header.php');

?>


<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h4>Edit Users:</h4>
            <a href="view-users.php" class="btn btn-primary btn-sm float-end">Back</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="../functions/handleusers.php" method="POST">
                        <?php
                        if (isset($_GET['user_id'])) {
                            $user_id = $_GET['user_id'];
                            $query = "SELECT * FROM res_user_master WHERE id='$user_id' ";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) 
                            {
                                foreach ($query_run as $row) 
                                {
                        ?>
                                    <input type="hidden" name="id" value="<?=$row['id']?>">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" required name="cname" value="<?=$row['cname']?>" class="form-control" placeholder="Enter your name">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mobile No</label>
                                        <input type="number" required name="cmobile" value="<?=$row['cmobile']?>" class="form-control" placeholder="Enter your mobile number">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email address</label>
                                        <input type="email" required name="cemail" value="<?=$row['cemail']?>" class="form-control" placeholder="Enter Email" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" required name="cpassword" value="<?=$row['cpassword']?>" class="form-control" placeholder="Enter Password" id="exampleInputPassword1">
                                    </div>            
                        <?php
                                }
                            } 
                            else 
                            {
                                echo "<h4>No Records Found.!</h4>";
                            }
                        }
                        ?>

                        <div class="modal-footer">
                            <button type="submit" name="update_user_btn" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>


<?php include('includes/footer.php'); ?>