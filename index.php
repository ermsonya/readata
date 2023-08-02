<?php include "path.php";
 include "app/controllers/topics.php";
$posts=selectAllFromPostsWithUsersOnIndex('posts', 'users');
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
    <!-- блок карусели-->
    <div class="container">
      <div class="row">
        <h2 class="slider-title ">Popular writers</h2>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/rembo2.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Arthur Rimbaud</h5>
            <p>Arthur Rimbaud was a French poet known for his transgressive and surreal themes and for his influence on modern literature and arts, prefiguring surrealism. </p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/Murakami.jpeg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Haruki Murakami</h5>
            <p>Haruki Murakami is a Japanese writer. His novels, essays, and short stories have been bestsellers in Japan and internationally, with his work translated into 50 languages and having sold millions of copies outside Japan</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/remark.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Erich Maria Remarque</h5>
            <p>To the biographer and student of literature, Erich Maria Remarque, who has been called the "recording angel of the Great War," was an enigma, a man rife with contradictions and contrasts.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</div>
   <!-- блок главный-->
<div class="container">
<div class="content row">
  <div class ="main-content col-md-9 col-12">
    <h2>Recently added</h2>
    <?php foreach ($posts as $post): ?>
    <div class="post row">
      <div class="img col-12 col-md-4">
        <img src="<?=BASE_URL.'images/posts/'.$post['img']?>" class="img-thumbnail" alt="<?=$post['title']?>">
      </div>
<div class="post-text col-12 col-md-8">
  <h3>
    <a href="<?=BASE_URL.'single.php?post='.$post['id'];?>"><?=substr($post['title'],0,120).'...'?></a>
  </h3>
  <i class="far fa-user"></i><?=$post['username'];?>
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