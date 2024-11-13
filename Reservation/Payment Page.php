<?php
    
    require 'config.php';

    $resType=$_POST["reservation-type"];
    $pickType=$_POST["pickup-time"];
    $pickDate=$_POST["pickup-date"];
    $pickLoc=$_POST["pickup-location"];
    $NumOfPas=$_POST["num-of-passengers"];

    $sql="INSERT INTO reservationDetails VALUES ('','$resType','$pickType','$pickDate','$pickLoc','$NumOfPas')";  //Insert the entered data in the form to database.
    
    if($con->query($sql))
    {
        $last_id = $con->insert_id;
        //Display the updated information
        $sql="SELECT `Reservation Type`, `Pickup Time`, `Pickup Date`, `Pickup Location`, `Number of Passengers` FROM reservationdetails WHERE `Reservation ID` = $last_id";
        $result = $con->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
        }
    }
    else
    {
        echo "Error".$con->$error;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="css/P_header&footer.css">
    <link rel="stylesheet" href="css/P_styles.css">

    <script>
        //According to the selected service type the price is calculated.
        function updateInvoice(serviceType) {
            let subtotal = 0;
            let discount = 0;
            let totalPayable = 0;

           
            switch (serviceType) {
                case "Economy Car":
                    subtotal = 25000;  
                    discount = 2000;
                    break;
                case "SUV":
                    subtotal = 27500;
                    discount = 1000;
                    break;
                case "Van":
                    subtotal = 50000;
                    discount = 500;
                    break;
                case "Bus":
                    subtotal = 70000;
                    discount = 3000;
                    break;
                case "Luxury Car":
                    subtotal = 50000;
                    discount = 0;
                    break;
                case "Luxury SUV":
                    subtotal = 55000;
                    discount = 500;
                    break;
                case "Electric Vehicle":
                    subtotal = 45000;
                    discount = 1500;
                    break;
                case "Boat and Helicopter":
                    subtotal = 170000;
                    discount = 0;
                    break;
                
                default:
                    subtotal = 0;
                    discount = 0;
            }

           
            totalPayable = subtotal - discount;

            
            document.getElementById("subtotal").value = subtotal;
            document.getElementById("discount").value = discount;
            document.getElementById("totalPayable").value = totalPayable;
        }

        function copyInvoiceValues() {
            document.getElementById("hiddenSubtotal").value = document.getElementById("subtotal").value;
            document.getElementById("hiddenDiscount").value = document.getElementById("discount").value;
            document.getElementById("hiddenTotalPayable").value = document.getElementById("totalPayable").value;
        }

        window.onload = function() {
            let serviceType = document.getElementById("serviceType").value;
            updateInvoice(serviceType);
        };
    </script>
</head>
<body>
    <div class="top">
        <div class="nav">
           <img class="logo" src="images/LOGO.png" alt="LOGO">
        
            <ul class="ul">
            <li> <a href="../Home/homepage.php">HOME</a>  </li>
            <li> <a href="../Reservation/Reservation1.php">BOOK A RIDE</a>  </li>
            <li> <a href="../About Us/AboutUs.php">ABOUT US</a>  </li>
            <li> <a href="../contact/contact.php">CONTACT US</a> </li>
            <li> <a href="../contact/faq.php">FAQs</a> </li>
            </ul>

         </div>
    </div>

    <div class="pageName">
                <h1>Payment</h1>
                <!-- Display the details of Order summary -->
            </div><br>
            <label class="description"><b>Order Summary</b></label>
            <hr><br>
            <div class="container">
                <form>
                    <div class="reservation-details">
                        <div class="input-box">
                            <label class="details">Service Type</label>
                            <input type="text" id="serviceType" value="<?php echo $row['Reservation Type']; ?>" readonly>
                        </div>
                        <div class="input-box">
                            <label class="details">Pickup Time</label>
                            <input type="text" value="<?php echo date('H:i', strtotime($row['Pickup Time'])); ?>" readonly>
                        </div>
                        <div class="input-box">
                            <label class="details">Pickup Date</label>
                            <input type="text" value="<?php echo $row['Pickup Date']; ?>" readonly>
                        </div>
                        <div class="input-box">
                            <label class="details">Pickup Location</label>
                            <input type="text" value="<?php echo $row['Pickup Location']; ?>" readonly>
                        </div>
                        <div class="input-box">
                            <label class="details">Number of Passengers</label>
                            <input type="text" value="<?php echo $row['Number of Passengers']; ?>" readonly>
                        </div>    
                    </div>
                </form>
            </div>
            <br>
            <label class="description"><b>Invoice</b></label>
            <hr>
        
            <div class="container2">
                <form method="POST" action="insert.php">
                    <div class="invoice-details">
                        <div class="input-box1">
                            <label class="price-details">Subtotal</label>
                            <input type="text" id="subtotal" name="subtotal" readonly>
                        </div>
                        <div class="input-box1">
                            <label class="price-details">Promo Codes</label>
                            <select name="promoCodes">
                                <option value="promo1">Promo1</option>
                                <option value="promo2">Promo2</option>
                                <option value="promo3">Promo3</option>
                            </select>
                        </div>
                        <div class="input-box1">
                            <label class="price-details">Discounts</label>
                            <input type="text" id="discount" name="discount" readonly>
                        </div>
                    </div>
                    <div class="payable">
                        <label class="totprice-details">Total Payable</label>
                        <input type="text" id="totalPayable" name="totPayable" readonly>
                    </div>
                </form>
            </div>
            <br>
            <label class="description"><b>Payment Method</b></label>
            <br>
            <hr>
        
            <div class="container3">
                <form method="POST" action="insert.php">
                    <div class="payment-details">
                        <div class="input-box2">
                            <label class="pay-method">Card Number</label>
                            <input type="text" name="cardno">
                        </div>
                        <div class="input-box2">
                            <label class="pay-method">Cardholder name</label>
                            <input type="text" name="cardname">
                        </div>
                        <div class="input-box2">
                            <label class="pay-method">CVV</label>
                            <input type="text" name="cvv">
                        </div>
                        <div class="input-box2">
                            <label class="pay-method">Expiration date</label>
                            <input type="text" name="exp">
                        </div>
                        <div class="submit-box">
                            <input type="submit" onclick="copyInvoiceValues(); this.form.submit();">
                        </div>           
                            <input type="hidden" id="hiddenSubtotal" name="hiddenSubtotal">
                            <input type="hidden" id="hiddenDiscount" name="hiddenDiscount">
                            <input type="hidden" id="hiddenTotalPayable" name="hiddenTotalPayable">
                    </div>
                </form>
            </div>
<!--Footer -->     
<div class="bottom">
    <hr>

    <div class="b1">
        

        <ul> <li><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.798467128214!2d79.97036957448275!3d6.914682818494989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae256db1a6771c5%3A0x2c63e344ab9a7536!2sSri%20Lanka%20Institute%20of%20Information%20Technology!5e0!3m2!1sen!2slk!4v1727451676831!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">"> </iframe></li>
        <li>  FLASH RENTAL (PVT) LTD </li> 
        <li> <a href="#"> info@flashrental.com</a> </li>
        <li>7817, HAZELAND LN, BOSTON, USA.</li>
        </ul>

        <ul>    
        <li> <a href="../Home/homepage.php">HOME</a>  </li>
        <li> <a href="../Reservation/Reservation1.php">HOME</a>  </li>
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