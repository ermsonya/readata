<header class="container-fluid">
      <div class="container">
      <div class="row">
      <div class="col-4">
      <h1>
        <a href="<?php echo BASE_URL?>">Readata</a></h1>
      </div>
      <nav class="col-8">
      <ul>
      <li><a href="<?php echo BASE_URL?>">Main</a> </li>
      <li><a href="<?php echo  BASE_URL."about.php"; ?>">About us</a> </li>
      <li><a href="<?php echo  BASE_URL."recommend.php"; ?>">Recommended books</a> </li>
      <li><?php if(isset($_SESSION['id'])):?>
        <a href="#"><?php echo $_SESSION['login'];?></a>
      <ul>
      <?php if ($_SESSION['admin']):?>
        <li><a href="<?=  BASE_URL."admin/users/create.php"; ?>">Admin tools</a></li>
        <?php endif;?>
        <li><a href="<?php echo  BASE_URL."logout.php"; ?>">Exit</a></li>
      </ul> 
<?php else: ?> 
  <li><a href="<?php echo  BASE_URL."log.php"; ?>">Log in</a> </li>

        <?php endif;?>
      </ul>
    </nav>
      </div>
      </div>
      </header>