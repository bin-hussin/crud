<?php
use IMAP\Connection;

$title = 'Home Page';
require "config/connection.php"; 
require_once 'template/header.php';
require 'classes/services.php';
require 'config/app.php'; 
$service = new service;

$_SESSION['sender_name'] = 'Ahmedz';




?>

<?php if ($service->available) {
?>
    <h1>Wlecome to our website </h1>

    <?php $pouducts = $conn->query("SELECT * FROM pouducts")->fetch_all(MYSQLI_ASSOC) ?>
    <div class="row"> 
          <?php foreach ($pouducts as $product) { ?>
        <div class="col-md-4">
        <div class="card mb-4 pb-2 "> 
        <div class="costem-card-image" style="background-image: url(<?php echo $config['app_url'].$product['image'] ?>)"></div>
        <div class="card-body text-center">
            <div class= "card-title" style="color:blueviolet ;"> <?php echo $product['name'] ?></div>
                <div>description: <?php echo $product['description'] ?></div>
                    <div class="text-success"><?php echo $product['price'] ?> SAR</div>
                    </div>
            </div>
        </div>
        
        
    <?php } ?>
 </div>











<?php }
require_once 'template/footer.php' ?>