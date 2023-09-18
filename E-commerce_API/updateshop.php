<?php

require 'projectdatabase.php';

$policies = [];
$s1 = mysqli_real_escape_string($con, (int)($_GET['id']));






$sql = "SELECT Id,Name,Location,Phoneno,Email FROM shop WHERE Id='$s1'";


if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $policies[$i]['Id'] = $row['Id'];
    $policies[$i]['Name'] = $row['Name'];
    $policies[$i]['Location'] = $row['Location'];
    $policies[$i]['Phoneno'] = $row['Phoneno'];
    $policies[$i]['Email'] = $row['Email'];
    
    
    $i++;
  }

  echo json_encode($policies);
 
}
else
{
  http_response_code(404);
}
?>