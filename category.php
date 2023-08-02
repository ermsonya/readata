<?php include "path.php";
 include "app/controllers/topics.php";
$posts=selectAll('posts',['id_topic'=>$_GET['id']]);
$category=selectOne('topics',['id'=>$_GET['id']]);
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
  <div class ="main-content col-md-9 col-12">
    <h2>Categoty <?=$category['name']; ?></h2>
    <?php foreach ($posts as $post): ?>

    <div class="post row">
      <div class="img col-12 col-md-4">
        <img src="<?=BASE_URL.'images/posts/'.$post['img']?>" class="img-thumbnail" alt="<?=$post['title']?>">
      </div>
<div class="post-text col-12 col-md-8">
  <h3>
    <a href="<?=BASE_URL.'single.php?post='.$post['id'];?>"><?=substr($post['title'],0,120).'...'?></a>
  </h3>
  <!-- <i class="far fa-user"></i><?=$post['username'];?> -->
  <br>
  <i class="far fa-calendar"></i><?=$post['created_data'];?>
  <p class="preview-text">
  <?=mb_substr($post['content'],0,180,'UTF-8').'...'?>
  </p>
</div>
    </div>
    <?php endforeach;?>
</div>
<!-- блок sidebar-->
<div class="sidebar col-md-3 col-12">
  <div class="section search">
    <form action="search.php" method="post">
      <input type="text" name="search-term" class="text-input" placeholder="Search..">
        </form>
  </div>
<div class="section topics">
<h3>Categories</h3>
<ul>
<?php foreach ($topics as $key => $topic): ?>
  <li><a href="<?=BASE_URL .'category.php?id='.$topic['id']; ?>"><?=$topic['name']; ?></a></li>
  <?php endforeach;?>
</ul>
</div>
</div></div>
</div>
<!-- блок footer-->
<?php include 'app/include/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>