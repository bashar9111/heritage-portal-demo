<?php
require 'config.php';
if(!isset($_SESSION['user_id'])) {http_response_code(401);exit('Sign in first.');}
if($_SERVER['REQUEST_METHOD']!=='POST') {http_response_code(405);exit('POST required.');}
verify_csrf();
$title=trim((string)($_POST['title']??''));$content=trim((string)($_POST['content']??''));
if($title===''||strlen($title)>160||strlen($content)>10000) {http_response_code(400);exit('Invalid title or content.');}
$file=$_FILES['image']??null;
if(!$file||$file['error']!==UPLOAD_ERR_OK||$file['size']>5000000||!is_uploaded_file($file['tmp_name'])) {http_response_code(400);exit('Upload a valid image smaller than 5 MB.');}
$mime=(new finfo(FILEINFO_MIME_TYPE))->file($file['tmp_name']);$types=['image/jpeg'=>'jpg','image/png'=>'png','image/webp'=>'webp'];
if(!isset($types[$mime])||getimagesize($file['tmp_name'])===false) {http_response_code(400);exit('Only JPEG, PNG and WebP images are accepted.');}
$dir=__DIR__.'/uploads';if(!is_dir($dir)&&!mkdir($dir,0755,true)) {http_response_code(503);exit('Upload storage unavailable.');}
$relative='uploads/'.bin2hex(random_bytes(16)).'.'.$types[$mime];
if(!move_uploaded_file($file['tmp_name'],__DIR__.'/'.$relative)) {http_response_code(503);exit('Could not save image.');}
try {$stmt=$pdo->prepare('INSERT INTO stories (user_id,title,content,image_path,post_type) VALUES (?,?,?,?,?)');$stmt->execute([$_SESSION['user_id'],$title,$content,$relative,'story']);}
catch(PDOException $ex){unlink(__DIR__.'/'.$relative);http_response_code(503);exit('Could not save story.');}
header('Location: gallery.php');exit;
