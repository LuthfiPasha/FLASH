<?php
    require 'config.php';

    $sql="SELECT `Reservation ID`, `Reservation Type`, DATE_FORMAT(`Pickup Time`, '%H:%i:%s') AS `Pickup Time`, `Pickup Date`, `Pickup Location`, `Number of Passengers` FROM reservationdetails";
    
    $result = $con->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit or Delete</title>
    <link rel="stylesheet" href="css/Edit_or_delete.css">
    <style>
        .top{
    background-color:#03071d;
    width: 100%;
    height: 100%;
    color: white;
    font-size: 13px;
    overflow: hidden;

}

.nav{
    overflow: hidden;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;

}

.logo{

    height: 10%;
    width: 10%;
    position: relative;
    left: 10px;
    cursor: pointer;
}

.nav ul {
    position: relative;
    right: 10px;
}
.nav ul li {

    display:inline-block;
    list-style: none;
    padding: 10px;

}
.nav ul li a{

    text-decoration: none;
    color: white;
}
.bottom{
    overflow: hidden;
}

.bottom hr {
    height: 2px;
    background-color: #03071d;
    margin: 20px 0 0 0;

}


.b1 {
    margin: 30px 0 0 0;
    display: flex;
}

.b1 iframe {
    height: 150px;
    width: 400px;
}

.b1 ul {
    line-height: 30px;
    min-width: max-content;
    list-style: none;
    margin: 0 450px 0 0;
    
}

.b1 ul :last-child {
    min-width: none;
    margin:0 10px 0 0;
}

.b1 ul li img {
    width:8%;
    height:8%;
    cursor: pointer;
}

.b1 ul li a{

    text-decoration: none;
    color: rgb(0, 0, 0);
}

.b2 img { 

    height:10%;
    width: 10%;
    position: relative;
    left: 10px;
    cursor: pointer;
    padding: 0 690px 0 0;
}


.b2 {
    display: flex;
    background-color: #03071d;
    align-items: center;
    margin: 20px 0 0 0;
}


.b2 ul {
    line-height: 30px;
    min-width: max-content;
    list-style: none;
    margin: 0 550px 0 0;
    
}

.b1 ul :last-child {
    min-width: none;
}

.b2 ul li a{

    text-decoration: none;
    color: rgb(255, 255, 255);
    margin: 0 0 0 0;
}
    </style>
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
    <br>
    <div class="table-section">
        <table>
            <thead>
                <tr>
                    <th>Reservation ID</th>
                    <th>Reservation Type</th>
                    <th>Pickup Time</th>
                    <th>Pickup Date</th>
                    <th>Pickup Location</th>
                    <th>Number of Passengers</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php    //Display the details of all the reservations in the database.
                    if ($result->num_rows > 0) {
                        
                        while($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row['Reservation ID']; ?></td>
                                <td><?php echo $row['Reservation Type']; ?></td>
                                <td><?php echo $row['Pickup Time']; ?></td>
                                <td><?php echo $row['Pickup Date']; ?></td>
                                <td><?php echo $row['Pickup Location']; ?></td>
                                <td><?php echo $row['Number of Passengers']; ?></td>
                                <td><a href="edit_page.php?id=<?php echo $row['Reservation ID']; ?>" class="editndelete">Edit</a> <a href="delete.php?reservation_id=<?php echo $row['Reservation ID']; ?>" class="editndelete" onclick="return confirm('Are you sure you want to delete this reservation?');">Delete</a></td>
                            </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
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
            <li> <a href="#">HOME</a>  </li>
            <li> <a href="#">BOOK&nbsp;A&nbsp;RIDE</a>  </li>
            <li> <a href="#">ABOUT&nbsp;US</a>  </li>
            <li> <a href="#">CONTACT&nbsp;US</a> </li>
            <li> <a href="#">FAQs</a> </li>
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