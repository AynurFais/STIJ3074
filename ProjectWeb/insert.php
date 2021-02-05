<?php
include 'includes/db.php';

if(isset($_POST['insert']))
{
    $name         = clean($_POST['name']);
    $address      = clean($_POST['address']);
    $no_phone     = clean($_POST['no_phone']);
    $image_name   = $_FILES['image']['name'];
    $image        = $_FILES['image']['tmp_name'];

    $location     = "images/".$image_name;


    move_uploaded_file($image, $location);


    $query = "INSERT INTO residents (name,address,no_phone,image) VALUES ('".escape($name)."', '".escape($address)."','".escape($no_phone)."' , '$image_name')";

    $result = mysqli_query($con,$query);

    if($result == true)
    {
        header("Location:index.php");
    }
    else
    {
        die('error' . mysqli_error($conn));
    }

}


?>
<div class="container">

    <div class="jumbotron text-center">
        <h2>INFORMATION HEAD OF THE FAMILY IN TAMAN MUTIARA </h2>
    </div>
    <br>
<div class="row">
<div class="col-md-12">
    
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="name">Address:</label>
        <input type="text" name="address" class="form-control" placeholder="Enter Address">
    </div>
    <div class="form-group">
        <label for="name">No Phone:</label>
        <input type="text" name="no_phone" class="form-control" placeholder="Enter No Phone">
    </div>
    <div class="form-group">
        <label for="name">Image:</label>
        <input type="file" class="btn btn-primary" name="image" class="form-control" placeholder="Enter email">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Insert data" name="insert">
    </div>
</form>
</div>
</div>

</div>
