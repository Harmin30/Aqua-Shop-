<?php
include('../middleware/adminmiddleware.php');
include('../config/dbcon.php');
include('includes/header.php');

?>


<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h4>Registered Users:</h4>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile No</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
                <?php
                    $query = "SELECT * FROM res_user_master";
                    $query_run = mysqli_query($con,$query);

                    if (mysqli_num_rows($query_run)>0)
                    {
                        foreach ($query_run as $row)
                        {
                            //echo $row['cname'];
                            ?>
                                <tr>                              
                                    <th scope="row"><?=$row['id'] ?></th>                                  
                                    <td><?=$row['cname'] ?></td>
                                    <td><?=$row['cmobile'] ?></td>
                                    <td><?=$row['cemail'] ?></td>
                                    <td><?=$row['cpassword'] ?></td>
                                    <td>
                                        <a href="edit-users.php?user_id=<?=$row['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                        <!-- <button type="button" value="$row['id'] " class="btn btn-sm btn-danger delete_user_btn">Delete</button> -->

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