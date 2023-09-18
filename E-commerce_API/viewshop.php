<?php

require 'projectdatabase.php';

$policies = [];
$sql = "SELECT Id,Name,Photo,Location,Phoneno,Email FROM shop";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $policies[$i]['Id'] = $row['Id'];
    $policies[$i]['Name'] = $row['Name'];
    $policies[$i]['Photo'] = $row['Photo'];
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