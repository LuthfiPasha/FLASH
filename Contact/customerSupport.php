<!--Luthfi-->

<!DOCTYPE html>
<html>
    <head>
        <title>Customer Support Portal</title>
        <link rel="stylesheet" href="styles/customerSupport.css">
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
                 <li> <a href="#">BOOK A RIDE</a>  </li>
                 <li> <a href="../About Us/AboutUs.php">ABOUT US</a>  </li>
                 <li> <a href="contact.php">CONTACT US</a> </li>
                 <li> <a href="faq.php">FAQs</a> </li>
                 <li> <a href="../Home/homepage.php">LOGOUT</a> </li>
            </ul>

         </div>
    </div>
    
    <?php
      //Display the updated record
      if (isset($_POST['edit-btn'])) {
        $inquiryID = $_POST["inquiryID"];

        $sql = "SELECT inquiryID,f_name, l_name, email, phoneNo, message, inquiryID FROM contact WHERE inquiryID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $inquiryID);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
          // Fetch the row
          $row = $result->fetch_assoc();
        } else {
          echo "Item not found!";
          exit;
        }
      }

        //Update code for contact
      if(isset($_POST["update-btn"])){
        $id = $_POST["ID"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $phone = $_POST["ContactNo"];
        $email = $_POST["email"];
        $message = $_POST["message"];
          
        $sql ="UPDATE contact SET f_name='$fname', l_name='$lname', email='$email', phoneNo='$phone', message='$message' WHERE inquiryID=$id";
          
        if($conn ->query($sql)){
          echo '<script>
                alert("Updated Successfully");
                window.location.href = "customerSupport.php";
            
              </script>';
        }
        else { //display the message and navigate back to page
          echo '<script>
                alert("Error: ".$conn->error);
                    window.location.href = "customerSupport.php";
              </script>';
          }
          
        }

        // Delete code for Contact
        if (isset($_POST['delete-btn'])) {
          $deleteId = $_POST['inquiryID'];
          $stmt = $conn->prepare("DELETE FROM contact WHERE inquiryID= ?");
          $stmt->bind_param("i", $deleteId);  //i denotes the integer
                      
          if ($stmt->execute()) {
              echo '<script>
                    alert("Record deleted successfully");
                      window.location.href = "customerSupport.php";
                  </script>';
        } else {
              echo '<script>
                    alert("Error: ' . $conn->error . '");
                    window.location.href = "customerSupport.php";
                  </script>';
          }
      }
      

        //Insert a FAQ Record
        if(isset($_POST["add-faq-btn"])){
          $FAQid = $_POST["faqid"];
          $question = $_POST['FAQquestion'];
          $answer = $_POST['answer'];
   
           $sql = "INSERT INTO faq(question, answer,questionID) VALUES (?,?,?)";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param('ssi', $question, $answer,$FAQid);
          
          if ($stmt->execute()) { //display the message and navigate back to page
            echo '<script>
                    alert("Inserted Successfully");
                    window.location.href = "customerSupport.php"; 
            
                </script>';
          }
          else { //display the message and navigate back to page
            echo '<script>
                    alert("Error: ".$conn->error);
                    window.location.href = "customerSupport.php";
              </script>';
          }
          
        }


        //Display FAQ updated record
     if (isset($_POST['edit-faq-btn'])) {
       $editid = $_POST["questionID"];
   
       // Fetch the inquiry from the database
       $sql = "SELECT questionID,question,answer FROM faq WHERE questionID= ?";
       $stmt = $conn->prepare($sql);
       $stmt->bind_param("i", $editid);
       $stmt->execute();
       $result = $stmt->get_result();
       
       if ($result->num_rows > 0) {
         // Fetch the row
         $row = $result->fetch_assoc();
       } else {
         echo "Item not found!";
         exit;
       }
     }
   
     //Update code for FAQ
     if(isset($_POST["update-faq-btn"])){
       $FAQid = $_POST["faqid"];
       $question = $_POST['FAQquestion'];
       $answer = $_POST['answer'];
   
       $sql = "UPDATE faq SET question = ?, answer = ? WHERE questionID = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('ssi', $question, $answer, $FAQid);
   
      if ($stmt->execute()) {
         echo '<script>
                       alert("Updated Successfully");
                       window.location.href = "customerSupport.php";
         
               </script>';
       }
       else { //display the message and navigate back to page
         echo '<script>
                       alert("Error: ".$conn->error);
                       window.location.href = "customerSupport.php";
             </script>';
       }
   
     }

    ?> 

<script>  
  //delete confirmation function
  function confirmDelete() {
      return confirm("Are you sure you want to delete this message?");
  }

  //Clear function function
  function clearForm(formId) {
    document.getElementById(formId).reset();
    document.querySelectorAll(`#${formId} input, #${formId} textarea`).forEach(input => input.value = '');
  }

</script>
                

            
<div class="container">

  <div class="main-body">
        <div class="Welcome-card">
        <h2>Dashboard</h2>
        <div class="welcome-block">
            <h1>Welcome to Customer Support Portal</h1>
            <h3><?php echo isset($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : 'Guest'; ?>!</h3>
        </div>
        </div>

        <!--Reply or Edit reply form-->
    <div class="contact-faq-form">   
        <div class="form-section">
        <form id="userForm" action="customerSupport.php" method="POST">
        <h2>Update an Inquiry</h2>  
            <div class="inquiryid">
              <label for="ID" class="form-label">Inquiry ID</label>
              <input type="text" class="form-control" id="ID" name="ID" value="<?php echo htmlspecialchars($row['inquiryID'] ?? ''); ?>" required>
            </div>
            <div class="form-divison">
            <div class="firstname">
              <label for="fname" class="form-label">First Name</label>
              <input type="text" class="form-control" id="fname" name="fname" value="<?php echo htmlspecialchars($row['f_name'] ?? ''); ?>" required>
            </div>
            <div class="lastname">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lname" name="lname" value="<?php echo htmlspecialchars($row['l_name'] ?? ''); ?>" required>
            </div>
            </div>
            <div class="form-divison"> 
            <div class="contact">
              <label for="ContactNo" class="form-label">Contact Number</label>
              <input type="text" class="form-control" id="ContactNo" pattern="[0-9]{10}" name="ContactNo"  value="<?php echo htmlspecialchars($row['phoneNo'] ?? ''); ?>" required>
            </div>
            <div class="email">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($row['email'] ?? ''); ?>" required>
            </div>
            <div class="message">
              <label for="message" class="form-label">Message</label>
              <textarea rows = "5"  id="message" name ="message" class = "form-control" autocomplete="off" required><?php echo htmlspecialchars($row['message'] ?? ''); ?></textarea>
            </div>
          </div>
          <div>
            <button type="submit" class="edit-btn" name="update-btn">Update</button>
            <button type="button" class = "reset-btn" onclick="return clearForm('userForm');">Clear</button>
          </div>
        </form>
      </div>


      <!--FAQ form-->
      <div class="form-section">
        <form id="FAQForm" action="customerSupport.php" method="POST" >
        <h2>Update or Add FAQ</h2>
          <div class="form-divison">
            <div class="faq-id">
              <label for="FAQID" class="form-label">Question ID</label>
              <input type="text" class="form-control" id="faqid" name="faqid" value="<?php echo htmlspecialchars($row['questionID'] ?? ''); ?>">
            </div>
            <div class="faq-question">
              <label for="question" class="form-label">Question</label>
              <input type="text" class="form-control" id="question" name="FAQquestion"  value="<?php echo htmlspecialchars($row['question'] ?? ''); ?>"  required>
            </div>
          </div>
            <div class="faq-answer">
              <label for="answer" class="form-label">Answer</label>
              <textarea rows = "7" id="answer" name ="answer" class = "form-control" required><?php echo htmlspecialchars($row['answer'] ?? ''); ?></textarea>
            </div>
          <div class="button-align">
            <button type="submit" class="faq-btn" name="add-faq-btn">Add</button>
            <button type="submit" class="faq-btn" name="update-faq-btn">Update</button>
            <button type="button" class = "reset-faq-btn" onclick="return clearForm('FAQForm');">Clear</button>
          </div>
        </form>
      </div>
    </div>

   


<?php
  // Delete code for FAQ
  if (isset($_POST['delete-faq-btn'])) {
      $FAQdeleteId = $_POST['questionID'];
      $stmt = $conn->prepare("DELETE FROM faq WHERE questionID= ?");
      $stmt->bind_param("i", $FAQdeleteId);  //i denotes the integer
                  
      if ($stmt->execute()) {
          echo '<script>
                alert("Record deleted successfully");
                  window.location.href = "customerSupport.php";
              </script>';
    } else {
          echo '<script>
                alert("Error: ' . $conn->error . '");
                window.location.href = "customerSupport.php";
              </script>';
      }
  }
    ?>

      <div class="table_lists">
            <div class="list1">
                <div class="row">
                    <h4>INQUIRES</h4>
                </div>
                <div class="table-responsive">
                <table>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>E-mail</th>
                        <th>Contact Number</th>
                        <th>Message</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                <tbody class="table-bord">
                        <?php  //displaying the inqiries
                            $sql = "SELECT f_name,l_name,email,phoneNo,message,inquiryID FROM contact";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->get_result();  

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['inquiryID']) . "</td>"; 
                                    echo "<td>" . htmlspecialchars($row['f_name']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['l_name']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['phoneNo']) . "</td>";
                                    echo '<td class="wrap-text">' . htmlspecialchars($row['message']) . '</td>';

                                    //Edit Button for contact
                                    echo '<td>
                                            <form action="customerSupport.php" method="POST">
                                                <input type="hidden" name="inquiryID" value="' . htmlspecialchars($row['inquiryID']) . '">
                                                <input type="hidden" name="edit-btn" value="' . htmlspecialchars($row['inquiryID']) . '">
                                                <button type="submit" class="edit-btn">Edit</button>
                                            </form>
                                            </td>';

                                    //delete button for contact
                                    echo '<td>
                                            <form action="customerSupport.php" method="POST" onsubmit="return confirmDelete();">
                                                <input type="hidden" name="inquiryID" value="' . htmlspecialchars($row['inquiryID']) . '">
                                                <input type="hidden" name="delete-btn" value="' . htmlspecialchars($row['inquiryID']) . '">
                                                <button type="submit" class="delete-btn">Delete</button>
                                            </form>
                                            </td>';
                                    echo "</tr>";
                                }
                            }
                        ?>
                </tbody>
                </table>
                </div>
                </div>

            <!--FAQ-->
            <div class="list2">
            <div class="row">
                <h4>FAQ</h4>
            </div>
            <table class="table-bord">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php  //displaying the FAQ
                            $sql = "SELECT questionID,question,answer FROM faq";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->get_result();  

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['questionID']) . "</td>"; 
                                    echo "<td>" . htmlspecialchars($row['question']) . "</td>";
                                    echo "<td class='wrap-faq'>" . htmlspecialchars($row['answer']) . "</td>";
                              
                                    //Edit Button for faq
                                    echo '<td>
                                            <form action="customerSupport.php" method="POST">
                                                <input type="hidden" name="questionID" value="' . htmlspecialchars($row['questionID']) . '">
                                                <input type="hidden" name="edit-faq-btn" value="' . htmlspecialchars($row['questionID']) . '">
                                                <button type="submit" class="edit-btn">Edit</button>
                                            </form>
                                            </td>';

                                    //delete button for faq
                                    echo '<td>
                                            <form action="customerSupport.php" method="POST" onsubmit="return confirmDelete();">
                                                <input type="hidden" name="questionID" value="' . htmlspecialchars($row['questionID']) . '">
                                                <input type="hidden" name="delete-faq-btn" value="' . htmlspecialchars($row['questionID']) . '">
                                                <button type="submit" class="delete-btn">Delete</button>
                                            </form>
                                            </td>';
                                    echo "</tr>";
                                }
                            }
                        ?>
                </tbody>
            </table>
            </div>
        </div>
      </div>

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

         <img src = "images/IMG1.png">

 

        <ul>
            
            <li> <a href="#">TERMS&nbsp;AND&nbsp;CONDITIONS</a>  </li> </ul>
            <ul>

            <li> <a href="#">PRIVACY&nbsp;POLICY</a>  </li>

        </ul>  
    </div>

</div>
</body>
</html>