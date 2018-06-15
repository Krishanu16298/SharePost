<?php require_once APPROOT.'/views/include/header.php';?>
<?php require_once APPROOT.'/views/include/navbar.php';?>
    <div class="container">
    <div class="row mt-3 mb-4 text-center">
        <div class="col-md-6">
            <h1>Posts</h1>        
        </div>
        <div class="col-md-6">
            <a href="<?php echo URLROOT.'/posts/add';?>" class="btn btn-primary">
                <i class="fas fa-pencil-alt"></i> Add Post
            </a>
        </div>
    </div>
    <?php flash('post_msg');?>
    <?php foreach($data['posts'] as $post):?>
        <div class="card card-body mb-3">
            <h4 class="card-title"><?php echo $post->title;?></h4>
            <div class="bg-light p-2 mb-3 blockquote blockquote-footer">
                Written by <?php echo $post->name;?> on <?php echo $post->postCreated;?>
            </div>
            <div class="card-text ml-2 mr-2"><?php echo $post->body;?></div>
            <a href="<?php echo URLROOT;?>/posts/show/<?php echo $post->postId;?>" class="btn btn-dark btn-block mt-4 mb-4">More</a>
        </div>
    <?php endforeach;?>
    </div>
<?php require_once APPROOT.'/views/include/footer.php';?>