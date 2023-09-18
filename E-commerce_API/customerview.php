<?php
/**
 * Returns the list of policies.
 */
require 'projectdatabase.php';

$policies = [];
$s1 = mysqli_real_escape_string($con, trim($_GET['c']));


$sql = "SELECT * FROM customer where Username='$s1'";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $policies[$i]['Customerid']    = $row['Customerid'];
    $policies[$i]['Name'] = $row['Name'];
    $policies[$i]['Phoneno'] = $row['Phoneno'];
    $policies[$i]['Email'] = $row['Email'];
    $policies[$i]['Address'] = $row['Address'];
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