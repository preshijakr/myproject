<?php

require 'projectdatabase.php';

// Extract, validate and sanitize the id.
$s1 = mysqli_real_escape_string($con, (int)($_GET['s']));



// Delete.
$sql = "DELETE FROM `shop` WHERE Id='$s1'";

if(mysqli_query($con, $sql))
{
  http_response_code(204);
}
else
{
  return http_response_code(422);
}
?>