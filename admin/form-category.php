<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
        <link rel="stylesheet" href="../bootstrap-5.1.3/css/bootstrap.min.css">
  </head>
  <body>

    <?php
    require_once "../config/connect.php";
      if(isset($_POST['submit'])){

          $title = $_POST['title'];
          $desc = $_POST['desc'];

          $temp = explode('.',$_FILES['pic_file']['name']);
          $pic = round(microtime(true)) . '.' . end($temp);

          if(move_uploaded_file($_FILES['pic_file']['tmp_name'], 'images/category/' .$pic)){

          $sql = "INSERT INTO `tb_category`(`category_id`, `category_name`, `description`, `picture`)
                  VALUES (NULL,'$title','$desc','$pic')";
          $query = $connection->query($sql);

          if($query){
              echo "<script>alert('สำเร็จ');</script>";
          }else {
              echo "<script>alert('ไม่สำเร็จ');</script>";
          }
        }
      }

     ?>

     <div class="container">
       <h1 align="center">Category Form</h1>

       <form class="" action="" method="post"  enctype="multipart/form-data">
       <div class="form-group">
         <label for="">Name</label>
         <input type="text" name="title" id="title" class="form-control" value="" required>
       </div>
       <div class="form-group">
         <label for="">Description</label>
         <input type="text" name="desc" id="desc" class="form-control" value="" required>
       </div>
       <div class="form-group">
         <label for="">Picture</label>
         <input type="file" name="pic_file"  id="pic_file"  class="form-control" value="">
       </div>

       <div class="form-group" align="center">
         <button type="submit" name="submit" class="btn btn-primary">Submit</button>
       </div>

     </form>
     </div>

  </body>
</html>
