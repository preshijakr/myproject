<?php
require 'projectdatabase.php';

// Get the posted data.
$s1 = mysqli_real_escape_string($con, (int)($_GET['productid']));

$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);

  

  // Sanitize.
 
  $name = mysqli_real_escape_string($con, trim($request->name));
  $stock = mysqli_real_escape_string($con, trim($request->stock));
  $price = mysqli_real_escape_string($con, trim($request->price));
  $photo = mysqli_real_escape_string($con, trim($request->photo));
  $description = mysqli_real_escape_string($con, trim($request->description));
  

  // Update.
  $sql = "UPDATE `product` SET `Name`='$name',`Stock`='$stock',`Price`='$price',`Photo`='$photo',`Description`='$description' WHERE `Productid` = '$s1' LIMIT 1";

  if(mysqli_query($con, $sql))
  {
    http_response_code(204);
  }
  else
  {
    return http_response_code(422);
  }  
}
?>