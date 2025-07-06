<?php
require_once 'includes/config.php';
session_start();
require_once 'includes/functions.php';

// Initialize progress if not exists
if (!isset($_SESSION['chapter_progress'])) {
    $_SESSION['chapter_progress'] = array();
}

$totalChapters = count($chapters);
$completedChapters = count($_SESSION['chapter_progress']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chapters - CyberNest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <!-- Header -->
        <header class="bg-primary text-white py-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1 class="h3 mb-0">
                            <a href="index.php" class="text-white text-decoration-none">
                                <i class="fas fa-shield-alt me-2"></i>
                                CyberNest
                            </a>
                        </h1>
                    </div>
                    <div class="col-md-6 text-end">
                        <div class="progress-indicator">
                            <small>Progress: <?php echo $completedChapters; ?>/<?php echo $totalChapters; ?> Chapters</small>
                            <div class="progress mt-1">
                                <div class="progress-bar bg-success" role="progressbar" 
                                     style="width: <?php echo ($completedChapters / $totalChapters) * 100; ?>%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="container my-4">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <!-- Page Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h2>Training Chapters</h2>
                            <p class="text-muted">Choose any chapter to begin your cybersecurity learning journey</p>
                        </div>
                        <div>
                            <a href="index.php" class="btn btn-outline-primary">
                                <i class="fas fa-home me-2"></i>Home
                            </a>
                            <?php if ($completedChapters >= $totalChapters): ?>
                            <a href="survey.php" class="btn btn-success ms-2">
                                <i class="fas fa-star me-2"></i>Course Survey
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Chapters Grid -->
                    <div class="row">
                        <?php foreach ($chapters as $id => $chapter): ?>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card chapter-card h-100 <?php echo in_array($id, $_SESSION['chapter_progress']) ? 'completed' : ''; ?>">
                                <div class="card-body">
                                    <div class="d-flex align-items-start mb-3">
                                        <div class="chapter-number me-3">
                                            <?php if (in_array($id, $_SESSION['chapter_progress'])): ?>
                                                <div class="completion-badge">
                                                    <i class="fas fa-check-circle text-success"></i>
                                                </div>
                                            <?php else: ?>
                                                <span class="badge bg-primary"><?php echo $id; ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="card-title"><?php echo htmlspecialchars($chapter['title']); ?></h5>
                                            <p class="card-text text-muted small"><?php echo htmlspecialchars($chapter['description']); ?></p>
                                        </div>
                                    </div>
                                    
                                    <div class="d-grid">
                                        <a href="chapter.php?id=<?php echo $id; ?>" class="btn btn-outline-primary">
                                            <i class="fas fa-play me-2"></i>
                                            <?php echo in_array($id, $_SESSION['chapter_progress']) ? 'Review' : 'Start'; ?>
                                        </a>
                                    </div>
                                    
                                    <?php if (in_array($id, $_SESSION['chapter_progress'])): ?>
                                    <div class="mt-2 text-center">
                                        <small class="text-success">
                                            <i class="fas fa-trophy me-1"></i>Completed
                                        </small>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Progress Summary -->
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5 class="mb-1">Your Progress</h5>
                                    <p class="text-muted mb-0">
                                        You have completed <?php echo $completedChapters; ?> out of <?php echo $totalChapters; ?> chapters
                                        <?php if ($completedChapters >= $totalChapters): ?>
                                            <span class="badge bg-success ms-2">All Complete!</span>
                                        <?php endif; ?>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" 
                                             style="width: <?php echo ($completedChapters / $totalChapters) * 100; ?>%"
                                             aria-valuenow="<?php echo $completedChapters; ?>" 
                                             aria-valuemin="0" 
                                             aria-valuemax="<?php echo $totalChapters; ?>">
                                            <?php echo round(($completedChapters / $totalChapters) * 100); ?>%
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-dark text-white py-3 mt-5">
            <div class="container text-center">
                <p class="mb-0">CyberNest &copy; 2025</p>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/script.js"></script>
</body>
</html>
