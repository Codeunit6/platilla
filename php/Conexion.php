<?php
$servername="j21q532mu148i8ms.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$database="ukqta8jmtg9yksvx";
$username="xigzg2y0m9gtxd2r";
$password="mz36jcg0yygiuw7u";

$conn=mysqli_connect($servername,$username, $password, $database);

if (!$conn){
    die("Connection failed" .mysqli_connect_error());
}
?>