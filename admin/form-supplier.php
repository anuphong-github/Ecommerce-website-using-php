<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
        <link rel="stylesheet" href="../bootstrap-5.1.3/css/bootstrap.min.css">
  </head>
  <body>

    <?php
    include "../config/connect.php";
      if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
          $sql = "INSERT INTO `tb_supplier`(`supplier_id`, `supplierTitle`, `supplierFname`, `supplierLname`)
                VALUES (NULL,'$title','$fname','$lname')";
          $query = $connection->query($sql);
          if($query){
              echo "<script>alert('สำเร็จ');</script>";
          }else {
              echo "<script>alert('ไม่สำเร็จ');</script>";
          }
        }

     ?>

     <div class="container">
       <h1 align="center">Supplier Form</h1>
       <form class="" action="" method="post">
       <div class="form-group">
         <label for="">Supplier Title</label>
         <input type="text" name="title" id="title" class="form-control" value="" required>
       </div>
       <div class="form-group">
         <label for="">Supplier First name</label>
         <input type="text" name="fname" id="fname" class="form-control" value="" required>
       </div>
       <div class="form-group mb-2">
         <label for="">Supplier Last name</label>
         <input type="text" name="lname" id="lname" class="form-control" value="" required>
       </div>
       <div class="form-group" align="center">
         <button type="submit" name="submit" class="btn btn-primary">Submit</button>
       </div>
     </form>
     </div>
  </body>
</html>
