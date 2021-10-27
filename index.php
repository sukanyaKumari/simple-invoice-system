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
    <div class="col-lg-3 ml-4 mr-2">
   <form action="" method="post">
     name: <input type="text" name="name" class="form-control"><br>
     contact: <input type="number" name="contact" class="form-control"><br>
     brand: <input type="text" name="brand" class="form-control"><br>
     Price: <input type="number" name="price" class="form-control"><br>
     gst: <input type="number" name="gst" class="form-control"><br>
     discount: <input type="number" name="discount" class="form-control"><br>
     <input type="submit" name="send" class="btn btn-success"><br>
 </form>
    </div>
    <div class="col-lg-8 ml-4">
        <table class="table shadow bg-white border">
            <tr class="bg-dark text-white">
                <th>id</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Gst</th>
                <th>Discount</th>
                <th>Total</th>
                <th colspan="2" class="text-center">Action</th>
                
            </tr>
            <?php
            $calling = mysqli_query($connect,"SELECT * from totals");
            while($row = mysqli_fetch_array($calling)):?>
               <tr>
                   <td><?php echo $row['id'];?></td>
                   <td><?php echo $row['name'];?></td>
                   <td><?php echo $row['contact'];?></td>
                   <td><?php echo $row['brand'];?></td>
                   <td><?php echo $row['price'];?></td>
                   <td><?php echo ($row['price']*18)/100;?></td>
                   
                   <td><?php echo $row['discount'];?></td>
                   <td><?php echo $row['price']+($row['price']*18)/100-$row['discount'];?></td>
                   <td><a href="index.php?del=<?php echo $row['id'];?>" class="btn btn-danger btn-sm form-control">Delete</a></td>
                   <td><a href="edit.php?id=<?php echo $row['id'];?>" class="btn btn-success btn-sm form-control">Edit</a></td>

               </tr>
                
              
              <?php endwhile; ?>
        </table>
    </div>
</div>
  </div>  
</body>
</html>
<?php
if(isset($_POST['send'])){
    $name=$_POST['name'];
    $contact=$_POST['contact'];
    $brand=$_POST['brand'];
    $price=$_POST['price'];
    $gst=$_POST['gst'];
    $discount=$_POST['discount'];
    $query =mysqli_query($connect,"INSERT INTO  totals(name,contact,brand,price,gst,discount) value ('$name','$contact','$brand','$price','$gst','$discount')");
    if($query){
            echo "<script>alert('success')</script>";
         echo"<script>window.open('index.php','_self')</script>";
        }
        else{
            echo "<script>alert('fail')</script>";
        }
        
    }
    
    ?>
    
<?php
if(isset($_GET['del'])){
    $id = $_GET['del'];
    $query = "DELETE FROM totals where id ='$id'";
    $run = mysqli_query($connect,$query);
    if($run){
        echo"<script>window.open('index.php','_self')</script>";
    }
}
?>