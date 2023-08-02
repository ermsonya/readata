<?php include ("path.php");
include ("app/controllers/users.php"); 
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
<!-- блок form-->
<div class="container reg-form">
<form class="row justify-content-center" method="post" action="log.php">
    <h2>Authorisation</h2>
    <div class="mb-3 col-md-4 col-12 err"> 
      <p><?=$errMsg?></p>
    </div>
    <div class="w-100"></div>
    <div class="mb-3 col-md-4 col-12">
        <label for="formGroupExampleInput" class="form-label">Email</label>
        <input name="mail"value="<?=$email?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" >
      </div>
    <div class="w-100"></div>
    <div class="mb-3 col-md-4 col-12">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
    </div>
      <div class="w-100"></div>
      <div class="mb-3 col-md-4 col-12">
    <button type="submit" name="button-log" class="btn btn-secondary">log in</button>
    <a href="reg.php">Registration</a>
    <br><br><br><br><br><br><br><br><br><br>
</div>
  </form>
</div>

<?php include 'app/include/footer.php';?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      </body>
    </html>