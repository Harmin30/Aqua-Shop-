<?php
include('functions/userfunctions.php');
include('includes/header.php');

?>
      <!-- our_fishs -->
    <div class="our_fishs py-3">
        <div class="container">
            <div class="row">
               <div class="col-md-12 ">
                        <div class="titlepage text_align_center ">
                        <h2>Our Fishs</h2>
                        <p>
                            majority have suffered alteration in some form, by injected humour, or randomised words  
                        </p>
                            <div class="row">
                                <?php
                                    $categories = getAllActive("catagories");

                                    if (mysqli_num_rows($categories)) 
                                    {
                                        foreach($categories as $item)
                                        {
                                            ?>
                                                <div class="col-md-3 mb-2">
                                                    <a href="fishs.php?category=<?= $item['slug']; ?>">
                                                        <div class="card shadow">
                                                            <div class="card-body">
                                                                <img src="uploads/<?= $item['image']; ?>" alt="Category Image" class="w-100" >
                                                                <h4 style="color:black;"><?= $item['name']; ?></h4>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                
                                            <?php
                                        }

                                    }
                                    else 
                                    {
                                        echo "No Data Available";
                                    }
                                ?>
                            </div>
                    </div>
               </div>
            </div>           
        </div>
    </div>
      <!-- end our_fishs -->
<?php include('includes/footer.php'); ?>