<?php require_once APPROOT.'/views/include/header.php';?>
<?php require_once APPROOT.'/views/include/navbar.php';?>
<div class="container">
    <a href="<?php echo URLROOT.'/posts';?>" class="btn btn-light mt-3"><i class="fas fa-arrow-left"></i> Back</a>
    <div class="card card-body bg-light mt-3">
        <?php flash('adderror');?>
        <h2>Add Post</h2>
        <p>Create a post with this form</p>
        <form action="<?php echo URLROOT;?>/posts/add" method="post">
            <div class="form-group">
                <label for="title">Title : <sup>*</sup></label>
                <input type="text" name="title" value="<?php echo $data['title'];?>" class="form-control <?php echo (!empty($data['title_error']))?'is-invalid':''?>">
                <span class="invalid-feedback"><?php echo $data['title_error']?></span>
            </div>
            <div class="form-group">
                <label for="body">Body : <sup>*</sup></label>
                <textarea name="body" class="form-control <?php echo (!empty($data['body_error']))?'is-invalid':''?>"><?php echo $data['body'];?></textarea>
                <span class="invalid-feedback"><?php echo $data['body_error']?></span>
            </div>
            <input type="submit" value="Submit" class="btn btn-success">
        </form>
    </div>
</div>
<?php require_once APPROOT.'/views/include/footer.php';?>