<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../bootstrap-5.1.3/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <h1 align="center">Add product</h1>
      <?php
      include "../config/connect.php";
      require_once "functions/check-form-product.php";


       ?>
       <form class="" action="" method="post" enctype="multipart/form-data">

      <div class="">
        <label for="">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="" required>
      </div>
      <div class="">
        <label for="">Unit price</label>
        <input type="text" name="unitPrice" id="unitPrice" class="form-control"  value="">
      </div>

      <div class="">
        <label for="">Discount</label>
        <input type="text" name="discount" id="discount" class="form-control" value="">
      </div>
      <div class="">
        <label for="">address</label>
        <textarea name="address" id="address" rows="8" cols="80" class="form-control" ></textarea>
      </div>
      <div class="">
        <label for="">Thumbnail</label>
        <input type="file" name="thumbnail" id="thumbnail" class="form-control" value="" required>
      </div>
      <div class="">
        <label for="">Picture 1</label>
        <input type="file" name="p1" id="p1" class="form-control" value="" required>
      </div>
      <div class="">
        <label for="">Picture 2</label>
        <input type="file" name="p2" id="p2" class="form-control" value="" required>
      </div>
      <div class="">
        <label for="">Picture 3</label>
        <input type="file" name="p3" id="p3" class="form-control" value="" required>
      </div>
      <div class="">
        <label for="">Supplier</label>
        <input type="text" name="supplier" id="supplier" class="form-control" value="">
      </div>
      <div class="mb-2">
        <label for="">Category</label>
        <input type="text" name="category" id="category"  class="form-control" value="">
      </div>
      <div class="mb-2">
        <label for="">Description</label>
        <textarea name="desc" class="form-control" rows="8" cols="80"></textarea>
      </div>
      <div class="" align="center">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      <button type="reset" name="reset" class="btn btn-danger">Reset</button>
      </div>
    </form>
    </div>
  </body>
</html>
