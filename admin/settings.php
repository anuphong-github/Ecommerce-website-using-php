<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Setting</title>
    <link rel="stylesheet" href="../bootstrap-5.1.3/css/bootstrap.min.css">
  </head>
  <body>
    <?php
      include "../config/connect.php";
     ?>
    <?php
    if(isset($_POST['clean_product'])){
      $sql = "DELETE FROM `tb_product` WHERE 1";
      $query = $connection->query($sql);
      $set_id  = "ALTER TABLE `tb_product` AUTO_INCREMENT = 1";
      $query_set = $connection->query($set_id);
      if($query){
        echo "Successfully";
      }else {
        echo "Failure";
      }
    }

    if(isset($_POST['clean_picture'])){
      $sql = "DELETE FROM `tb_pictures` WHERE  1";
      $query = $connection->query($sql);
      $set_id  = "ALTER TABLE `tb_pictures` AUTO_INCREMENT = 1";
      $query_set = $connection->query($set_id);

      if($query){
        echo "Successfully";
      }else {
        echo "Failure";
      }
    }
     ?>
     <div class="container">
      <div class="row" style="padding-top:30px;">
        <div class="col">
          <form class="" action="" method="post">
            <button type="submit" class="btn btn-danger" name="clean_product">Product</button>
          </form>
        </div>
        <div class="col">
          <form class="" action="" method="post">
            <button type="submit" class="btn btn-primary" name="clean_picture">Picture</button>
          </form>
        </div>
      </div>

     </div>

  </body>
</html>
