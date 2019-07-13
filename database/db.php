<?php

class oopCrud{
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


?>
