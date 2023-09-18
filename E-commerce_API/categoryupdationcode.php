<?php
require 'projectdatabase.php';
$s1 = mysqli_real_escape_string($con, (int)($_GET['id']));

$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);

  

  // Sanitize.
 
  $name = mysqli_real_escape_string($con, trim($request->name));
  $photo = mysqli_real_escape_string($con, trim($request->photo));
  $description = mysqli_real_escape_string($con, trim($request->description));
  

  $sql = "UPDATE `category` SET `Name`='$name',`Photo`='$photo',`Description`='$description' WHERE `Id` = '$s1' LIMIT 1";

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