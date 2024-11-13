    <?php
        require 'config.php';

        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $sql="SELECT `Reservation ID`, `Reservation Type`, DATE_FORMAT(`Pickup Time`, '%H:%i:%s') AS `Pickup Time`, `Pickup Date`, `Pickup Location`, `Number of Passengers` FROM reservationdetails WHERE `Reservation ID` = '$id'";

            $result = $con->query($sql);
        
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
            }else{
                echo "Reservation not found!";
                exit;
            }
        }
        //Update the edited details into the database.
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $reservationType = $_POST['reservation_type'];
            $pickupTime = $_POST['pickup_time'];
            $pickupDate = $_POST['pickup_date'];
            $pickupLocation = $_POST['pickup_location'];
            $numPassengers = $_POST['num_passengers'];
    
            
            $updateSql = "UPDATE reservationdetails 
                          SET `Reservation Type` = '$reservationType', 
                              `Pickup Time` = '$pickupTime', 
                              `Pickup Date` = '$pickupDate', 
                              `Pickup Location` = '$pickupLocation', 
                              `Number of Passengers` = '$numPassengers' 
                          WHERE `Reservation ID` = '$id'";
    
            //After the details are successfully updated get redirected to Edit or delete page.
            if ($con->query($updateSql) === TRUE) {
                header("Location: Edit_or_delete.php");
                exit;
            } else {
                echo "Error updating reservation: " . $con->error;
            }
        }

    ?>
    <html>
    <head>
        <style>
            body{
                font-family: Poppins;
                font-size: 25px;
            }

            .container input{
            height:40px;
            width: 45%;
            display:block;
            margin: 5px 0 30px 0;
            padding-left: 5px;
            font-size:18px;
            font-family: Poppins;
            }
            fieldset {
                width: 40%; 
                margin: auto; 
                padding: 20px;
                border: 4px solid black;
            }
            legend{
                font-weight:bold;
            }

            .editbutton{
                padding: 7px 19px 7px 19px;
                font-size: 22px;
                font-weight: bold;
                border-radius: 6px;
            }
        </style>
    </head>
        <body>
            <fieldset>
                <legend>Edit Details</legend>
            <form method="POST">
                <div class="container">
                    <label>Reservation Type</label>
                    <input type="text" name="reservation_type" value="<?php echo $row['Reservation Type']; ?>">
                </div>
                <div class="container">
                    <label>Pickup Time</label>
                    <input type="text" name="pickup_time" value="<?php echo $row['Pickup Time']; ?>">
                </div>
                <div class="container">
                    <label>Pickup Date</label>
                    <input type="text" name="pickup_date" value="<?php echo $row['Pickup Date']; ?>">
                </div>
                <div class="container">
                    <label>Pickup Location</label>
                    <input type="text" name="pickup_location" value="<?php echo $row['Pickup Location']; ?>">
                </div>
                <div class="container">
                    <label>Number of Passengers</label>
                    <input type="text" name="num_passengers" value="<?php echo $row['Number of Passengers']; ?>">
                </div>
                <div>
                    <input type="submit" value="Edit" class="editbutton">
                </div>
            </form>
            </fieldset>
        </body>
    </html>