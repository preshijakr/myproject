<?php
/**
 * Returns the list of policies.
 */
require 'projectdatabase.php';

$policies = [];
$s1 = mysqli_real_escape_string($con, trim($_GET['c']));


$sql = "SELECT * FROM shop where Username='$s1'";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $policies[$i]['Id']    = $row['Id'];
    $policies[$i]['Name'] = $row['Name'];
    $policies[$i]['Location'] = $row['Location'];
    $policies[$i]['Phoneno'] = $row['Phoneno'];
    $policies[$i]['Email'] = $row['Email'];
    $policies[$i]['Photo'] = $row['Photo'];
    $policies[$i]['Username'] = $row['Username'];
    
    
    
    $i++;
  }

  echo json_encode($policies);
 
}
else
{
  http_response_code(404);
}
?>