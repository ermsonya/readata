<?php include ("path.php");

include ("app/controllers/posts.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href ="style.css">
    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f0425bf235.js" crossorigin="anonymous"></script>
    <title>Lets read</title>
  </head>
  <body>
   
  <?php include 'app/include/header.php';?>

   <!-- блок главный-->

<div class="container">
 
<div class="content row">
  <h2 class="popular"> Popular books</h2>
<!-- блок sidebar--> <?php foreach ($postsAdm as $key => $post): ?>
<div class="popbooks row">
  <div class="firstb col-12 col-md-3">
 
  <img src="<?=BASE_URL.'images/books/'.$post['img1']?>" class="img-thumbnail" alt="<?=$post['title']?>"></div>
    <div class="firstb col-12 col-md-3">
    <img src="<?=BASE_URL.'images/books/'.$post['img2']?>" class="img-thumbnail" alt="<?=$post['title']?>"></div>
  
    <div class="firstb col-12 col-md-3">
    <img src="<?=BASE_URL.'images/books/'.$post['img3']?>" class="img-thumbnail" alt="<?=$post['title']?>"></div>
    
    <div class="firstb col-12 col-md-3">
    <img src="<?=BASE_URL.'images/books/'.$post['img4']?>" class="img-thumbnail" alt="<?=$post['title']?>"></div>
     
    <?php endforeach;?>
</div></div>
</div>


<?php include 'app/include/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>