<?php

require 'projectdatabase.php';

$policies = [];
$sql = "SELECT Shopid,Categoryid,Productid,Name,Stock,Price,Description FROM product";

if($result = mysqli_query($con,$sql))
{
  $o = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $policies[$o]['Shopid'] = $row['Shopid'];
    $policies[$o]['Categoryid'] = $row['Categoryid'];
    $policies[$o]['Productid'] = $row['Productid'];
    $policies[$o]['Name'] = $row['Name'];
    $policies[$o]['Stock'] = $row['Stock'];
    $policies[$o]['Price'] = $row['Price'];
    $policies[$o]['Description'] = $row['Description'];
    
    
    
    $o++;
  }

  echo json_encode($policies);
 
}
else
{
  http_response_code(404);
}
?>