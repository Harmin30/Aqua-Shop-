<?php

include('../config/dbcon.php');
include('../middleware/adminmiddleware.php');
include('includes/header.php');

?>


<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h4>Blogs:</h4>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Blog Data</th> 
                    <th scope="col">uploader's Name</th> 
                    <th scope="col">Blog Data</th> 
                    <th scope="col">Blog Month</th> 
                    <th scope="col">Action</th>
                </tr>
            </thead>
                <?php
                    $query = "SELECT * FROM post_blog";
                    $query_run = mysqli_query($con,$query);

                    if (mysqli_num_rows($query_run)>0)
                    {
                        foreach ($query_run as $row)
                        {
                            
                            ?>
                                <tr>                              
                                    <th scope="row"><?=$row['id'] ?></th>                                  
                                    <td>
                                    <textarea readonly name="" id="" cols="30" rows="5"><?=$row['blog_title'] ?></textarea></td>
                                    <td><textarea readonly name="" id="" cols="30" rows="5"><?=$row['blog_body']?></textarea></td>                       
                                    <td><?=$row['uploaders_name'] ?></td>
                                    <td><?=$row['post_date'] ?></td>
                                    <td><?=$row['post_month'] ?></td>
                                    <td>
                                       <a href="edit-blog.php?id=<?=$row['id']?>" class="btn btn-sm btn-primary">Edit</a>
                                       
                                       <button type="submit" name="delete_blog_btn" class="btn btn-sm btn-danger">Delete</button>
                       

                                    </td>
                                </tr>
                            <?php
                        }
                    }
                    else
                    {
                    ?>
                    <tr>
                        <td>No Record Found</td>
                    </tr>
                    <?php
                    }
                ?>                          
            </tbody>
        </table>
    </div>

</div>


<?php include('includes/footer.php'); ?>