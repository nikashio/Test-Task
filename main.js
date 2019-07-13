
$(document).ready(function(){
  $("form").submit(function(event){
    event.preventDefault();
    var firstName = $("#firstName").val();
    var lastName = $("#lastName").val();
    var email = $("#email").val();
    var submit = $("#submit").val();
    $(".form-message").load("database/insert.php",{
      firstName: firstName,
      lastName: lastName,
      email: email,
      submit: submit
    });
  });
});
