<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container">
    <h1><a href="<?php echo URLROOT;?>"><?php echo SITENAME;?></a></h1>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars" style="color:#08f;font-size:30px;"></i>
  </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" style="color:#08f;" href="<?php echo URLROOT;?>">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo URLROOT;?>/pages/about" style="color:#08f;" class="nav-link">About</a>
                </li>
                <?php if(isset($_SESSION['user_id'])):?>
                <li class="nav-item">
                    <a href="<?php echo URLROOT;?>/posts" style="color:#08f;" class="nav-link">Posts</a>
                </li>
                <li>
                    <a href="<?php echo URLROOT;?>/users/logout" style="color:#08f;" class="nav-link">Logout</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a href="<?php echo URLROOT;?>/users/register" style="color:#08f;" class="nav-link">Register</a>
                </li>
                <li>
                    <a href="<?php echo URLROOT;?>/users/login" style="color:#08f;" class="nav-link">Login</a>
                </li>
                <?php endif;?>
            </ul>
        </div>
        </div>
    </nav>