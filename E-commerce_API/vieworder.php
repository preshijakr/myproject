<?php

require 'projectdatabase.php';

$policies = [];
$sql = "SELECT Orderid,Productid,Customerid,Quantity,Orderdate FROM tblorder";

if($result = mysqli_query($con,$sql))
{
  $o = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $policies[$o]['Orderid'] = $row['Orderid'];
    $policies[$o]['Productid'] = $row['Productid'];
    $policies[$o]['Customerid'] = $row['Customerid'];
    $policies[$o]['Quantity'] = $row['Quantity'];
    $policies[$o]['Orderdate'] = $row['Orderdate'];
    
    
    
    $o++;
  }

  echo json_encode($policies);
 
}
else
{
  http_response_code(404);
}
?>