<!--Luthfi-->

<!DOCTYPE html>
<html>
    <head>
        <title>Contact us</title>
        <link rel="stylesheet" href="styles/contact.css">

        <script src="js/faqNavigation.js"> </script>

        <?php  require 'config.php';  ?>

        <!--Font library from Awesome fonts-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />




    </head>
<body>
<!--Navigation Panel-->
<div class="top">
        <div class="nav">
           <img class="logo" src="images/LOGO.png" alt="LOGO">
        
            <ul class="ul">
                 <li> <a href="../Home/homepage.php">HOME</a>  </li>
                 <li> <a href="../Reservation/Reservation1.php">BOOK A RIDE</a>  </li>
                 <li> <a href="../About Us/AboutUs.php">ABOUT US</a>  </li>
                 <li> <a href="../contact/faq.php">FAQs</a> </li>
                 <li> <a href="../Login/login.php">LOGIN</a> </li>
                 <li> <a href="../Signup/signup.php">SIGN UP</a> </li>
            </ul>
         </div>
    </div>


<!--header-->
<section class = "contact-section">
    <div class = "contact-bg">
      <h3>Get in Touch with Us</h3>
      <h2>contact us</h2>

      <!-- Three lines below the heading -->
      <div class = "line">
        <div></div>
        <div></div>
        <div></div>
      </div>
      <p class = "text">Here at FLASH, we take the bother out of renting a car. We are  here to help. Our helpful staff is available to help, 
        no matter what your needs are or what questions you may have. Please get in contact with us, and we will respond right away!</p>
    </div>


<div class = "contact-body"> 
    
      
      <div class = "contact-info">
        <div>  
        <!--fas(Font Awesome Solid)  indicate the font awesome icons/ fa-mobile-alt - represents the specific name-->
          <span><i class = "fas fa-mobile-alt"></i></span>
          <span>Phone No.</span>
          <span class = "text">1-2392-23928-2</span>
        </div>
        <div>
          <span><i class = "fas fa-envelope-open"></i></span>
          <span>E-mail</span>
          <span class = "text">flashrentals@gmail.com</span>
        </div>

        <div>
          <span><i class = "fas fa-map-marker-alt"></i></span>
          <span>Address</span>
          <span class = "text">2939 Patrick Street, Vicotria TX, United States</span>
        </div>

        <div>
          <span><i class = "fas fa-clock"></i></span>
          <span>Opening Hours</span>
          <span class = "text">MON - SUN 24 HRS</span>
        </div>
    </div>
 




    <!--FAQ Link -->
    <div class="faq-link">
            <a href="faq.php">
            <img border="0" alt="faq-link" src="images/faq-link.png" width="100" height="100" onclick="loadfaq(); return false;"></a>
        </div>

    <!--Contact form-->
      <div class = "contact-form">
        <form method="POST" action="submitMessage.php">
            <h2>Send a message</h2>
          <div>
            <input type = "text" class = "form-control" name="fname" placeholder="First Name" required> 
            <input type = "text" class = "form-control" name="lname" placeholder="Last Name" required>
          </div>
          <div>
            <input type = "email" class = "form-control" name ="email" placeholder="E-mail" required>
            <input type="tel" class = "form-control" pattern="[0-9]{10}" name ="phone" placeholder="Contact Number">
          </div>
          <textarea rows = "5" placeholder="Message" name ="message" class = "form-control" autocomplete="off" required></textarea>
          <input type = "submit" class = "send-btn"  name ="btnsub" value = "send message">
          <button type="reset" class = "reset-btn">Reset</button>
        </form>

        <!--Customer Agent Icon-->
        <div>
          <img src = "images/contact-png.png" alt = "contact icon">
        </div>
      </div>
      
    
</div>
</section>

<!--Footer-->
<div class="bottom">
    <hr>

    <div class="b1">

        <ul> <li><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.798467128214!2d79.97036957448275!3d6.914682818494989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae256db1a6771c5%3A0x2c63e344ab9a7536!2sSri%20Lanka%20Institute%20of%20Information%20Technology!5e0!3m2!1sen!2slk!4v1727451676831!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">"> </iframe></li>
        <li>  FLASH RENTAL (PVT) LTD </li> 
        <li> <a href="#"> info@flashrental.com</a> </li>
        <li>7817, HAZELAND LN, BOSTON, USA.</li>
        </ul>

        <ul>    
            <li><b>QUICK LINKS</b></li>             
            <li> <a href="../Home/homepage.php">HOME</a>  </li>
                 <li> <a href="../Reservation/Reservation1.php">BOOK A RIDE</a>  </li>
                 <li> <a href="../About Us/AboutUs.php">ABOUT US</a>  </li>
                 <li> <a href="../contact/faq.php">FAQs</a> </li>
                 <li> <a href="../Login/login.php">LOGIN</a> </li>
                 <li> <a href="../Signup/signup.php">SIGN UP</a> </li>
       </ul>
        <ul>
            <li> <img src = "images/sm.png"></li>
            <li> SERVICE&nbsp;HOURS&nbsp;:&nbsp;MON&nbsp;-&nbsp;SUN&nbsp;24&nbsp;HRS </li> 
            <li>CONTACT&nbsp;US&nbsp;:&nbsp;+1-234-567-8919</li>  </li>
        </ul>             
    </div>

    <div class="b2">
    <img src="images/IMG1.png">
        <ul>
            <li> <a href="#">TERMS&nbsp;AND&nbsp;CONDITIONS</a></li> 
        </ul>
        <ul>
            <li> <a href="#">PRIVACY&nbsp;POLICY</a></li>
        </ul>  
    </div>
</div>

</body>
</html>