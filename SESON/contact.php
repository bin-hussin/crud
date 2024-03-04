<?php
$title = 'Contact';

require_once 'template/header.php';
require_once 'includes/uploder.php';
require 'classes/services.php';

$s = new Service;


$services = $conn->query("select id, name , price from services order by name")->fetch_all(MYSQLI_ASSOC);





?>
<?php isset($_SESSION['visitor_name']) ? $sender = $_SESSION['visitor_name'] : $sender?>
<p>
    <?php echo $sender ?>
</p>

<?php if($s->available){?>

<!--<a href="<//?php echo $uploadDir?>/keyboard.jpg">Download</a>-->



<h1>Contact Us</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">

    <div class="form-group">
        <label for="name">Your name</label>
        <input type="text" name="name" id="name" value="<?php echo $name?>" class="form-control"
            placeholder="Your Name" />
        <span class="text-danger"><?php echo $nameError?></span>
    </div>

    <div class="form-group">
        <label for="email">Your Email</label>
        <input type="email" name="email" id="name" value="<?php echo $email?>" class="form-control"
            placeholder="Your Email" />
        <span class="text-danger"><?php echo $emailError?></span>
    </div>

    <div class="form-group">
        <label for="documents">Your documents</label>
        <input type="file" name="documents" id="name" value="<?php echo $documents?>" />
        <span class="text-danger"><?php echo $documentsError?></span>
    </div>
    <div class="form-group">
        <label for="services">Services</label>
        <select name="services" id="services" class="form-control" >
            <?php foreach($services as $service) { ?>
                <option value = "<?php echo $services['id']?>">
                <?php echo $service['name']?>
                (<?php echo $service['price']?> SAR)
                
            </option>
                <?php }?>
        </select>
    </div>


    <div class="form-group">
        <label for="messge">Your massage</label>
        <textarea name="message" id="name" value="<?php echo $messge?>" class="form-control"
            placeholder="Your message"></textarea>
        <span class="text-danger"><?php echo $messageError?></span>
    </div>
    <button class="btn btn-warning">Send</button>






</form>

<?php } ?>
<?php require_once 'template/footer.php' ?>