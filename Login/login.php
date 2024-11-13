<?php 
require 'dbh.inc.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Flash Rentals</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/login.css">
</head>

<body>

  <div class="top">
    <div class="nav">
      <img class="logo" src="images/LOGO.png" alt="LOGO">

      <ul class="ul">
        <li> <a href="../Home/homepage.php">HOME</a> </li>
        <li> <a href="../Reservation/Reservation1.php">BOOK A RIDE</a> </li>
        <li> <a href="../About Us/AboutUs.php">ABOUT US</a> </li>
        <li> <a href="../contact/customersupport.php">CONTACT US</a> </li>
        <li> <a href="../contact/faq.php">FAQs</a> </li>
        <li> <a href="../Signup/signup.php">SIGN UP</a> </li>
      </ul>
    </div>
  </div>

  <!-- Main Content with Background Image and Login Form -->
  <section class="main-container">
    <!-- Login Section -->
    <div class="login-container">
      <h2>Login</h2>
      <form action="login.inc.php" method="POST">
        <label for="role">Login as:</label>
        <select id="role" name="role" class="role" required>
          <option value="user">User</option>
          <option value="admin">Admin</option>
          <option value="Customer Support Agent">Customer Support Agent</option>
        </select>

        <label for="username">Email Address / Username</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>



        <button type="submit">LOGIN</button>
        <p class="signup-text">Don't have an account? <a href="../Signup.signup.php">Sign Up</a></p>
      </form>
    </div>
  </section>

  <div class="bottom">
    <hr>

    <div class="b1">
      <ul>
        <li><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.798467128214!2d79.97036957448275!3d6.914682818494989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae256db1a6771c5%3A0x2c63e344ab9a7536!2sSri%20Lanka%20Institute%20of%20Information%20Technology!5e0!3m2!1sen!2slk!4v1727451676831!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></li>
        <li> FLASH RENTAL (PVT) LTD </li>
        <li> <a href="#">info@flashrental.com</a> </li>
        <li>7817, HAZELAND LN, BOSTON, USA.</li>
      </ul>

      <ul>
        <li><b>QUICK LINKS</b></li>
        <li> <a href="../Home/homepage.php">HOME</a> </li>
        <li> <a href="../Reservation/Reservation1.php">BOOK A RIDE</a> </li>
        <li> <a href="../About Us/AboutUs.php">ABOUT US</a> </li>
        <li> <a href="../contact/customersupport.php">CONTACT US</a> </li>
        <li> <a href="../contact/faq.php">FAQs</a> </li>
        <li> <a href="../Signup/signup.php">SIGN UP</a> </li>
      </ul>

      <ul>
        <li> <img src="images/sm.png"></li>
        <li> SERVICE&nbsp;HOURS&nbsp;:&nbsp;MON&nbsp;-&nbsp;SUN&nbsp;24&nbsp;HRS </li>
        <li>CONTACT&nbsp;US&nbsp;:&nbsp;+1-234-567-8919</li>
      </ul>
    </div>

    <div class="b2">
      <img src="images/LOGO.png">
      <ul>
        <li> <a href="#">TERMS&nbsp;AND&nbsp;CONDITIONS</a> </li>
        <li> <a href="#">PRIVACY&nbsp;POLICY</a> </li>
      </ul>
    </div>
  </div>

  <!-- JavaScript to handle login -->
  <script>
    function handleLogin(event) {
      event.preventDefault();
      const username = document.getElementById('username').value;
      const password = document.getElementById('password').value;
      const role = document.getElementById('role').value;

      if (username && password) {
        if (role === 'admin') {
          // Handle admin login
          alert('Admin login successful for: ' + username);
        } else {
          // Handle user login
          alert('User login successful for: ' + username);
        }
      } else {
        alert('Please enter your username, password, and role');
      }
    }
  </script>

</body>

</html>
