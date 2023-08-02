<?php 
include SITE_ROOT.'/app/database/db.php';
$isSubmit = false;
$errMsg='';

$users=selectAll('users');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){
    $login=trim($_POST['login']);
    $email=trim($_POST['mail']);
    $passF=trim($_POST['pass-first']);
    $passS=trim($_POST['pass-second']);
    //$pass=password_hash($_POST['pass-second'],PASSWORD_DEFAULT);
    $admin=0;
if ($login ===''|| $email ==='' || $passF ===''){
    $errMsg = "Not all data filled";
}elseif(mb_strlen($login,'UTF8')<2){
    $errMsg = "Too short login";
}elseif($passF!==$passS){
    $errMsg = "Different passwords";
}else{
    $existance = selectOne('users',['email'=>$email]);
    if ($existance['email']===$email){
        $errMsg = "An email already exists"; 
    }else{
         $pass=password_hash($passF,PASSWORD_DEFAULT);
    $post =[
        'admin' => $admin,
        'username' => $login,
        'email' => $email,
        'password' => $pass
        ];
         $id =insert('users',$post);
         $user=selectOne('users',['id'=>$id]);
         $_SESSION['id']=$user['id'];
         $_SESSION['login']=$user['username'];
         $_SESSION['admin']=$user['admin'];
        if( $_SESSION['admin']){
            header('location:'.BASE_URL."admin/posts/index.php"); 
        }else{
         header('location:'.BASE_URL);
    }}
}    
}else{
$login='';
    $email='';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){

    $email=trim($_POST['mail']);
    $pass=trim($_POST['password']);
    if ( $email ==='' || $pass ===''){
        $errMsg = "Not all data filled";
    }else{
        $existance = selectOne('users',['email'=>$email]);
        if ($existance && password_verify($pass , $existance['password'])){
            $_SESSION['id']=$existance['id']; 
            $_SESSION['login']=$existance['username'];
            $_SESSION['admin']=$existance['admin'];
            if( $_SESSION['admin']){
                header('location:'.BASE_URL."admin/posts/index.php");
            }else{
                header('location:'.BASE_URL);}
           }else{
            $errMsg = "Email or password incorrect";
           }
    }
}else{
        $email='';
    }

//код добав в админке
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])){
        $login=trim($_POST['login']);
        $email=trim($_POST['mail']);
        $passF=trim($_POST['pass-first']);
        $passS=trim($_POST['pass-second']);
        $admin=0;

    if ($login ===''|| $email ==='' || $passF ===''){
        $errMsg = "Not all data filled";
    }elseif(mb_strlen($login,'UTF8')<2){
        $errMsg = "Too short login";
    }elseif($passF!==$passS){
        $errMsg = "Different passwords";
    }else{
        $existance = selectOne('users',['email'=>$email]);
        if ($existance['email']===$email){
            $errMsg = "An email already exists"; 
        }else{
             $pass=password_hash($passF,PASSWORD_DEFAULT);
             if (isset($_POST['admin'])){
                $admin=1;
             }
        $user =[
            'admin' => $admin,
            'username' => $login,
            'email' => $email,
            'password' => $pass
            ];
             $id =insert('users',$user);
             $user=selectOne('users',['id'=>$id]);
                header('location:'.BASE_URL."admin/posts/index.php"); 
           }
    }    
    }else{
$login='';
$email='';
    }
//delete
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];    
    delete('users',$id);      
     header('location: '.BASE_URL.'admin/users/index.php');
}
//edit
   if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])){
            $id = $_GET['edit_id'];
            $user= selectOne('users',['id'=>$id]);
            $id=$user['id'];
            $admin=$user['admin'];
            $username=$user['username'];
            $email=$user['email'];

            }
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])){
                $id=$_POST['id'];

                $mail=trim($_POST['mail']);
                $login=trim($_POST['login']);
                $passS=trim($_POST['pass-second']);
                $passF=trim($_POST['pass-first']);
                $admin=trim($_POST['admin']);
               $admin=isset($_POST['admin']) ? 1 : 0;
               
            if ($admin ===''||$login ===''){
                $errMsg = "Not all data filled";
            }elseif(mb_strlen($login,'UTF8')<2){
                $errMsg = "Too short login";
            }elseif($passF!==$passS){
                $errMsg = "Different passwords";
            }else{
                $pass=password_hash($passF,PASSWORD_DEFAULT);
                if (isset($_POST['admin'])){
                   $admin=1;
                }
           $user =[
               'admin' => $admin,
               'username' => $login,
               'email' => $mail,
               'password' => $pass
               ];
                     $user =update('users',$id,$user);
                    
                     header('location: '.BASE_URL.'admin/users/index.php');
                  }
            }   else{
                $login='';
                
            }   
