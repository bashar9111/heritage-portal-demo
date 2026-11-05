<?php
declare(strict_types=1);
session_set_cookie_params(['httponly'=>true,'secure'=>!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS']!=='off','samesite'=>'Lax']);
if(session_status()===PHP_SESSION_NONE) session_start();
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
if(empty($_SESSION['csrf'])) $_SESSION['csrf']=bin2hex(random_bytes(32));
function e($value): string { return htmlspecialchars((string)$value,ENT_QUOTES|ENT_SUBSTITUTE,'UTF-8'); }
function csrf_field(): string { return '<input type="hidden" name="csrf" value="'.e($_SESSION['csrf']).'">'; }
function verify_csrf(): void {
 if(!is_string($_POST['csrf']??null) || !hash_equals($_SESSION['csrf'],$_POST['csrf'])) {http_response_code(403);exit('Invalid form token. Reload the form.');}
}
try {
 $pdo=new PDO('mysql:host='.(getenv('DB_HOST')?:'127.0.0.1').';dbname='.(getenv('DB_NAME')?:'heritage_demo').';charset=utf8mb4',getenv('DB_USER')?:'heritage_demo',getenv('DB_PASSWORD')?:'',[
 PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,PDO::ATTR_EMULATE_PREPARES=>false]);
} catch(PDOException $ex) {http_response_code(503);exit('Database is not configured. Follow the README setup instructions.');}
