
<?php 
session_start();
include('includes/header.php');
?>

      <!-- contact -->

      <div class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage text_align_center">
                     <h2>contact us</h2>
                  </div>
               </div>
            </div>
            <div class="row d_flex">
               <div class="col-md-6">
                  <form action="functions/handle_customer_requests.php" method="POST" id="request" class="main_form"  data-aos="fade-right">
                     <div class="row">
                        <input type="hidden" name="id">
                        <div class="col-md-12">
                           <input class="contactus" required placeholder="Name" type="text" name="name"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" required placeholder="Phone" type="int" name="phone"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" required placeholder="Email" type="email" name="email"> 
                        </div>
                        <div class="col-md-12">
                           <textarea style="color: #adafb0;" required class="textarea" placeholder="Message" type="text" name="message"> </textarea>
                        </div>
                        <div class="col-md-12">
                           <button type="submit" class="send_btn" name="send_btnn">Book Now</button>
                        </div>
                     </div>
                  </form>
               </div>

               <div class="col-md-6">
                  <div class="map_img" data-aos="fade-left">
                     <figure><img src="images/map.png" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end contact -->
<?php include('includes/footer.php');?>
      