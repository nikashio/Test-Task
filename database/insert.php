<?php
  include_once('db.php');

// check if submit buttonwas pressed
if (isset($_POST['submit'])) {
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];


// validate input data
$errorEmpty = false;
$errorEmail = false;

  if(empty($firstName) || empty($lastName) || empty($email)) {
    echo "<span class='form-error'> * Fill in all Fields!</span> ";
    $errorEmpty = true;
  }
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<span class='form-error'> * Write Valide Email address!</span> ";
    $errorEmail = true;
  }
  else {
    echo "<span class='form-success'>Form was Submited Successfuly!</span>";
    
    //insert data to databse
     $insert=new Dbh();
     $insert->insertData($firstName,$lastName,$email);

     //send mail to mailhog
     $obj=new sendmail();
     $obj->phpsendmail($firstName,$lastName,$email);
  }}
  else {
    echo "There was an Error!  ";
  }
 ?>
<script>

  // add styles to form in case of an error
  $("#firstName,#lastName,#email").removeClass("input-error");

  var errorEmpty = "<?php echo $errorEmpty; ?>";
  var errorEmail = "<?php echo $errorEmail; ?>";

  if (errorEmpty == true) {
  $("#firstName,#lastName,#email").addClass("input-error");
  }
  if(errorEmail == true){
    $("#email").addClass("input-error");
  }
  if (errorEmpty == false && errorEmail == false) {
    $("#firstName,#lastName ,#email").val("");
  }

</script>
