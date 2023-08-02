
<?php include ("../../path.php");
include ("../../app/controllers/posts.php");

?>
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
             <div class="row title-table">
                <h2>Adding post</h2 >
             </div> 
             <div class="row add-post">
             <p><?=$errMsg?></p>  </div>
             <form  action="edit.php" method = "post" enctype="multipart/forn-data">
            <input type="hidden" name="id" value="<?=$id;?>">
             <div class="col mb-4">
             <input name="title" value="<?=$post['title'];?>" type="text" class="form-control" placeholder="title" aria-label="Post's name">
             </div>
             <div class="col">
  <label for="editor" class="form-label">Content</label>
  <textarea name="content" id="editor" class="form-control"  rows="6"><?=$post['content'];?></textarea>
</div>
<div class="input-group col mb-4">
  <input name="img" type="file" class="form-control" id="inputGroupFile02">
  <label class="input-group-text" for="inputGroupFile02">Upload author</label>
</div>
<div class="input-group col mb-4">
  <input name="img1" type="file" class="form-control" id="inputGroupFile021">
  <label class="input-group-text" for="inputGroupFile021">Pic1</label>
</div>
<div class="input-group col mb-4">
  <input name="img2" type="file" class="form-control" id="inputGroupFile022">
  <label class="input-group-text" for="inputGroupFile022">pic2</label>
</div>
<div class="input-group col mb-4">
  <input name="img3" type="file" class="form-control" id="inputGroupFile023">
  <label class="input-group-text" for="inputGroupFile023">pic3</label>
</div>
<div class="input-group col mb-4">
  <input name="img4" type="file" class="form-control" id="inputGroupFile024">
  <label class="input-group-text" for="inputGroupFile024">pic4</label>
</div>
<select name="topic" class="form-select mb-2" aria-label="Default select example">
  <?php foreach ($topics as $key => $topic): ?>
    <option value="<?=$topic['id'];?>"><?=$topic['name'];?>
    <?php endforeach;?>
</select>
<div class="form-check">
    <?php if(empty($publish)&&($publish==0)): ?>
    <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked"  >
    <label class="form-check-label" for="flexCheckChecked">  Publish</label>
    <?php else: ?>
        <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked"  checked>
    <label class="form-check-label" for="flexCheckChecked">  Publish</label>
    <?php endif; ?>
</div>
<div class="col  col-6">
    <button name="edit_post"class="btn btn-primary" type="submit">Add post</button>
  </div>
            
             </form>
             </div> 
         </div>
     </div>

     </div>
<!-- блок footer-->

<?php include '../../app/include/footer.php';?>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script src="../../scripts.js"></script>
  </body>
</html>