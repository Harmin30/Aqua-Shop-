<?php 
include('../middleware/adminmiddleware.php');
include('includes/header.php');

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Blogs:</h4>
                </div>
                <div class="card-body ">
                    <form action="code.php" method="POST"  >
                        <div class="row">  
                            <input type="hidden" name="	post_id">                                        
                            <div class="col-md-12">
                                <label class="mb-0">Title</label>
                                <input type="text" required name="blog_title" placeholder="Enter Blog title" class="form-control mb-2">
                            </div>
                            
                        
                            <div class="col-md-12">
                                <label class="mb-0">Blog data</label>
                                <textarea rows="10" required name="blog_body" placeholder="Enter Blog Data" class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Posted By</label>
                                <input type="text" required name="uploaders_name" placeholder="Enter Uploaders Name" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Blog date</label>
                                <input type="date" required name="post_date" placeholder="Enter Blog date" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Post Month</label>
                                <input type="text" required name="post_month" placeholder="Enter Blog month" class="form-control mb-2">
                            </div>
                            
                            
                            <!-- <div class="col-md-12">
                                <label class="mb-0">Upload Image</label>
                                <input type="file" required name="blog_image" class="form-control mb-2">
                            </div> -->
                 
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_blog_btn">Save</button>
                            </div>


                        </div>
                    </form>
                    
                </div>
            </div>

        </div> 
    </div>
</div>




<?php include('includes/footer.php');?>
