<?php

require 'projectdatabase.php';

$policies = [];
$sql = "SELECT Productid,Name,Stock,Price,Photo,Description,Categoryid,Shopid FROM product";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $policies[$i]['Productid'] = $row['Productid'];
    $policies[$i]['Name'] = $row['Name'];
    $policies[$i]['Stock'] = $row['Stock'];
    $policies[$i]['Price'] = $row['Price'];
    $policies[$i]['Photo'] = $row['Photo'];
    $policies[$i]['Description'] = $row['Description'];
    $policies[$i]['Categoryid'] = $row['Categoryid'];
    $policies[$i]['Shopid'] = $row['Shopid'];
    
    $i++;
  }

  echo json_encode($policies);
 
}
else
{
  http_response_code(404);
}
?>