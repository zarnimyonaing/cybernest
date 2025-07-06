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
$allChaptersCompleted = $completedChapters >= $totalChapters;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberNest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <!-- Header -->
        <header class="bg-primary text-white py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="display-4 mb-0">
                            <i class="fas fa-shield-alt me-3"></i>
                            CyberNest
                        </h1>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="progress-indicator">
                            <small>Progress: <?php echo $completedChapters; ?>/<?php echo $totalChapters; ?> Chapters</small>
                            <div class="progress mt-2">
                                <div class="progress-bar bg-success" role="progressbar" 
                                     style="width: <?php echo ($completedChapters / $totalChapters) * 100; ?>%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="container my-5">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <!-- Hero Section -->
                    <div class="hero-section text-center mb-5">
                        <div class="card shadow-lg border-0">
                            <div class="card-body p-5">
                                <i class="fas fa-graduation-cap text-primary display-1 mb-4"></i>
                                <h2 class="display-5 mb-4">Master Cybersecurity Fundamentals</h2>
                                <p class="lead text-muted mb-4">
                                    Comprehensive training program covering essential cybersecurity topics 
                                    to protect yourself and your organization in the digital world.
                                </p>
                                
                                <!-- Course Features -->
                                <div class="row mt-4">
                                    <div class="col-md-4 mb-3">
                                        <div class="feature-item">
                                            <i class="fas fa-book text-primary fs-2 mb-2"></i>
                                            <h5>20 Chapters</h5>
                                            <p class="text-muted small">Comprehensive coverage of cybersecurity topics</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="feature-item">
                                            <i class="fas fa-quiz text-primary fs-2 mb-2"></i>
                                            <h5>Interactive Quizzes</h5>
                                            <p class="text-muted small">Test your knowledge after each chapter</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="feature-item">
                                            <i class="fas fa-certificate text-primary fs-2 mb-2"></i>
                                            <h5>Track Progress</h5>
                                            <p class="text-muted small">Monitor your learning journey</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="d-grid gap-3 d-md-flex justify-content-md-center mt-5">
                                    <a href="chapters.php" class="btn btn-primary btn-lg px-4 py-3">
                                        <i class="fas fa-play me-2"></i>
                                        Start Training
                                    </a>
                                    <a href="survey.php" class="btn btn-outline-secondary btn-lg px-4 py-3">
                                        <i class="fas fa-comment-dots me-2"></i>
                                        Course Survey
                                    </a>
                                </div>

                                <?php if ($allChaptersCompleted): ?>
                                <div class="alert alert-success mt-4" role="alert">
                                    <i class="fas fa-trophy me-2"></i>
                                    <strong>Congratulations!</strong> You have completed all chapters. 
                                    <a href="survey.php" class="alert-link">Please provide your feedback</a>.
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Course Topics Overview -->
                    <div class="topics-overview">
                        <h3 class="text-center mb-4">Course Topics</h3>
                        <div class="row">
                            <?php foreach ($chapters as $id => $chapter): ?>
                            <div class="col-md-6 mb-3">
                                <div class="card h-100 topic-card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="topic-number me-3">
                                                <?php if (in_array($id, $_SESSION['chapter_progress'])): ?>
                                                    <i class="fas fa-check-circle text-success"></i>
                                                <?php else: ?>
                                                    <span class="badge bg-secondary"><?php echo $id; ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <div>
                                                <h6 class="card-title mb-1"><?php echo htmlspecialchars($chapter['title']); ?></h6>
                                                <p class="card-text small text-muted"><?php echo htmlspecialchars($chapter['description']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-dark text-white py-4 mt-5">
            <div class="container text-center">
                <p class="mb-0">
                    <i class="fas fa-shield-alt me-2"></i>
                    CyberNest &copy; 2025
                </p>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/script.js"></script>
</body>
</html>
