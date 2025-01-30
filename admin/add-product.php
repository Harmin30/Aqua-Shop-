<?php 
include('../middleware/adminmiddleware.php');
include('includes/header.php');

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Products</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data" >
                        <div class="row">
                            <div class="col-md-12">
                                <label class="mb-0">Select Category</label>
                                <select name ="category_id" class="form-select mb-2" >
                                    <option selected>Select Category</option>
                                    <?php
                                        $categories = getAll("catagories");
                                        if($categories)
                                        {
                                            foreach($categories as $item)
                                            {
                                                ?>
                                                    <option value="<?=$item['id'];?>"><?=$item['name'];?></option>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Category Available";   
                                        }                                      
                                    ?>                                                                                                             
                                </select>
                            </div>
                        
                            <div class="col-md-6">
                                <label class="mb-0">Product Name</label>
                                <input type="text" required name="pname" placeholder="Enter Product Name" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Slug</label>
                                <input type="text" required name="slug" placeholder="Enter Product Slug" class="form-control mb-2">
                            </div>
                            
                            <div class="col-md-12">
                                <label class="mb-0">Small descrption</label>
                                <textarea rows="3" required name="small_descrption" placeholder="Enter small descrption" class="form-control mb-2"></textarea>
                            </div>

                            <div class="col-md-12">
                                <label class="mb-0">Descrption</label>
                                <textarea rows="3" required name="description" placeholder="Enter Descrption" class="form-control mb-2"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="mb-0">Original price</label>
                                <input type="text" required name="original_price" placeholder="Enter Original price" class="form-control mb-2">
                            </div>

                            <div class="col-md-6">
                                <label class="mb-0">Selling price</label>
                                <input type="text" required name="selling_price" placeholder="Enter Original price" class="form-control mb-2">
                            </div>

                            <div class="col-md-12">
                                <label class="mb-0">Upload Image</label>
                                <input type="file" required name="image" class="form-control mb-2">
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-0">Quantity</label>
                                    <input type="number" required name="pqty" placeholder="Enter Quantity" class="form-control mb-2">
                                </div>
                                
                                <div class="col-md-3">
                                    <label class="mb-0">Status</label><br>
                                    <input type="checkbox" name="status">
                                </div>
                                <div class="col-md-3">
                                    <label class="mb-0">Trending</label><br>
                                    <input type="checkbox" name="trending">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <label class="mb-0">Meta Title</label>
                                <input type="text" required name="meta_title" placeholder="Enter Meta Title" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Description</label>
                                <textarea rows="3" required name="meta_description" placeholder="Enter Meta Description" class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Keyword</label>
                                <textarea rows="3"  required name="meta_keywords" placeholder="Enter Meta Keyword" class="form-control mb-2"></textarea>
                            </div>
                            
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_product_btn">Save</button>
                            </div>


                        </div>
                    </form>
                    
                </div>
            </div>

        </div> 
    </div>
</div>

<?php include('includes/footer.php');?>
