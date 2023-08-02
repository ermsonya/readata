<?php
include SITE_ROOT.'/app/database/db.php';

if(!$_SESSION){
    header('location: '.BASE_URL.'log.php');
}
$id='';
$title='';
$errMsg='';
$content='';
$topic='';
$img='';
$img1='';
$img2='';
$img3='';
$img4='';
$topics=selectAll('topics'); 
$posts=selectAll('posts'); 
$postsAdm=selectAllFromPostsWithUsers('posts','users'); 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])){
    //   tt($_FILES);
    //  exit();
if(!empty($_FILES['img']['name'])){
$imgName=time()."_".$_FILES['img']['name'];
$fileTmpName=$_FILES['img']['tmp_name'];
$destination=ROOT_PATH."\images\posts\\".$imgName;
$result= move_uploaded_file($fileTmpName,$destination);
if ($result){
    $_POST['img']=$imgName;
}else{
    $errMsg="error uploading";
}
}else{
    $errMsg="error getting";
}
if(!empty($_FILES['img1']['name'])){
    $imgName=time()."_".$_FILES['img1']['name'];
    $fileTmpName=$_FILES['img1']['tmp_name'];
    $destination=ROOT_PATH."\images\books\\".$imgName;
    $result= move_uploaded_file($fileTmpName,$destination);
    if ($result){
        $_POST['img1']=$imgName;
    }else{
        $errMsg="error uploading";
    }
    }else{
        $errMsg="error getting";
    }
    if(!empty($_FILES['img2']['name'])){
        $imgName=time()."_".$_FILES['img2']['name'];
        $fileTmpName=$_FILES['img2']['tmp_name'];
        $destination=ROOT_PATH."\images\books\\".$imgName;
        $result= move_uploaded_file($fileTmpName,$destination);
        if ($result){
            $_POST['img2']=$imgName;
        }else{
            $errMsg="error uploading";
        }
        }else{
            $errMsg="error getting";
        }
 if(!empty($_FILES['img3']['name'])){
            $imgName=time()."_".$_FILES['img3']['name'];
            $fileTmpName=$_FILES['img3']['tmp_name'];
            $destination=ROOT_PATH."\images\books\\".$imgName;
            $result= move_uploaded_file($fileTmpName,$destination);
            if ($result){
                $_POST['img3']=$imgName;
            }else{
                $errMsg="error uploading";
            }
            }else{
                $errMsg="error getting";
            }
if(!empty($_FILES['img4']['name'])){
$imgName=time()."_".$_FILES['img4']['name'];
$fileTmpName=$_FILES['img4']['tmp_name'];
$destination=ROOT_PATH."\images\books\\".$imgName;
$result= move_uploaded_file($fileTmpName,$destination);
if ($result){
    $_POST['img4']=$imgName;
}else{
    $errMsg="error uploading";
}
}else{
    $errMsg="error getting";
}                        

    $title=trim($_POST['title']);
    $content=trim($_POST['content']);
    $topic=trim($_POST['topic']);

   $publish=isset($_POST['publish']) ? 0 : 1;
       // tt($_POST);
    // exit();
if ($title ===''||$content ===''||$topic ===''){
    $errMsg = "Not all data filled";
}elseif(mb_strlen($title,'UTF8')<7){
    $errMsg = "Too short name";
}else{
    $post =[
        'id_user' => $_SESSION['id'],
        'title' => $title,
        'content' => $content,
        'img' => $_POST['img'],
        'img1' =>$_POST['img1'],
        'img2' => $_POST['img2'],
        'img3' => $_POST['img3'],
        'img4' => $_POST['img4'],
        'status' => $publish,
        'id_topic' => $topic
        ];
         $post =insert('posts',$post);
         $post=selectOne('posts',['id'=>$id]);
         header('location: '.BASE_URL.'admin/posts/index.php');
      }
}    else{
$title='';  
$content='';
$topic='';
$id='';
$publish='';
}
//редактирование article
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
$id = $_GET['id'];
$post= selectOne('posts',['id'=>$id]);
$id=$post['id'];
$title=$post['title'];
$content=$post['content'];
$publish=$post['status'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_post'])){
    $id=$_POST['id'];
    $title=trim($_POST['title']);
    $content=trim($_POST['content']);
    $topic=trim($_POST['topic']);
   $publish=isset($_POST['publish']) ? 0 : 1;
   if(!empty($_FILES['img']['name'])){
    $imgName=time()."_".$_FILES['img']['name'];
    $fileTmpName=$_FILES['img']['tmp_name'];
    $destination=ROOT_PATH."\images\posts\\".$imgName;
    $result= move_uploaded_file($fileTmpName,$destination);
    if ($result){
        $_POST['img']=$imgName;
    }else{
        $errMsg="error uploading";
    }
    }else{
        $errMsg="error getting";
    }
if ($title ===''||$content ===''||$topic ===''){
    $errMsg = "Not all data filled";
}elseif(mb_strlen($title,'UTF8')<7){
    $errMsg = "Too short name";
}else{
    $post =[
        'id_user' => $_SESSION['id'],
        'title' => $title,
        'content' => $content,
        'img' => $_POST['img'],
        'img1' =>$_POST['img1'],
        'img2' => $_POST['img2'],
        'img3' => $_POST['img3'],
        'img4' => $_POST['img4'],
        'status' => $publish,
        'id_topic' => $topic
        ];
         $post =update('posts',$id,$post);
        
         header('location: '.BASE_URL.'admin/posts/index.php');
      }
}    else{
$title="";  
$content="";
$topic="";
$publish=isset($_POST['publish']) ? 0: 1;
}   

//удаление категории
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
   
    delete('posts',$id);
    
    header('location: '.BASE_URL.'admin/posts/index.php');
    }
//publish

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
        $id = $_GET['pub_id'];
       $publish=$_GET['publish'];

       $postId=update('posts',$id,['status'=>$publish]);
        header('location: '.BASE_URL.'admin/posts/index.php');
        exit();
 }