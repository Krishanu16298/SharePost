<?php require_once APPROOT.'/views/include/header.php';?>
<?php require_once APPROOT.'/views/include/navbar.php';?>
<div class="container">
    <a href="<?php echo URLROOT.'/posts';?>" class="btn btn-light mt-3"><i class="fas fa-arrow-left"></i> Back</a>
    <hr>
    <?php flash('del_err');?>
    <h2><?php echo $data['post']->title?></h2>
    <div class="bg-secondary text-white p-2 mb-3">
        Written By <?php echo $data['user']->name;?> on <?php echo $data['post']->created_at;?>
    </div>
    <p><?php echo $data['post']->body;?></p>
    <?php if($data['post']->user_id == $_SESSION['user_id']):?>
        <hr>
        <div class="row">
            <div class="col">
                <a href="<?php echo URLROOT;?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-dark"><i class="fas fa-pencil-alt"></i> Edit</a>
            </div>
            <div class="col text-right">
                <form action="<?php echo URLROOT;?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i> Delete</button>
                </form>
            </div>
        </div>
    <?php endif;?>
</div>
<?php require_once APPROOT.'/views/include/footer.php';?>