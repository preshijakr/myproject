<?php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:PUT,GET,POST,DELETE");
header("Access-Control-Allow-Headers:Origin,X-Requested-With,Content-Type,Accept");
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS',"");
define('DB_NAME','ecommerce');
function connect()
{
    $connect=
    mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    mysqli_set_charset($connect,"utf8");
    return $connect;
}
$con = connect();
?>