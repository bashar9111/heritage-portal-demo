<?php 
include 'config.php'; 
include 'header.php'; 

// جلب البيانات مع التأكد من ترتيبها
$stmt = $pdo->query("SELECT stories.*, users.username FROM stories JOIN users ON stories.user_id = users.id ORDER BY stories.id DESC");
$posts = $stmt->fetchAll();
?>

<div class="container pb-5">
    <div class="text-center mb-5">
        <h1 class="display-3 fw-bold" style="color: var(--gold); font-family: 'Playfair Display';">Visual Archive</h1>
        <p style="opacity: 0.6; letter-spacing: 3px; font-size: 12px; text-transform: uppercase;">Voices of the Heritage Guardians</p>
    </div>

    <div class="row g-4">
        <?php if(empty($posts)): ?>
            <div class="col-12 text-center py-5">
                <p class="text-muted italic">No stories have been shared yet. Be the first to document history.</p>
                <a href="dashboard.php" class="btn btn-outline-warning btn-sm mt-3">Share a Story</a>
            </div>
        <?php else: ?>
            <?php foreach($posts as $post): ?>
            <div class="col-md-4">
                <div class="card h-100 shadow-lg" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(197,160,89,0.2); border-radius: 25px; backdrop-filter: blur(15px); overflow: hidden;">
                    <!-- عرض الصورة المرفوعة -->
                    <div style="height: 250px; background: url('<?php echo e($post['image_path']); ?>') center/cover no-repeat;"></div>
                    
                    <div class="card-body p-4">
                        <h4 style="font-family: 'Playfair Display'; color: var(--gold);"><?php echo e($post['title']); ?></h4>
                        <p style="font-size: 13px; color: rgba(255,255,255,0.5);">By @<?php echo e($post['username']); ?></p>
                        <hr style="border-color: rgba(197,160,89,0.1);">
                        <p style="opacity: 0.8; font-size: 14px; line-height: 1.6;">
                            <?php echo e($post['content']); ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

</div> <!-- إغلاق content-wrapper من الهيدر -->
</body>
</html>
