<?php
include('../middleware/adminmiddleware.php');
include('../config/dbcon.php');
include('includes/header.php');

?>


<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h4>Customer Queries:</h4>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile No</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                </tr>
            </thead>
            <?php
                $query = "SELECT * FROM request_info";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $row) {
                        //echo $row['cname'];
                ?>
                        <tr>
                            <th scope="row"><?= $row['id'] ?></th>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['phone'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['message'] ?></td>
                            
                        </tr>
                    <?php
                    }
                } else {
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