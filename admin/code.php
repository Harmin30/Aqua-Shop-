<?php

include('../config/dbcon.php');
include('../functions/myfun.php');

if(isset($_POST['add_category_btn']))
{

    $name = $_POST['name'];
    $slug =$_POST['slug'];
    $description =$_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keyword'];
    $status = isset($_POST['status']) ? '1':'0';
    $popular = isset($_POST['popular']) ? '1':'0';
    
    $image=$_FILES['image']['name'];

    $path="../uploads";

    $image_ext= pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $cate_query="INSERT INTO catagories 
    (name,slug,description,meta_title,meta_description,meta_keywords,status,popular,image) 
    VALUES ('$name','$slug','$description','$meta_title','$meta_description','$meta_keywords','$status','$popular','$filename')";

    $cate_qury_run=mysqli_query($con,$cate_query);

    if ($cate_qury_run) 
    {
        
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        redirect("add-catagory.php","Cetagory added Successfully");
    }
    else
    {
        redirect("add-catagory.php","Somthing Went Wrong");
    }



}
elseif (isset($_POST['update_category_btn']))
{
    $Category_id = $_POST['Category_id'];
    $name = $_POST['name'];
    $slug =$_POST['slug'];
    $description =$_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keyword'];
    $status = isset($_POST['status']) ? '1':'0';
    $popular = isset($_POST['popular']) ? '1':'0';
    
    $new_image=$_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != "")
    {
        //$update_filename=$new_image;
        $image_ext= pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;
    }
    else
    {
        $update_filename=$old_image; 
    }
    $path="../uploads";
    $update_query = "UPDATE catagories SET name='$name',slug='$slug',description='$description',meta_title = '$meta_title',
    meta_description='$meta_description',meta_keywords='$meta_keywords',status= '$status',
    popular='$popular',image='$update_filename' WHERE id='$Category_id'";

    $update_query_run = mysqli_query($con,$update_query);

    if ($update_query_run) 
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/".$old_image);
            }
        }
        redirect("edit-category.php?id=$Category_id","category Updated Successfully");
    }
    else
    {
        redirect("edit-category.php?id=$Category_id","Something Went Wrong");
    }
}

