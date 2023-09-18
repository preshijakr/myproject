<?php
require 'projectdatabase.php';

move_uploaded_file($_FILES["photo"]["tmp_name"], "images/" . $_FILES["photo"]["name"]);

$s=$_FILES["photo"]["name"];
$id=$_POST["a"];
$name=$_POST["b"];
$description=$_POST["c"];
  $sql = "INSERT INTO `category`(`Id`,`Name`,`Photo`,`Description`) VALUES ('{$id}','{$name}','{$s}','{$description}')";

  if(mysqli_query($con,$sql))
  {
    http_response_code(201);
    $student = [
      
      'a' => $id,
      'b' => $name,
      'photo' => $s,
      'c' => $description,
      
     
    ];
    echo json_encode($student);
  }
  else
  {
    http_response_code(422);
  }


?>