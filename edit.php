<?php 
require('db_connection.php');
if(isset($_GET['edt'])){
    $edt_id=$_REQUEST['edt'];
    $name=trim($_POST['name']);
    $email=trim($_POST['email']);
    $phone=trim($_POST['phone']);
    $address=trim($_POST['trim']);

    $sql2="SELECT * FROM `details` WHERE `email` = '$email' ";
    $query2=mysqli_query($con,$sql2);
    if(mysqli_num_rows($query2)>0){
        header('location:list.php?m=2');
    }else{
        $sql1="UPDATE `details` SET `name` = '$name', `email` = '$email', `phone` = '$phone',`address`='$address' WHERE `id` = '$edt_id' ";
        $query1=mysqli_query($con,$sql1);
    
        header('location:list.php');
    }
}
?>