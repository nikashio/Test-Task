<?php
  include_once('db.php');

// check if submit buttonwas pressed
if (isset($_POST['submit'])) {
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];

//Send signup form details to test@developers-alliance.com
$to = 'test@developers-alliance.com';
$subject = 'Submit form detailes';
$message = "First Name :".$firstName."\r\nLast Name :".$lastName."\r\nEmail Address :".$email;

//Header
$header = 'From:'.$firstName.'<'.$email.'>\n';
mail($to, $subject,  $message,$header);



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
    $obj=new oopCrud();
    $obj->insertData($firstName,$lastName,$email);
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
