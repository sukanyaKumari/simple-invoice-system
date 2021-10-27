<?php 
$connect = mysqli_connect("localhost","root","","invoice");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>invoice system</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body class="bg-light">   
<nav class="navbar navbar-expand-lg navbar-dark bg-info shadow">
    <a class="navbar-brand text-white mx-auto h1">Invoice System</a>
</nav>
<div class="container mt-4">
<div class="row">
    <div class="col-lg-6 mx-auto">
    <?php
        $id = $_GET['id'];
        $calling = mysqli_query($connect,"select * from totals where id ='$id'");
        $row = mysqli_fetch_array($calling);
    ?>
   
   <form  method="post">
     name: <input type="text" name="name" value="<?php echo $row['name']?>" class="form-control"><br>
     contact: <input type="number" name="contact" value="<?php echo $row['contact']?>" class="form-control"><br>
     brand: <input type="text" name="brand" value="<?php echo $row['brand']?>" class="form-control"><br>
     Price: <input type="number" name="price" value="<?php echo $row['price']?>" class="form-control"><br>
     gst: <input type="number" name="gst" value="<?php echo $row['gst']?>" class="form-control"><br>
     discount: <input type="number" name="discount" value="<?php echo $row['discount']?>" class="form-control"><br>
     <input type="submit" name="send" class="btn btn-success"><br>
 </form>
   <?php
if(isset($_POST['send'])){
    
    $edit_id = $_GET['id'];
    $name=$_POST['name'];
    $contact=$_POST['contact'];
    $brand=$_POST['brand'];
    $price=$_POST['price'];
    $gst=$_POST['gst'];
    $discount=$_POST['discount'];
    $query = "UPDATE totals SET
    name='$name',
    contact='$contact',
    brand='$brand',
    price='$price',
    gst='$gst',
    discount='$discount' where id ='$edit_id'";
    $query = mysqli_query($connect,$query);
    if($query){
            echo "<script>alert('update hogya') </script>";
            echo "<script>window.open('index.php','_self') </script>";
        }
        else{
            echo "<script>alert('fail') </script>";
        }
        
    }
    
    ?>
    </div>
    
   
</div>
  </div>  
</body>
</html>

    