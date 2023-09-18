<?php
/**
 * Returns the list of policies.
 */
require 'projectdatabase.php';


// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);


  // Validate.
 

  // Sanitize.
  $username = mysqli_real_escape_string($con, trim($request->username));
  $password = mysqli_real_escape_string($con, trim($request->password));




$policies = [];

$sql = "SELECT Category,Username FROM login WHERE Username ='$username' and Password='$password' LIMIT 1";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $policies[$i]['Username']    = $row['Username'];
    $policies[$i]['Category'] = $row['Category'];
   
    $i++;
  }

  echo json_encode($policies);
}
else
{
  http_response_code(404);
}
}
?>