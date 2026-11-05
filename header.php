<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nizwa Heritage | Digital Portal</title>
    
    <!-- تحميل سريع للمكتبات -->
    
    
    
    <!-- تحميل الخطوط بدون تأخير الصفحة -->
    

    <style>
        :root { --gold: #C5A059; --dark: #0a0a0a; }
        html { background-color: var(--dark); } /* لون فوري قبل الصورة */
        
        body { 
            background: linear-gradient(rgba(0,0,0,0.85), rgba(0,0,0,0.85)), linear-gradient(135deg,#3e3525,#0a0a0a) no-repeat center center fixed; 
            background-size: cover; 
            color: white; 
            font-family: 'Plus Jakarta Sans', Segoe UI, sans-serif; 
            min-height: 100vh; 
            margin: 0;
            content-visibility: auto;
        }

        .nav-custom { 
            padding: 20px 0; 
            background: rgba(0,0,0,0.8); 
            backdrop-filter: blur(15px); 
            position: fixed; 
            top: 0; width: 100%; 
            z-index: 1000; 
            border-bottom: 1px solid rgba(197,160,89,0.1); 
        }

        .nav-link { 
            color: rgba(255,255,255,0.6) !important; 
            font-size: 11px; 
            letter-spacing: 2px; 
            font-weight: 600; 
            margin: 0 15px; 
            text-transform: uppercase; 
            text-decoration: none; 
            transition: 0.3s; 
        }

        .nav-link:hover { color: var(--gold) !important; transform: translateY(-2px); }
        .content-wrapper { padding-top: 140px; padding-bottom: 50px; }
        
        .glass-card { 
            background: rgba(255,255,255,0.03); 
            backdrop-filter: blur(15px); 
            border: 1px solid rgba(197,160,89,0.2); 
            border-radius: 30px; 
            padding: 40px; 
        }

        input.form-control { 
            background: transparent !important; 
            border: none !important; 
            border-bottom: 1px solid rgba(255,255,255,0.1) !important; 
            color: white !important; 
            border-radius: 0 !important; 
            margin-bottom: 25px; 
            text-align: center; 
        }

        .btn-gold { 
            background: var(--gold); 
            color: black; 
            border-radius: 100px; 
            padding: 12px 35px; 
            font-weight: bold; 
            border: none; 
            letter-spacing: 1px; 
            transition: 0.4s; 
            text-decoration: none; 
            display: inline-block; 
        }
    .container{width:min(1100px,92%);margin:auto}.row{display:flex;gap:24px;flex-wrap:wrap}.col-md-6,.col-md-4{flex:1;min-width:260px}.text-center{text-align:center}.d-flex{display:flex;gap:16px;flex-wrap:wrap}.justify-content-center{justify-content:center}.align-items-center{align-items:center}.w-100{width:100%}.mx-auto{margin-inline:auto}.mb-5,.mb-4{margin-bottom:24px}.mt-5,.mt-4,.mt-3{margin-top:24px}.p-4,.p-5{padding:24px}.py-5{padding-block:32px}.h-100{height:100%}.text-muted{color:#bdb8ad}.form-control{display:block;width:100%;padding:12px;background:#151515;color:white;border:1px solid #777;margin-bottom:20px}button{cursor:pointer;font:inherit}a:focus-visible,button:focus-visible,input:focus-visible,textarea:focus-visible{outline:3px solid #c5a059;outline-offset:3px}.nav-custom{position:static}.content-wrapper{padding-top:32px}form{max-width:650px;margin:auto}.card-body{padding:20px}@media(max-width:650px){.nav-link{display:inline-block;margin:8px}.glass-card{padding:24px}} </style>
</head>
<body>
<nav class="nav-custom text-center">
    <div class="container d-flex justify-content-center align-items-center">
        <a class="nav-link" href="index.php">Home</a>
        <a class="nav-link" href="history.php">History</a>
        <a class="nav-link" href="events.php">Events</a>
        <a class="nav-link" href="virtual-tour.php">Tour</a>
        <a class="nav-link" href="gallery.php">Gallery</a>
        <?php if(isset($_SESSION['user_id'])): ?>
            <a class="nav-link" href="dashboard.php" style="color: var(--gold) !important;">Dashboard</a>
            <a class="nav-link" href="logout.php">Logout</a>
        <?php else: ?>
            <a class="nav-link" href="login.php" style="color: var(--gold) !important;">Login</a>
        <?php endif; ?>
    </div>
</nav>


<div class="content-wrapper"><p style="text-align:center;color:#c5a059">Unofficial student project. Historical copy and event times are illustrative, not visitor information.</p>