elseif (isset($_POST['delete_category_btn']))
{
    $category_id = mysqli_real_escape_string($con,$_POST['category_id']);
    $category_query = "SELECT * FROM  catagories WHERE id='$category_id'";
    $category_query_run = mysqli_query($con,$category_query);
    $category_data=mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];


    $delete_query = "DELETE FROM catagories WHERE id='$category_id'";
    $delete_query_run = mysqli_query($con,$delete_query);

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$image))
            {
                unlink("../uploads/".$image);
            }
        //redirect("category.php","category Deleted Successfully");
        echo 200;
        
    }
    else
    {
        //redirect("category.php","Something Went Wrong");
        echo 500;
    }
}
elseif (isset($_POST['add_product_btn']))
{
    $category_id = $_POST['category_id'];  
    $pname = $_POST['pname'];
    $slug =$_POST['slug'];
    $small_descrption =$_POST['small_descrption'];
    $description =$_POST['description'];
    $original_price =$_POST['original_price'];
    $selling_price =$_POST['selling_price'];
    $pqty =$_POST['pqty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1':'0';
    $trending = isset($_POST['trending']) ? '1':'0';
    
    $image=$_FILES['image']['name'];

    $path="../uploads";

    $image_ext= pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    if ($pname != "" && $slug != "" && $description != "")
    {
        $product_query = "INSERT INTO products(category_id,pname,slug,small_descrption,description,original_price,selling_price,pqty,meta_title,
        meta_description,meta_keywords,status,trending,image) VALUES 
        ('$category_id','$pname','$slug','$small_descrption',
        '$description','$original_price','$selling_price','$pqty','$meta_title','$meta_description',
        '$meta_keywords','$status','$trending','$filename')";
    
        $product_query_run=mysqli_query($con,$product_query);
    
        if($product_query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
            redirect("add-product.php","Product added Successfully");
    
        }
        else 
        {
            redirect("add-product.php","Something went wrong");      
        } 
    }
    else 
    {
        redirect("add-product.php","All Fields are mandatory");      
    }
}
elseif (isset($_POST['update_product_btn'])) 
{
    $product_id =$_POST['product_id'] ;
    $category_id = $_POST['category_id'];

    $pname = $_POST['pname'];
    $slug =$_POST['slug'];
    $small_descrption =$_POST['small_descrption'];
    $description =$_POST['description'];
    $original_price =$_POST['original_price'];
    $selling_price =$_POST['selling_price'];
    $pqty =$_POST['pqty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1':'0';
    $trending = isset($_POST['trending']) ? '1':'0';
    
    $path="../uploads";

    $new_image=$_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != "")
    {
        //$update_filename=$new_image;
        $image_ext= pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;
    }
    else
    {
        $update_filename=$old_image; 
    }

    $update_product_query = "UPDATE products SET category_id='$category_id', pname='$pname',slug='$slug',small_descrption='$small_descrption',description='$description',original_price='$original_price',
    selling_price='$selling_price',pqty='$pqty',meta_title='$meta_title',meta_description='$meta_description',meta_keywords='$meta_keywords',status='$status',trending='$trending',image='$update_filename' WHERE id='$product_id'";
    
    $update_product_query_run  = mysqli_query($con,$update_product_query);

    if ($update_product_query_run) 
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/".$old_image);
            }
        }
        redirect("edit-product.php?id=$product_id","product Updated Successfully");
    }
    else
    {
        redirect("edit-product.php?id=$product_id","Something Went Wrong");
    }


}
elseif (isset($_POST['delete_product_btn'])) 
{
    $product_id = mysqli_real_escape_string($con,$_POST['product_id']);

    $product_query = "SELECT * FROM products WHERE id='$product_id' ";
    $product_query_run = mysqli_query($con, $product_query);
    $product_data=mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];


    $delete_query = "DELETE FROM products WHERE id='$product_id'";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$image))
        {
            unlink("../uploads/".$image);
        }

        //redirect("products.php","product Deleted Successfully");  
        echo 200;     
    }
    else
    {
        //redirect("products.php","Something Went Wrong");
        echo 500;
    }
}
elseif (isset($_POST['update_order_btn'])) 
{
   $track_no=$_POST['tracking_no'];
   $order_status=$_POST['order_status'];
   $update_order_query= "UPDATE res_order_master SET status='$order_status' WHERE tracking_no='$track_no' ";
   $update_order_query_run=mysqli_query($con,$update_order_query);

   redirect("view-order.php?t=$track_no","Order status Updated Sucessfully");

}

if (isset($_POST['add_blog_btn'])) 
{
    $post_id = $_POST['post_id'];
    $blog_title =$_POST['blog_title'] ;
    $blog_body = $_POST['blog_body'];
    $blog_subtitle = $_POST['blog_subtitle'];
    //$blog_image = $_POST['blog_image'];
    $uploaders_name = $_POST['uploaders_name'];
    $post_date = $_POST['post_date'];
    $post_month = $_POST['post_month'];


    
    // $blog_image=$_FILES['blog_image'];

    // $path="../uploads";

    // $image_ext= pathinfo($blog_image, PATHINFO_EXTENSION);
    // $filename = time().'.'.$image_ext;

    $query = "INSERT INTO post_blog (blog_title,blog_subtitle,blog_body,uploaders_name,post_date,post_month) VALUES ('$blog_title','$blog_body','$uploaders_name','$post_date','$post_month')";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        redirect("add-blog.php","Blog added Successfully"); 
    }
    else
    {
        redirect("add-blog.php","Somthing gone wrong");
    }
}
else 
{
    header('Location: ../index.php');
}
?>