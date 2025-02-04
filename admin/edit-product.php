<?php 
include('../middleware/adminmiddleware.php');
include('includes/header.php');

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    $product= getByID("products",$id);

                    if (mysqli_num_rows($product) > 0) 
                    {
                        $data = mysqli_fetch_array($product);
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Products
                                    <a href="products.php" class="btn btn-primary float-end">Back</a>
                                    </h4>
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
                                                                    <option value="<?=$item['id'];?>"  <?=$data['category_id'] == $item['id']?'selected':''?>><?=$item['name'];?></option>
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
                                            <input type="hidden" name="product_id" value="<?=$data['id'];?>">
                                        
                                            <div class="col-md-6">
                                                <label class="mb-0">Product Name</label>
                                                <input type="text" required name="pname"  value="<?=$data['pname'];?>" placeholder="Enter Product Name" class="form-control mb-2">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="mb-0">Slug</label>
                                                <input type="text" required name="slug"  value="<?=$data['slug'];?>" placeholder="Enter Product Slug" class="form-control mb-2">
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <label class="mb-0">Small descrption</label>
                                                <textarea rows="3" required name="small_descrption" placeholder="Enter small descrption" class="form-control mb-2"><?=$data['small_descrption'];?></textarea>
                                            </div>
        
                                            <div class="col-md-12">
                                                <label class="mb-0">Descrption</label>
                                                <textarea rows="3" required name="description" placeholder="Enter Descrption" class="form-control mb-2"><?=$data['description'];?></textarea>
                                            </div>
        
                                            <div class="col-md-6">
                                                <label class="mb-0">Original price</label>
                                                <input type="text" required name="original_price" value="<?=$data['original_price'];?>" placeholder="Enter Original price" class="form-control mb-2">
                                            </div>
        
                                            <div class="col-md-6">
                                                <label class="mb-0">Selling price</label>
                                                <input type="text" required name="selling_price" value="<?=$data['selling_price'];?>" placeholder="Enter Original price" class="form-control mb-2">
                                            </div>
        
                                            <div class="col-md-12">
                                                <label class="mb-0">Upload Image</label>
                                                <input type="hidden" name="old_image" value="<?=$data['image'];?>">
                                                <input type="file" name="image" class="form-control mb-2">
                                                <label class="mb-0">Current Image</label>
                                                <img src="../uploads/<?=$data['image'];?>" alt="Product Image" height="50px" width="50px">
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="mb-0">Quantity</label>
                                                    <input type="number" required name="pqty" value="<?=$data['pqty'];?>" placeholder="Enter Quantity" class="form-control mb-2">
                                                </div>
                                                
                                                <div class="col-md-3">
                                                    <label class="mb-0">Status</label><br>
                                                    <input type="checkbox" name="status" <?=$data['status'] =='0'?'':'checked' ?>>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="mb-0">Trending</label><br>
                                                    <input type="checkbox" name="trending" <?=$data['trending'] =='0'?'':'checked' ?>>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <label class="mb-0">Meta Title</label>
                                                <input type="text" required name="meta_title" value="<?=$data['meta_title'];?>" placeholder="Enter Meta Title" class="form-control mb-2">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Meta Description</label>
                                                <textarea rows="3" required name="meta_description" placeholder="Enter Meta Description" class="form-control mb-2"><?=$data['meta_description'];?></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Meta Keyword</label>
                                                <textarea rows="3"  required name="meta_keywords" placeholder="Enter Meta Keyword" class="form-control mb-2"><?=$data['meta_keywords'];?></textarea>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary" name="update_product_btn">Update</button>
                                            </div>
        
        
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        <?php
                    }
                    else 
                    {
                        echo"Product Not Found for given id";
                    }                   
                }
            
                else 
                {
                    echo"Id Missing from URl";
                }
                ?>
        </div> 
    </div>
</div>

<?php include('includes/footer.php');?>
