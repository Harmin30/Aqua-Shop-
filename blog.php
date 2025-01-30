<?php
include('functions/userfunctions.php');
include('includes/header.php');
?>
      <!-- blog -->
      <div class="blog">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage text_align_center ">
                     <h2>OUR BLOG</h2>
                     <p>majority have suffered alteration in some form, by injected humour, or randomised words 
                     </p>
                  </div>
               </div>
            </div>
            <div class="row">
               <?php
               $blogs = getBlog("id");
               if (mysqli_num_rows($blogs)) 
               {
                  foreach($blogs as $item)
                  {
                     ?>               
                     <div class="col-md-12">
                        <div class="fist_sec">
                           <div class="row">
                              <div class="col-lg-6 col-md-12">
                                 <div class="blog_box" >
                                    <div class="fer text_align_left">
                                       <span><?= $item['post_date']; ?></span>
                                    </div>
                                    
                                    <h3><?= $item['blog_title']; ?></h3>
                                    <p><?= $item['blog_body']; ?></p>
                                    <strong>Post By  :<?= $item['uploaders_name']; ?></strong>
                                    <!-- <ul>
                                       <li><a href="Javascript:void(0)">Like <img src="images/li.png" alt="#"/></a></li>
                                       <li><a href="Javascript:void(0)">Comment <img src="images/com.png" alt="#"/></a></li>
                                       <li><a href="Javascript:void(0)">Share <img src="images/sh.png" alt="#"/></a></li>
                                    </ul> -->
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-12">
                                 <div class="blog_img">
                                    <figure><img src="images/blog_fish1.jpg" alt="#"/></figure>
                                 </div>
                              </div>
                           </div>
                        </div>
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
<!-- end blog -->
<?php
include('includes/footer.php');
?>
   