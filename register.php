<?php include 'config.php'; 
$error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
 verify_csrf();
 $user=trim((string)($_POST['username']??''));
 $email=trim((string)($_POST['email']??''));
 $password=(string)($_POST['password']??'');
 if(!preg_match('/^[a-zA-Z0-9_]{3,30}$/D',$user) || !filter_var($email,FILTER_VALIDATE_EMAIL) || strlen($email)>120 || strlen($password)<12 || strlen($password)>72) {
  $error='Use a 3-30 character username, a valid fictional email and a 12-72 character password.';
 } else {
  try {
   $stmt=$pdo->prepare('INSERT INTO users (username,email,password) VALUES (?,?,?)');
   $stmt->execute([$user,$email,password_hash($password,PASSWORD_DEFAULT)]);
   header('Location: login.php');exit;
  } catch(PDOException $ex) {if($ex->getCode()==='23000') $error='That username or email is already in use.';else {http_response_code(503);exit('Registration is temporarily unavailable.');}}
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Join the Legacy | Nizwa</title>
    
    <link rel="stylesheet" href="css/style.css"> <!-- استخدم نفس ستايل index -->
    <style>
        body { background: #0a0a0a; color: white; font-family: 'Plus Jakarta Sans', sans-serif; height: 100vh; display: flex; align-items: center; justify-content: center; }
        .auth-card { background: rgba(255,255,255,0.03); padding: 50px; border-radius: 20px; border: 1px solid rgba(197,160,89,0.2); width: 100%; max-width: 450px; backdrop-filter: blur(10px); text-align: center; }
        input { display:block; width:100%; padding:12px; background: transparent !important; border: none !important; border-bottom: 1px solid rgba(255,255,255,0.1) !important; color: white !important; border-radius: 0 !important; margin-bottom: 30px; text-align: center; }
        .btn-gold { background: #C5A059; color: black; border-radius: 100px; padding: 12px 40px; font-weight: bold; border: none; width: 100%; }
    </style>
</head>
<body>
    <div class="auth-card">
        <h2 style="font-family: 'Playfair Display'; color: #C5A059;" class="mb-4">Create Account</h2>
        <p role="alert"><?php echo e($error); ?></p><form method="POST"><?php echo csrf_field(); ?>
            <input type="text" name="username" class="form-control" placeholder="USERNAME" required>
            <input type="email" name="email" class="form-control" placeholder="EMAIL" required>
            <input type="password" name="password" class="form-control" placeholder="PASSWORD" required>
            <button class="btn-gold">REGISTER</button>
        </form>
        <a href="login.php" class="d-block mt-4 text-muted text-decoration-none small">ALREADY A MEMBER? LOGIN</a>
    </div>
</body>
</html>
