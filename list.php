<?php 
require('db_connection.php');

if(isset($_POST['submit'])){
    $name=trim($_POST['name']);
    $email=trim($_POST['email']);
    $phone=trim($_POST['phone']);
    $address=trim($_POST['address']);

    $sql1="INSERT INTO `details` (`name`, `email`, `phone`) VALUES ('$name', '$email', '$phone')";
    $query1=mysqli_query($con,$sql1);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>





<div class="container">

<!-- <a href="entry_process.php"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" id="add">Add Entries</button> -->
    
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" id="add">Add Entries</button>

<!-- <?php 
    if($_POST['m'] == 2){
        echo '<div class="alert alert-danger" role="alert">
        email already in use
      </div>';
    }
?> -->


    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Add Entries</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="entry_process.php">
            <div class="form-group">
                <label for="formGroupExampleInput">Name</label>
                <input type="text" id="name" name="name" class="form-control" id="formGroupExampleInput" placeholder="Enter Full Name" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Email</label>
                <input type="email" id="email" name="email" class="form-control" id="formGroupExampleInput2" placeholder="Enter Email" maxlength="30" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Phone</label>
                <input type="tel" id="phone" name="phone" class="form-control" id="formGroupExampleInput2" placeholder="Enter Phone" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput3">Address</label>
                <input type="address" id="address" name="address" class="form-control" id="formGroupExampleInput3" placeholder="Enter Address" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" value="Submit Data" id="submit" name="submit" class="btn btn-primary">
        </div>
        </div>
        </form>
    </div>
    </div>
    <form method="POST" action="entry_process.php">
    <table class="table table-dark" align=center>
        <thead>
            <tr>
            <th scope="col">Sl No.</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
              
            $sql="SELECT * FROM `details`";
            $query=mysqli_query($con,$sql);
            $i=1;
            if(mysqli_num_rows($query)>0){
                while($fetch=mysqli_fetch_array($query)){
            ?>
            <tr>
            <th scope="row"><?php echo $i ; ?></th>
            <td><?= $fetch['name'] ?></td>
            <td><?= $fetch['email'] ?></td>
            <td><?= $fetch['phone'] ?></td>
          
            
            <td><a href="entry_process.php?edit=<?= $fetch['id'] ?>"><button type="button" class="btn btn-info">Edit</button></a> <a href="entry_process.php?dlt=<?= $fetch['id'] ?>"><button type="button" name= "delete" class="btn btn-danger">Delete</button></a></td>
            </tr>
        </tbody>
        </form>
        <?php 
             $i++; } 
              }else{
        ?>
         <td colspan="5" align=center>No Record Found!</td>
        <?php } ?>
    </table>
</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</html>