<?php

include('functions/userfunctions.php');
include('includes/header.php');
if(isset($_GET['category']))
{
   $category_slug = $_GET['category'];
   $category_data =  getSlugActive("catagories", $category_slug);
   $category = mysqli_fetch_array($category_data);
   if ($category) 
   {
      $cid = $category['id'];
      ?>
      <!-- our_fishs -->
      <div class="our_fishs py-3">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage text_align_center">
                     <h2 ><?= $category['name']; ?></h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <?php
               $products = getProdByCategory($cid);
               if (mysqli_num_rows($products) > 0) 
               {
                  foreach ($products as $item) 
                  {
                     ?>
                           <div class="col-md-3 mb-2">
                              <a href="product-view.php?product=<?= $item['slug']; ?>">
                                 <div class="card">
                                    <div class="card-body">
                                       <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">
                                       <h4 style="color:black;" class="text-center"><?= $item['pname']; ?></h4>
                                    </div>
                                 </div>
                              </a>
                           </div>
                     <?php
                  }
               }
               else 
               {
                  echo "no data available";
               }
               ?>
            </div>
         </div>
      <?php
   }
   else
   {
      echo "Somthing got Wrong";
   }
}

else
{
   echo "Somthing got Wrong";
}
   include('includes/footer.php'); ?>