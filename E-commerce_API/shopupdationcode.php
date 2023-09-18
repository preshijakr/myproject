<?php
require 'projectdatabase.php';

// Get the posted data.
$s1 = mysqli_real_escape_string($con, (int)($_GET['id']));

$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);

  

  // Sanitize.
 
  $name = mysqli_real_escape_string($con, trim($request->name));
  $location = mysqli_real_escape_string($con, trim($request->location));
  $phone = mysqli_real_escape_string($con, trim($request->phone));
  $email = mysqli_real_escape_string($con, trim($request->email));
  

  // Update.
  $sql = "UPDATE `shop` SET `Name`='$name',`Location`='$location',`Phoneno`='$phone',`Email`='$email' WHERE `Id` = '$s1' LIMIT 1";

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