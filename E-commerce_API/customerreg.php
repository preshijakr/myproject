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
  $customerid = mysqli_real_escape_string($con,(int)($request->customerid));
  $name = mysqli_real_escape_string($con, trim($request->name));
  $phone = mysqli_real_escape_string($con, trim($request->phone));
  $email = mysqli_real_escape_string($con, trim($request->email));
  $username = mysqli_real_escape_string($con, trim($request->username));
  $password = mysqli_real_escape_string($con, trim($request->password));
  $address = mysqli_real_escape_string($con, trim($request->address));
 
  
  //$photo = mysqli_real_escape_string($con, trim($request->photo));


  // Create.
  $sql = "INSERT INTO `customer`(`Customerid`,`Name`,`Phoneno`,`Email`,`Address`,`Username`) VALUES ('{$customerid}','{$name}','{$phone}','{$email}','{$address}','{$username}')";

  $sql1= "INSERT INTO `login`(`Username`,`Password`,`Category`) VALUES ('{$username}','{$password}','Customer')";
  if(mysqli_query($con,$sql))
  {
    http_response_code(201);
    $customer = [
      'id' => $customerid,
      'name' => $name,
      'phone' => $phone,
      'email' => $email,
      'address' => $address,
      'username' => $username,
      
      
     
    ];
    echo json_encode($customer);
  }
  
  if(mysqli_query($con,$sql1))
  {
    http_response_code(201);
    $login = [
      'username' => $username,
      'password' => $password,
      'category' => $category,
    ];
    echo json_encode($login);
  }
  else
  {
    http_response_code(422);
  }

}
?>