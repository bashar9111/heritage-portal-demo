<?php 
require_once 'config.php'; 
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    verify_csrf();
    $email = trim((string)($_POST['email']??''));
    $password = (string)($_POST['password']??'');

    // استعلام مباشر وبسيط جداً
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && strlen($password)<=72 && password_verify($password,$user['password'])) {
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Access Denied. Check your data.";
    }
}
include 'header.php'; 
?>


<div class="container d-flex justify-content-center">
    <div class="glass-card text-center" style="max-width: 400px; width: 100%; margin-top: 50px;">
        <h2 style="font-family: 'Playfair Display'; color: var(--gold);" class="mb-5">Access Portal</h2>
        
        <?php if($error): ?>
            <div class="alert alert-danger py-2 mb-4" style="background: rgba(255,0,0,0.1); border: none; color: #ff6b6b; font-size: 13px;">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST"><?php echo csrf_field(); ?>
            <input type="email" name="email" class="form-control" placeholder="EMAIL ADDRESS" required autocomplete="off">
            <input type="password" name="password" class="form-control" placeholder="PASSWORD" required>
            <button type="submit" class="btn-gold w-100 mt-3">LOGIN</button>
        </form>
        <p>Use a fictional account created on the registration page.</p>
    </div>
</div>
