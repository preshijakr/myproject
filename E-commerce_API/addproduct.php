<?php
require 'projectdatabase.php';

move_uploaded_file($_FILES["photo"]["tmp_name"], "images/" . $_FILES["photo"]["name"]);
$s=$_FILES["photo"]["name"];
$s1=$_POST["shid"];
$s2=$_POST["cateid"];
$s3=$_POST["pid"];
$s4=$_POST["name"];
$s5=$_POST["stock"];
$s6=$_POST["price"];
$s7=$_POST["des"];



  $sql = "INSERT INTO `product`(`Shopid`,`Categoryid`,`Productid`,`Name`,`Photo`,`Stock`,`Price`,`Description`) VALUES ('{$s1}','{$s2}','{$s3}','{$s4}','{$s}','{$s5}','{$s6}','{$s7}')";

  if(mysqli_query($con,$sql))
  {
    http_response_code(201);
    $product = [
      'shopid' => $s1,
      'categoryid' => $s2,
      'productid' => $s3,
      'name' => $s4,
      'photo' => $s,
      'stock' => $s5,
      'price' => $s6,
      'description' => $s7,
      
      
      
     
    ];
    echo json_encode($product);
  }
  else
  {
    http_response_code(422);
  }


?>