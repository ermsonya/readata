
<?php include ("../../path.php");?> 
<?php include ("../../app/controllers/posts.php");?>
<!doctype html>
<html lang="en"> 
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href ="../../admin.css">
    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f0425bf235.js" crossorigin="anonymous"></script>
    <title>Lets read</title>
  </head>
  <body>
  <?php include '../../app/include/header-admin.php';?>


   <!-- блок главный-->

   <div class="container">
    <div class=" row">
        <div class="sidebar col-3">
             <ul>
             <li>
             <a href="<?=  BASE_URL."admin/posts/create.php"; ?>">Posts</a>
             </li>
             <li>
             <a href="<?=  BASE_URL."admin/users/create.php"; ?>">Users</a>
             </li>  
             <li>
             <a href="<?=  BASE_URL."admin/topics/create.php"; ?>">Categories</a>
             </li>
         </ul> 
     </div>
    
       <div class="posts col-9">
         <div class="buttin row">
           <a href="create.php" class="btn btn-secondary col-2">Add Post</a>
           <span class="col-1"></span>
            <a href="index.php" class="btn btn-secondary col-2" >Manage Posts</a>
         </div>
             <div class="row title-table">
                <h2>Post management</h2 >
                 <div class="id col-1">ID</div>
                 <div class="title col-3">title</div>
              
                 <div class="author col-2">author</div>
                 <div class="red col-6">Management</div>
                 
             </div> 
             <?php foreach ($postsAdm as $key => $post): ?>

 
             <div class="row post">
                 <div class="id col-1"><?=$key+1; ?></div>
                 <div class="title col-3"><?=$post['title']; ?></div>
                 <div class="author col-2"><?=$post['username']; ?></div>
                 <div class="red col-2"><a href="edit.php?id=<?=$post['id'];?>">edit</a></div>
                 <div class="del col-2"><a href="edit.php?delete_id=<?=$post['id'];?>">delete</a></div>
                 <?php if($post['status']): ?>
                 <div class="status col-2"><a href="edit.php?publish=0&pub_id=<?=$post['id'];?>">drafts</a></div>
                 <?php else: ?>
                  <div class="status col-2"><a href="edit.php?publish=1&pub_id=<?=$post['id'];?>">published</a></div>
                  <?php endif;?>
             </div> 
             
             <?php endforeach;?>
         </div>
     </div>

     </div>
<!-- блок footer-->
<?php include '../../app/include/footer.php';?>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>