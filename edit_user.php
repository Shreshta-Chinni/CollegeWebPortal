<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<br><br>
<div class="container">
  <h2>Edit User</h2>

  <?php
  $conn = mysqli_connect ('localhost','root','root','webster',3308);

  if(isset($_GET['edit'])){
     $edit_id =$_GET['edit'];

     $select = "SELECT * FROM user WHERE user_id='$edit_id'";
     $run = mysqli_query($conn,$select);
     $row_user = mysqli_fetch_array($run);
              $user_name = $row_user['user_name'];
               $user_email = $row_user['user_email'];
              $user_password = $row_user['user_password'];
              $user_details = $row_user['user_details'];
  }
 ?>


  <form action="" method="post" >
    <div class="form-group">
      <label>Name:</label>
      <input type="text" class="form-control" value="<?php echo $user_name; ?>" placeholder="Name" name="user_name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" value="<?php echo $user_email; ?>" id="email" placeholder="Enter email" name="user_email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" value="<?php echo $user_password;?>" id="pwd" placeholder="Enter password" name="user_password">
    </div>
    <div class="form-group">
      <label>Details:</label>
      <textarea class="form-control" name="user_details"><?php echo $user_details; ?>" </textarea>
    </div>
    <div class="form-group form-check">
      
    <input type="submit" name="insert-btn" class="btn btn-primary" />
    <a href="http://localhost/webster_php/add_user.php" class="btn btn-primary">AddUser</a>

  </form>

<?php
   $conn = mysqli_connect ('localhost','root','root','webster',3308);

   /*if(mysqli_connect_errno()){
    echo "Connection fail";

   }else{
    echo "Connection Ok!!!!";
   }*/
   if(isset($_POST['insert-btn'])){
   $euser_name = $_POST['user_name'];
   $euser_email = $_POST['user_email'];
   $euser_password = $_POST['user_password'];   
   $euser_details = $_POST['user_details'];

   $update = "UPDATE user SET user_name='$euser_name',user_email='$euser_email',user_password='$euser_password',user_details='$euser_details'WHERE user_id='$edit_id'";

   $run_update = mysqli_query($conn,$update);
   if ($run_update===true){
    echo "Data has been updated";
   }
   else{
    echo "Sorry try again";
   }
    
}

?>
<a class="btn btn-primary" href="view_user.php">View User </a>




</div>

</body>
</html>
