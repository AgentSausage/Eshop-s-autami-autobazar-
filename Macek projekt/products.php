<!DOCTYPE html>
<html lang="en">
<?php include_once 'parts/header.php'?>
      <body>
        <section class="templatemo-top-section">
            <?php include_once 'parts/body_header.php'?>
            <?php include_once 'parts/welcome_mess.php'?>
      </section>
      <section class="container margin-bottom-50">
       <div class="row">
        <h2 class="col-lg-12 text-center text-uppercase margin-bottom-30">Donec pede justo fringilla ulputate eget</h2>
        <p class="col-lg-12 text-center margin-bottom-30">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec.</p>
        <div class="col-lg-12 tm-overflow-hidden">
          <div class="tm-img-1-container">
            <img src="img/0.jpg" alt="Image description">
            <p class="tm-img-1-description">Porsche</p>
          </div>
          <div class="tm-img-1-container">
            <img src="img/1.jpg" alt="Image description">
            <p class="tm-img-1-description">Mercedes</p>
          </div>
          <div class="tm-img-1-container">
            <img src="img/0.jpg" alt="Image description">
            <p class="tm-img-1-description">BMW</p>
          </div>
          <div class="tm-img-1-container">
            <img src="img/1.jpg" alt="Image description">
            <p class="tm-img-1-description">Lexus</p>
          </div>         
        </div>
      </div>
    </section>    

    <!--Main content-->
    <section class="container margin-bottom-50">
      <div class="tm-overflow-hidden row">
        <div class="tm-gallery col-lg-9 col-md-9 col-sm-8 col-xs-12">
            <?php include_once "parts/product.php" ?>
        </div>
        <aside class="tm-gallery-aside col-lg-3 col-md-3 col-sm-4 col-xs-12">
          <nav class="tm-gallery-nav">
            <h2 class="tm-gallery-nav-title">Category <i class="fa fa-caret-up"></i></h2>
            <ul>
              <li>
                <a href="#">
                  <img src="img/gallery-list-icon.png" class="tm-gallery-list-img" alt="Image">Used
                  <i class="fa fa-caret-right tm-gallery-list-fa"></i>
                </a>
              </li>
            </ul>
          </nav>
          <div class="tm-call-us">
            <h3 class="text-uppercase tm-call-us-title">Call us</h3>
            <a href="tel:" class="tm-call-us-link">+11 565 789 57</a>
          </div>
        </aside>
      </div>

      <!--banner-->
      <div class="tm-banner">
        <h2 class="tm-banner-title">Maecenas</h2>
        <p class="tm-banner-description">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium</p>
      </div>
    </section> <!-- Main content -->
    <!--Footer content-->
        <?php include_once "parts/footer.php"?>
        <!-- Footer content-->
    
    <!-- JS -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->

  </body>
  </html>