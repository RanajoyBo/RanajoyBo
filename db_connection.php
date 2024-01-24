<?php 
$db_name='sayan_db';
$username='root';
$password='';
$server='localhost';

$con = mysqli_connect($server,$username,$password,$db_name);
if(!$con){
   echo "error";

}
?>