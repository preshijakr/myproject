<?php

require 'projectdatabase.php';

$policies = [];
$s1 = mysqli_real_escape_string($con, (int)($_GET['product']));
$sql = "SELECT Shopid, Productid,Name,Photo,Stock,Price,Description FROM product where Categoryid='$s1'";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $policies[$i]['Shopid'] = $row['Shopid'];
    $policies[$i]['Productid'] = $row['Productid'];
    $policies[$i]['Name'] = $row['Name'];
    $policies[$i]['Photo'] = $row['Photo'];
    $policies[$i]['Stock'] = $row['Stock'];
    $policies[$i]['Price'] = $row['Price'];
    $policies[$i]['Description'] = $row['Description'];
    
    
    $i++;
  }

  echo json_encode($policies);
 
}
else
{
  http_response_code(404);
}
?>