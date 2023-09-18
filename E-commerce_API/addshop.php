<?php
require 'projectdatabase.php';
move_uploaded_file($_FILES["photo"]["tmp_name"], "images/" . $_FILES["photo"]["name"]);
$s=$_FILES["photo"]["name"];
$s1=$_POST["id"];
$s2=$_POST["name"];
$s3=$_POST["location"];
$s4=$_POST["phone"];
$s5=$_POST["email"];
$s6=$_POST["username"];
$s7=$_POST["password"];

  $sql = "INSERT INTO `shop`(`Id`,`Name`,`Photo`,`Location`,`Phoneno`,`Email`,`Username`) VALUES ('{$s1}','{$s2}','{$s}','{$s3}','{$s4}','{$s5}','{$s6}')";

  $sql1 = "INSERT INTO `login`(`Username`,`Password`,`Category`) VALUES ('{$s6}','{$s7}','Shop')";
  if(mysqli_query($con,$sql))
  {
    http_response_code(201);
    $shop = [
      'id' => $s1,
      'name' => $s2,
      'photo'=>$s,
      'location' => $s3,
      'phone' => $s4,
      'email' => $s5,
      'username' => $s6,
      
     
    ];
    echo json_encode($shop);
  }
  else
  {
    http_response_code(422);
  }
  if(mysqli_query($con,$sql1))
  {
    http_response_code(201);
    $login = [
      'username' => $s6,
      'password' => $s7,
      'category' => $category,
    
      
     
    ];
    echo json_encode($login);
  }
  else
  {
    http_response_code(422);
  }


?>