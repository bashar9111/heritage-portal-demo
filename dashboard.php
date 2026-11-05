<?php include 'config.php'; 
if(!isset($_SESSION['user_id'])){ header("Location: login.php"); exit; }
include 'header.php'; ?>

<div class="container">
    <div class="glass-card mx-auto" style="max-width: 700px;">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h2 style="color: var(--gold); font-family: 'Playfair Display';">Heritage Guardian</h2>
            <a href="logout.php" class="text-danger small text-decoration-none fw-bold">SIGN OUT</a>
        </div>
        
        <form action="upload.php" method="POST" enctype="multipart/form-data"><?php echo csrf_field(); ?>
            <input type="text" name="title" class="form-control" placeholder="STORY TITLE" required>
            <textarea name="content" class="form-control" rows="4" placeholder="DESCRIBE THE HISTORY..." style="background:transparent; border:1px solid rgba(255,255,255,0.1); color:white; border-radius:15px; padding:15px; margin-bottom:25px;"></textarea>
            
            <div class="mb-4 text-center">
                <label class="small text-muted mb-2 d-block">UPLOAD IMAGE</label>
                <input type="file" name="image" class="form-control" required style="border:none !important;">
            </div>
            
            <button class="btn-gold w-100 py-3">PUBLISH TO ARCHIVE</button>
        </form>
    </div>
</div>

</div>
</body>
</html>
