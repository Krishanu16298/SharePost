<?php require_once APPROOT.'/views/include/header.php';?>
<?php require_once APPROOT.'/views/include/navbar.php';?>
<section class="text-center" id="showcase1">
    <h1><?php echo $data['title'];?></h1>
    <p><?php echo $data['desc'];?></p>
    <br><br>
    <h3><?php echo APPVERSION;?></h3>
</section>
<?php require_once APPROOT.'/views/include/footer.php';?>