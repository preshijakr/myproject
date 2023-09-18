<?php
require 'projectdatabase.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);


  // Validate.
 

  // Sanitize.
  $orderid = mysqli_real_escape_string($con,(int)($request->orderid));
  $productid = mysqli_real_escape_string($con,(int)($request->productid));
  $customerid = mysqli_real_escape_string($con, (int)($request->customerid));
  $quantity = mysqli_real_escape_string($con, (int)($request->quantity));
  $orderdate = mysqli_real_escape_string($con, trim($request->orderdate));
  $status = mysqli_real_escape_string($con, trim($request->status));
  //$photo = mysqli_real_escape_string($con, (int)($request->photo));


  // Create.
  $sql = "INSERT INTO `tblorder`(`Orderid`,`Productid`,`Customerid`,`Quantity`,`Orderdate`,`Status`) VALUES ('{$orderid}','{$productid}','{$customerid}','{$quantity}','{$orderdate}','{$status}')";

  if(mysqli_query($con,$sql))
  {
    http_response_code(201);
    $tblorder = [
      'orderid' => $orderid,
      'productid' => $productid,
      'customerid' => $customerid,
      'quantity' => $quantity,
      'date' =>$orderdate,
      'pending' =>$status,
     
    ];
    echo json_encode($tblorder);
  }
  else
  {
    http_response_code(422);
  }

}
?>