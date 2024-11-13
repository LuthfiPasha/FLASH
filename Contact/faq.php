<!--Luthfi-->

<!DOCTYPE html>
<html>
    <head>
        <title>FAQ</title>
        <link rel="stylesheet" href="styles/faq.css">
        <link rel="stylesheet" href="styles/homepage.css">

        <?php require 'config.php';  ?>


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
                 <li> <a href="../contact/contact.php">CONTACT US</a> </li>
                 <li> <a href="../Login/login.php">LOGIN</a> </li>
                 <li> <a href="../Signup/signup.php">SIGN UP</a> </li>
            </ul>

         </div>
    </div>



    <!--Header-->
    <div class="header">
        <h1 class="header-title">FAQ</h1>
        <p class="header-desc">Frequently Ask Questions</p>


    <!--Search Area-->
    <form method="POST" action="faqDisplaySearch.php" autocomplete="off">
        <div class="search">
            <input type="text" name="search-box" placeholder="Search.." required>
            <button type="submit"name="search-question">Search</button>
        </div>
        </form>
    </div>



    <!--faq acordion-->
    <div class="faq">
        <div class="faq-name">
        <h1 class="faq-header">Have <br>questions</h1>
        <img class="faq-img" src="images/faq-image.png">
        </div>
        <div class="faq-box">
            <?php
                $sql = "SELECT * FROM faq";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();  

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="faq-wrapper">
                                    <input type="checkbox" class="faq-trigger" id="faq-trigger-' . $row["questionID"] . '">
                                    <label class="faq-title" for="faq-trigger-' . $row["questionID"] . '">' . $row["question"] . '</label>
                                    <div class="faq-detail">
                                        <p>' . $row["answer"] . '</p>
                                    </div>
                              </div>';
                    }

                }
            ?>

        </div>
    </div>


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
                 <li> <a href="../contact/contact.php">CONTACT US</a> </li>
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

    <img src="images/IMG1.png" alt="LOGO">

 

        <ul>
            
            <li> <a href="#">TERMS&nbsp;AND&nbsp;CONDITIONS</a>  </li> </ul>
            <ul>

            <li> <a href="#">PRIVACY&nbsp;POLICY</a>  </li>

        </ul>  
    </div>

</div>

</body>
</html>
