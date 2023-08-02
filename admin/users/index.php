

<?php include ("../../path.php");?>
<?php include ("../../app/controllers/users.php");?>

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
           <a href="create.php" class="btn btn-secondary col-2">Add User</a>
           <span class="col-1"></span>
            <a href="index.php" class="btn btn-secondary col-2" >Manage Users</a>
         </div>
             <div class="row title-table">
                <h2>User management</h2 >
                 <div class="id col-1">ID</div>
                 <div class="title col-2">login</div>
                 <div class="title col-4">email</div>
                 <div class="author col-2">role</div>
                 <div class="red col-2">Management</div>
                 
             </div> 
             <?php foreach ($users as $key => $user): ?>
             <div class="row post">
                 <div class="id col-1"><?=$user['id']; ?></div>
                 <div class="title col-2"><?=$user['username']; ?></div>
                 <div class="col-4"><?=$user['email']; ?></div>
                 <?php if($user['admin']==1): ?>
                 <div class=" col-2">admin</div>
                 <?php else: ?>
                 <div class=" col-2">user</div>
                 <?php endif;?>
                 <div class="red col-1"><a href="edit.php?edit_id=<?=$user['id'];?>">edit</a></div>
                 <div class="del col-1"><a href="edit.php?delete_id=<?=$user['id'];?>">delete</a></div>
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