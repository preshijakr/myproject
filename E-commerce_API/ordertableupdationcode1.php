<?php
require 'projectdatabase.php';

// Get the posted data.
$s1 = mysqli_real_escape_string($con, (int)($_GET['orderid']));


  $sql = "UPDATE `tblorder` SET `Status`='Rejected' WHERE `Orderid` = '$s1' LIMIT 1";
 

  if(mysqli_query($con, $sql))
  {
    http_response_code(204);
  }
  else
  {
    return http_response_code(422);
  }  


?>