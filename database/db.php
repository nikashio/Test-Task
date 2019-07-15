<?php

class Dbh{
 private $host="localhost";
 private $user="root";
 private $db="db";
 private $pass="";
 private $conn;

 public function __construct(){
 $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->pass);
 }

 public function insertData($firstName,$lastName,$email){
   $sql = "INSERT INTO info SET firstName=:firstName,lastName=:lastName,email=:email";
   $q = $this->conn->prepare($sql);
   $q->execute(array(':firstName'=>$firstName,':lastName'=>$lastName,':email'=>$email));
   return true;
 }
}

class sendmail{

  private  $to = 'test@developers-alliance.com';
  private  $subject = 'Submit form detailes';

  public function phpsendmail($firstName,$lastName,$email){
    $message = "first Name :".$firstName;
    $message .= "\r\nLast Name :".$lastName;
    $message .= "\r\nEmail Address :".$email;
    $header = 'From:'.$firstName.'<'.$email.'>\n';
    return   mail($this->to, $this->subject,  $message,$header);

  }

}



?>
