<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Page</title>
    <link rel="stylesheet" href="css/R_header&footer.css">
    <link rel="stylesheet" href="css/R_styles.css">
</head>
<body>
    <div class="top">
        <div class="nav"> <!--Navigation Panel-->
           <img class="logo" src="images/LOGO.png" alt="LOGO">
        
            <ul class="ul">
                 <li> <a href="../Home/homepage.php">HOME</a>  </li>
                 <li> <a href="../About Us/AboutUs.php">ABOUT US</a>  </li>
                 <li> <a href="../contact/contact.php">CONTACT US</a> </li>
                 <li> <a href="../contact/faq.php">FAQs</a> </li>
            </ul>

         </div>
    </div>

    <div class="pageName">
        <h1>Reservation</h1>
    </div> <!-- Update or delete reservation details -->
        <a href="Edit_or_delete.php" class="editordelete">Edit or Delete Reservations</a>
        <label class="description"><b>Create a reservations</b></label>
        <hr><br>
    <form method="POST" action="Payment Page.php"> <!-- Make a rservation form-->
        <div class="form">
            <div class="select-box">
                <label class="details">Service type</label>
                <select name="reservation-type">
                    <option value="">Select a service type</option>
                    <option value="Economy Car">Economy Car</option>
                    <option value="SUV">SUV</option>
                    <option value="Van">Van</option>
                    <option value="Bus">Bus</option>
                    <option value="Luxury Car">Luxury Car</option>
                    <option value="Luxury SUV">Luxury SUV</option>
                    <option value="Electric vehicle">Electric vehicle</option>
                    <option value="Boat">Boat and Helicopter</option>

                </select>
            </div>
        
            <div class="container1">
                <div class="input-box">
                    <label class="details">Pickup time</label>
                    <input type="text" name="pickup-time" placeholder="hh:mm">
                </div>
    
                <div class="input-box">
                    <label class="details">Pickup date</label>
                    <input type="text" name="pickup-date" placeholder="YYYY-MM-DD">
                </div>
            </div>
    
            <div class="container2">
                <div class="input-box">    
                    <label class="details">Pickup Location</label>
                    <input type="text" name="pickup-location">
                </div>
    
                <div class="input-box">
                    <label class="details">Number of passengers</label>
                    <input type="text" name="num-of-passengers">
                </div>
            </div>
            <div class="submit-box">
                <input type="submit" value="Submit">
            </div>
        </div>
    </form>
        <br>
        <label class="description"><b>View Vehicle Type</b></label>  
        <hr><br>

    <div class="cont1"> <!--Details About Vehicles -->
        <div class="vehicle-container">
            <img src="images/1.jpg">
            <p><strong>Economy Car : Toyota Prius</strong><br>
                       Economy cars are affordable and fuel-efficient. They offer lower running costs and reliable transportation.
            </p>
        </div>
        <div class="vehicle-container">
            <img src="images/2.jpg">
            <p><strong>SUV : Toyota Sequoia</strong><br>
                       SUVs are spacious and versatile, offering higher ground clearance making them ideal for families and adventures.  
            </p>
        </div>
        <div class="vehicle-container">
            <img src="images/3.jpg">
            <p><strong>Van : Ford Transit</strong><br>
                       Vans are spacious vehicles designed for transporting passengers and cargo, ideal for families and group travel.
            </p>
        </div>
        <div class="vehicle-container">
            <img src="images/4.jpg">
            <p><strong>Bus</strong><br>
                       Can transport multiple passengers efficiently. They are commonly used for tours and long-distance travel.
            </p>
        </div>
    </div>
    
    <div class="cont2">
        <div class="vehicle-container">
            <img src="images/5.jpg">
            <p><strong>Luxury Car : Rolls Royce Spectre</strong><br>
                       Provide premium features and superior comfort, designed for an upscale driving experiences.
            </p>
        </div>
        <div class="vehicle-container">
            <img src="images/6.jpg">
            <p><strong>Luxury SUV : Jaguar F-Pace</strong><br>            
                       Provides spaciousness with high-end features, offering superior comfort and advanced technology.
            </p>
        </div>
        <div class="vehicle-container">
            <img src="images/7.jpeg">
            <p><strong>Electric Car : Tesla Model S</strong><br>            
                       Offers eco-friendly transportation. They provide lower operating costs and reduced emissions compared to traditional vehicles.
            </p>
        </div>
        <div class="vehicle-container">
            <img src="images/8.png">
            <p><strong>Boats & Helicopters</strong><br>
                Ideal for reaching remote locations quickly. Both offer efficient solutions for navigating their respective environments.
            </p>
        </div>
    </div>    
     <br>
<div class="bottom"><!-- Footer -->
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
            <li> <a href="../About Us/AboutUs.php">ABOUT US</a>  </li>
            <li> <a href="../contact/contact.php">CONTACT US</a> </li>
            <li> <a href="../contact/faq.php">FAQs</a> </li>
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