<?php require_once APPROOT.'/views/include/header.php';?>
<?php require_once APPROOT.'/views/include/navbar.php';?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <?php flash('register_success');flash('login_error');?>
                <h2>Login</h2>
                <form action="<?php echo URLROOT;?>/users/login" method="post">
                    <div class="form-group">
                        <label for="email">Email : <sup>*</sup></label>
                        <input type="email" name="email" value="<?php echo $data['email'];?>" class="form-control <?php echo (!empty($data['email_error']))?'is-invalid':''?>">
                        <span class="invalid-feedback"><?php echo $data['email_error']?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password : <sup>*</sup></label>
                        <input type="password" name="password" value="<?php echo $data['password'];?>" class="form-control <?php echo (!empty($data['pass_error']))?'is-invalid':''?>">
                        <span class="invalid-feedback"><?php echo $data['pass_error']?></span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Login" class="btn btn-success btn-block">
                        </div>
                        <div class="col">
                            <a href="<?php echo URLROOT?>/users/register" class="btn btn-light btn-block">Or Register here!</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once APPROOT.'/views/include/footer.php';?>