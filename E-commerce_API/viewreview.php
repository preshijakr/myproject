<?php

require 'projectdatabase.php';

$policies = [];
$s1 = mysqli_real_escape_string($con, (int)($_GET['product']));
$sql = "SELECT Reviewid, Productid,Customerid,Review,Reviewdate FROM tblreview where Productid='$s1'";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $policies[$i]['Reviewid'] = $row['Reviewid'];
    $policies[$i]['Productid'] = $row['Productid'];
    $policies[$i]['Customerid'] = $row['Customerid'];
    $policies[$i]['Review'] = $row['Review'];
    $policies[$i]['Reviewdate'] = $row['Reviewdate'];
    
    
    
    $i++;
  }

  echo json_encode($policies);
 
}
else
{
  http_response_code(404);
}
?>