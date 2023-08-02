<?php include ("path.php");
include SITE_ROOT.'/app/database/db.php';
$post=selectAllFromPostsWithUsersOnSingle('posts','users',$_GET['post']);
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
  <div class ="main-content col-md-12 col-12">
    <h2> <?php echo $post['title'];?></h2>
    <i class="far fa-user"></i><?=$post['username'];?>
  <br>
  <i class="far fa-calendar"></i><?=$post['created_data'];?>
    <div class="post row">
      <div class="imgmain col-12 col-md-4">
        <img src="<?=BASE_URL.'images/posts/'.$post['img']?>" class="img-thumbnail" alt="<?=$post['title']?>">
      </div>
<div class="post-text col-12 col-md-8">
<?=$post['content'];?></div> </div></div>
</div>
<div class="container">
<div class="content row">
  <h2 class="popular"> Popular books</h2>
<div class="popbooks row">
  <div class="firstb col-12 col-md-3">
  <img src="<?=BASE_URL.'images/books/'.$post['img1']?>" class="img-thumbnail" alt="<?=$post['title']?>"></div>
    <div class="firstb col-12 col-md-3">
    <img src="<?=BASE_URL.'images/books/'.$post['img2']?>" class="img-thumbnail" alt="<?=$post['title']?>"></div>
    <div class="firstb col-12 col-md-3">
    <img src="<?=BASE_URL.'images/books/'.$post['img3']?>" class="img-thumbnail" alt="<?=$post['title']?>"></div>
    <div class="firstb col-12 col-md-3">
    <img src="<?=BASE_URL.'images/books/'.$post['img4']?>" class="img-thumbnail" alt="<?=$post['title']?>"></div> 
</div></div></div></div>
<?php include 'app/include/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>