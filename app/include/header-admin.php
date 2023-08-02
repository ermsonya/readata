<header class="container-fluid">
      <div class="container">
      <div class="row">
      <div class="col-4">
      <h1>
        <a href="<?php echo BASE_URL?>">Readata</a></h1>
      </div>
      <nav class="col-8">
      <ul><?php if(isset($_SESSION['id'])):?>
      <li> <a href="#"><?php echo $_SESSION['login'];?></a> </li>
        <li><a href="<?php echo  BASE_URL."logout.php"; ?>">Exit</a></li>
<?php endif;?>
      </ul>
    </nav>
      </div>
      </div>
      </header> 