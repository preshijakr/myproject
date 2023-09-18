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
  $reviewid = mysqli_real_escape_string($con,(int)($request->reviewid));
  $productid = mysqli_real_escape_string($con, (int)($request->productid));
  $customerid = mysqli_real_escape_string($con, (int)($request->customerid));
  $review = mysqli_real_escape_string($con, trim($request->review));
  $reviewdate = mysqli_real_escape_string($con, trim($request->reviewdate));
  //$photo = mysqli_real_escape_string($con, trim($request->photo));


  // Create.
  $sql = "INSERT INTO `tblreview`(`Reviewid`,`Productid`,`Customerid`,`Review`,`Reviewdate`) VALUES ('{$reviewid}','{$productid}','{$customerid}','{$review}','{$reviewdate}')";

  if(mysqli_query($con,$sql))
  {
    http_response_code(201);
    $tblreview = [
      'reviewid' => $reviewid,
      'productid' => $productid,
      'customerid' => $customerid,
      'review' => $review,
      'reviewdate' =>$reviewdate,
     
    ];
    echo json_encode($tblreview);
  }
  else
  {
    http_response_code(422);
  }

}
?>