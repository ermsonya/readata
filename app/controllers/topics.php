<?php
include SITE_ROOT.'/app/database/db.php';
$id='';
$name='';
$errMsg='';
$topics=selectAll('topics'); 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-create'])){
    $name=trim($_POST['name']);
if ($name ===''){
    $errMsg = "Not all data filled";
}elseif(mb_strlen($name,'UTF8')<2){
    $errMsg = "Too short login";
}else{
    $existance = selectOne('topics',['name'=>$name]);
    if ($existance['name']===$name){
        $errMsg = "A category already exists"; 
    }else{
    $topic =[
        'name' => $name
        ];
         $id =insert('topics',$topic);
         $topic=selectOne('topics',['id'=>$id]);
         header('location: '.BASE_URL.'admin/topics/index.php');
      }
}    
}else{
$name='';  
}
//редактирование категории
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
$id = $_GET['id'];
$topic= selectOne('topics',['id'=>$id]);
$id=$topic['id'];
$name=$topic['name'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])){
    $name=trim($_POST['name']);
if ($name ===''){
    $errMsg = "Not all data filled";
}elseif(mb_strlen($name,'UTF8')<2){
    $errMsg = "Too short login";
}else{

    $topic =[
        'name' => $name
        ];
         $id =$_POST['id'];
         $topic_id=update('topics',$id,$topic);
         header('location: '.BASE_URL.'admin/topics/index.php');
      }
}    
//удаление категории
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id = $_GET['del_id'];
   
    delete('topics',$id);
    
    header('location: '.BASE_URL.'admin/topics/index.php');
    }