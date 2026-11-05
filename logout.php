<?php
require 'config.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
 verify_csrf();$_SESSION=[];
 $p=session_get_cookie_params();setcookie(session_name(),'',time()-3600,$p['path'],$p['domain'],$p['secure'],$p['httponly']);
 session_destroy();header('Location: index.php');exit;
}
include 'header.php';
?><main class="container"><h1>Sign out</h1><form method="post"><?php echo csrf_field(); ?><button class="btn-gold">Confirm sign out</button></form></main></div></body></html>
