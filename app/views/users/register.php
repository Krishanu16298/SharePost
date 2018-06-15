<?php require_once APPROOT.'/views/include/header.php';?>
<?php require_once APPROOT.'/views/include/navbar.php';?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Create an account</h2>
                <p>Please fill out this form to register with us</p>
                <form action="<?php echo URLROOT;?>/users/register" method="post">
                    <div class="form-group">
                        <label for="name">Name : <sup>*</sup></label>
                        <input type="text" name="name" value="<?php echo $data['name']?>" class="form-control <?php echo (!empty($data['name_error']))?'is-invalid':''?>">
                        <span class="invalid-feedback"><?php echo $data['name_error']?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email : <sup>*</sup></label>
                        <input type="email" name="email" value="<?php echo $data['email'];?>" class="form-control <?php echo (!empty($data['email_error']))?'is-invalid':''?>">
                        <span class="invalid-feedback"><?php echo $data['email_error']?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password : <sup>*</sup></label>
                        <input type="password" name="password" value="<?php echo $data['password'];?>" class="form-control <?php echo (!empty($data['pass_error']))?'is-invalid':''?>">
                        <span class="invalid-feedback"><?php echo $data['name_error']?></span>
                    </div>
                    <div class="form-group">
                        <label for="conpass">Confirm Password : <sup>*</sup></label>
                        <input type="password" name="conpass" value="<?php echo $data['confirm'];?>" class="form-control <?php echo (!empty($data['conpass_error']))?'is-invalid':''?>">
                        <span class="invalid-feedback"><?php echo $data['conpass_error']?></span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Register" class="btn btn-success btn-block">
                        </div>
                        <div class="col">
                            <a href="<?php echo URLROOT?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once APPROOT.'/views/include/footer.php';?>