<?php 
require('db_connection.php');

if(isset($_POST['submit'])){
    $name=trim($_POST['name']);
    $email=trim($_POST['email']);
    $phone=trim($_POST['phone']);
  
    $sql2="SELECT * FROM `details` WHERE `email` = '$email' ";
    $query2=mysqli_query($con,$sql2);
    if(mysqli_num_rows($query2)>0){
        header('location:list.php?m=2');
    }else{
        $sql1="INSERT INTO `details` (`name`, `email`, `phone`) VALUES ('$name', '$email', '$phone')";
        $query1=mysqli_query($con,$sql1);
    
        header('location:list.php');
    }
    
    
}
if(isset($_GET['dlt'])){
    $dlt_id=$_REQUEST['dlt'];
    echo $dlt_id;
    $sql="DELETE FROM `details` WHERE id= '$dlt_id'";
    $query=mysqli_query($con,$sql);

    header('location:list.php');

}
if(isset($_GET['edit'])){
    $edit_id=$_REQUEST['edit'];
    $sql5="SELECT * FROM `details` WHERE id = '$edit_id' ";
    $query5=mysqli_query($con,$sql5);
    if(mysqli_num_rows($query5)>0){
       while($fetch5=mysqli_fetch_array($query5)){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<form method="POST" action="edit.php">
            <div class="form-group">
                <label for="formGroupExampleInput">Name</label>
                <input type="text" id="name" name="name" class="form-control"  placeholder="Enter Full Name" value="<?= $fetch5['name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Email</label>
                <input type="email" id="email" name="email" class="form-control"  placeholder="Enter Email" maxlength="30" value="<?= $fetch5['email'] ?>" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Phone</label>
                <input type="tel" id="phone" name="phone" class="form-control"  placeholder="Enter Phone" value="<?= $fetch5['phone'] ?>" required>
            </div>
         
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="edit.php?edt=<?= $fetch['id'] ?>"><button type="submit" value="Submit Data" id="submit" name="edit1" class="btn btn-primary">Submit</button>
            <div class="form-group">
              <label for="formGroupExampleInput3">Address</label>
              <input type="Address" id="name" id="" class="form-control" placeholder="Enter Address" value="<?= $fetch5['address']?>"required>
              
            </div>
        </form>
</div>  
</body>
</html>

<?php

}
}
}



?>

