<?php
include 'includes/db.php';
?>

<?php 

if(isset($_GET['update'])){
    
    
    $id = $_GET['update'];
    

$query = "SELECT * FROM residents WHERE id = $id";

$result = mysqli_query($con,$query);

if(mysqli_num_rows($result) > 0){
    
    while($row = mysqli_fetch_array($result)){
        
            $name  = $row['name'];
            $address = $row['address'];
            $no_phone = $row['no_phone'];
            $image = $row['image'];

        }
    }
}

if(isset($_POST['update'])){
    

    $name         = clean($_POST['name']);
    $address       = clean($_POST['address']);
    $no_phone       = clean($_POST['no_phone']);
    $image_name   = $_FILES['image']['name'];
    $image        = $_FILES['image']['tmp_name'];

    $location     = "images/".$image_name;

    move_uploaded_file($image, $location);

    $query  = "UPDATE residents SET ";
    $query .= "name = '".escape($name)."', ";
    $query .= "address = '".escape($address)."', ";
    $query .= "no_phone = '".escape($no_phone)."', ";
    $query .= "image = '{$image_name}' ";
    $query .= "WHERE id = {$id} ";
    
    $result = mysqli_query($con,$query);
    
    if($result){
        
        header('location:index.php');
    }
    else
    {
        die('error' . mysqli_error($con));
    }
    
}

?>
<div class="container">
    <div class="jumbotron text-center">
        <h2>INFORMATION HEAD OF THE FAMILY IN TAMAN MUTIARA</h2>
    </div>
    <br>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo $name ?>">
    </div>
    <div class="form-group">
        <label for="name">Address:</label>
        <input type="text" name="address" class="form-control" placeholder="Enter Address" value="<?php echo $address ?>">
    </div>
    <div class="form-group">
        <label for="name">No Phone:</label>
        <input type="text" name="no_phone" class="form-control" placeholder="Enter No Phone" value="<?php echo $no_phone ?>">
    </div>
    <div class="form-group">
        <label for="name">Image:</label>
        <img src= "<?= "images/".$image?>" alt="" width="100px" height="100px" class="thumbnail">
        <input type="file" name="image" class="form-control" placeholder="Enter No Phone" value="<?php echo $no_phone ?>">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Update data" name="update">
    </div>
</form>

</div>
