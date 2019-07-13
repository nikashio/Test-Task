<?php
  include 'includes/header.php';
 ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="main.js"></script>
    <div class="form-container">
        <h1>Submit Form</h1>
        <form action="database/insert.php" method="post" >
        <div class="txtb">
          <label>First Name :</label>
          <input id="firstName"  type="text" name="firstName" placeholder="First Name" >
        </div>

        <div class="txtb">
          <label>Last Name :</label>
          <input id="lastName" type="text" name="lastName" placeholder="Last Name" >
        </div>

        <div class="txtb">
          <label>Emal :</label>
          <input id="email" type="text" name="email" placeholder="Email" >
        </div>
        <input  id="submit" type="submit" name="submit" value="Send" >
      </form>
       <p class="form-message"></p>
    </div>
    <?php
      include 'includes/footer.php';
     ?>
