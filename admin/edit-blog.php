<?php
include('../middleware/adminmiddleware.php');
include('../config/dbcon.php');
include('includes/header.php');

?>


<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h4>Edit Blog:</h4>
            <a href="manage-blog.php" class="btn btn-primary btn-sm float-end">Back</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="../functions/handlblogs.php" method="POST">
                        <?php
                        
                        if (isset($_GET['id']))
                        {
                            $post_id= $_GET['id'];
                            $query = "SELECT * FROM post_blog WHERE id='$post_id' ";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) 
                            {
                                foreach ($query_run as $row) 
                                {
                                 ?>  
                                    <input type="hidden" name="id" value="<?=$row['id']?>">  
                                                               
                                    <div class="row">                                                                             
                                        <div class="col-md-12">
                                            <label class="mb-0">Title</label>
                                            <input type="text" required name="blog_title" placeholder="blog title" value="<?=$row['blog_title']?>" class="form-control mb-2">
                                        </div>
                                    
                                        <div class="col-md-12">
                                            <label class="mb-0">Blog data</label>
                                            <textarea rows="10" required name="blog_body"  placeholder="blog data" class="form-control mb-2" ><?=$row['blog_body'] ?></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-0">Posted By</label>
                                            <input type="text" required name="uploaders_name" placeholder="Enter Uploaders Name" value="<?=$row['uploaders_name']?>" class="form-control mb-2">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-0">Blog date</label>
                                            <input type="date" required name="post_date" placeholder="Enter Blog date" value="<?=$row['post_date']?>" class="form-control mb-2">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-0">Post month</label>
                                            <input type="text" required name="post_month" placeholder="Enter Blog month" value="<?=$row['post_month']?>" class="form-control mb-2">
                                        </div>
                                        <!-- <div class="col-md-12">
                                            <label class="mb-0">Upload Image</label>
                                            <input type="file" required name="blog_image" class="form-control mb-2">
                                        </div> -->
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
                            <button type="submit" name="update_blog_btn" class="btn btn-primary">Update</button>                                                   
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


<?php include('includes/footer.php'); ?>