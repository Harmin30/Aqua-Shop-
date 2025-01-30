<?php 
session_start();
include('includes/header.php');
if (isset($_SESSION['auth']))
{
    $_SESSION['message'] = "You are alredy Logged in ";
    header('Location: index.php');
    exit();
}


?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php   
                if(isset($_SESSION['message']))
                {
                    ?>
                     <div class="alert alert-dismissible alert-info" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Hey!</strong> <?= $_SESSION['message']; ?>. 
                    </div>
                    <?php
                    unset($_SESSION['message']);
                }
                ?>    
                <div class="card bg-transparent">
                    <div class="card-header">
                        <h4>Login Form</h4>
                    </div>
                    <div class="card-body">
                    <form action="functions/authcode.php" method="POST">
    
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email</label>
                            <input type="email" required name="cemail" class="form-control" placeholder="Enter Email" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Enter Password</label>
                            <input type="password" name="cpassword" class="form-control"  placeholder="Enter Password" id="exampleInputPassword1">
                        </div>
                       
                        <button type="submit" name="login_btn" class="btn btn-outline-primary">login</button>
                        
                        <a href="index.php" class="btn btn-outline-danger float-end">Back</a>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
    

<?php include('includes/footer.php');?>

   