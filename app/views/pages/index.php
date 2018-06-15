<?php require_once APPROOT.'/views/include/header.php';?>
<?php require_once APPROOT.'/views/include/navbar.php';?>
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-3"><?php echo $data['title'];?></h1>
            <p class="lead"><?php echo $data['desc'];?></p>
        </div>
    </div>
<?php require_once APPROOT.'/views/include/footer.php';?>