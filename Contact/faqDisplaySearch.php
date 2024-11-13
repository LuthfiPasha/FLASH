<!--Luthfi-->

<!DOCTYPE html>
<html>
    <head>
        <title>FAQ</title>
        <link rel="stylesheet" href="styles/faq.css">
        <link rel="stylesheet" href="styles/homepage.css">

        <?php require 'config.php';  ?>
        <script src="js/faqDisplayMessage.js"> </script>

         <!--Font library from Awesome fonts-->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>
<body>
    <!--Navigation Panel-->
    <div class="top">
        <div class="nav">
           <img class="logo" src="images/LOGO.png" alt="LOGO">
        
            <ul class="ul">
                 <li> <a href="homepage.php">HOME</a>  </li>
                 <li> <a href="#">BOOK A RIDE</a>  </li>
                 <li> <a href="#">ABOUT US</a>  </li>
                 <li> <a href="contact.php">CONTACT US</a> </li>
                 <li> <a href="faq.php">FAQs</a> </li>
                 <li> <a href="#">LOGIN</a> </li>
                 <li> <a href="#">SIGN UP</a> </li>
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


    <?php
        if (isset($_POST["search-question"])) {
            $question = $_POST["search-box"];
            

            $sql = "SELECT * FROM faq WHERE question LIKE ?";
            $stmt = $conn->prepare($sql);   //stmt - just used for prepared statements
            $searchTerm = "%$question%";
            $stmt->bind_param("s", $searchTerm);  

            $stmt->execute();
            $result = $stmt->get_result();  

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="faq-box">
                            <div class="faq-wrapper">
                                <input type="checkbox" class="faq-trigger" id="faq-trigger-' . $row["questionID"] . '">
                                <label class="faq-title" for="faq-trigger-' . $row["questionID"] . '">' . $row["question"] . '</label>
                                <div class="faq-detail">
                                    <p>' . $row["answer"] . '</p>
                                </div>
                            </div>
                        </div>';
                }
                //displaying a message when the question is found
                echo "<script>searchFound();</script>";


                echo '<div style="padding-left: 3%;"><u><h2>Some additonal Questions</u></h2></div>';
                //showing the other questions
                $sql = "SELECT * FROM faq WHERE question NOT LIKE ?";
                $stmt = $conn->prepare($sql);
                $searchTerm = "%$question%";
                $stmt->bind_param("s", $searchTerm);  

            
                $stmt->execute();
                $result = $stmt->get_result();  

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="faq-box">
                                <div class="faq-wrapper">
                                    <input type="checkbox" class="faq-trigger" id="faq-trigger-' . $row["questionID"] . '">
                                    <label class="faq-title" for="faq-trigger-' . $row["questionID"] . '">' . $row["question"] . '</label>
                                    <div class="faq-detail">
                                        <p>' . $row["answer"] . '</p>
                                    </div>
                                </div>
                            </div>';
                    }

                }
            } else {
                echo "No matching result found. Please contact us about it.";
            }


            } else {
                echo "Error: Search form not submitted.";
            }

            
            $conn->close();  
    ?>


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
            <li> <a href="homepage.php">HOME</a>  </li>
            <li> <a href="#">BOOK&nbsp;A&nbsp;RIDE</a>  </li>
            <li> <a href="#">ABOUT&nbsp;US</a>  </li>
            <li> <a href="contact.php">CONTACT&nbsp;US</a> </li>
            <li> <a href="faq.php">FAQs</a> </li>
            <li> <a href="#">LOGIN</a> </li>
            <li> <a href="#">SIGNUP</a> </li>
       </ul>
        
        <ul>
            <li> <img src = "images/sm.png"></li>
            <li> SERVICE&nbsp;HOURS&nbsp;:&nbsp;MON&nbsp;-&nbsp;SUN&nbsp;24&nbsp;HRS </li> 
            <li>CONTACT&nbsp;US&nbsp;:&nbsp;+1-234-567-8919</li>  </li>

        </ul>             

    </div>

    <div class="b2">

         <img src = "images/LOGO.png">

        <ul>
            
            <li> <a href="#">TERMS&nbsp;AND&nbsp;CONDITIONS</a>  </li> </ul>
            <ul>

            <li> <a href="#">PRIVACY&nbsp;POLICY</a>  </li>

        </ul>  
    </div>

</div>
</body>
</html>
