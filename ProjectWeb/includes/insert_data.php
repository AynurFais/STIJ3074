<?php

include 'db.php';


if(isset($_POST['insert'])){
    
    $name  = clean($_POST['name']);
    $address = clean($_POST['address']);
    $no_phone = clean($_POST['no_phone']);
    
    $query = "INSERT INTO `resident` (name,address,no_phone) VALUES ('".escape($name)."','".escape($address)."','".escape($no_phone)."') ";
    
    $result = mysqli_query($conn,$query);
    
    if($result){
        
        header('location:../index.php');
    }
    
}


?>