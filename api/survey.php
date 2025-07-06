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
    <title>Course Survey - CyberNest</title>
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
                    <div class="col-md-8">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.php" class="text-white-50">Home</a>
                                </li>
                                <li class="breadcrumb-item active text-white" aria-current="page">
                                    Course Survey
                                </li>
                            </ol>
                        </nav>
                        <h1 class="h4 mb-0 mt-2">
                            <i class="fas fa-comment-dots me-2"></i>
                            Course Feedback Survey
                        </h1>
                    </div>
                    <div class="col-md-4 text-end">
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
                    <!-- Survey Introduction -->
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <i class="fas fa-star text-warning display-4 mb-3"></i>
                            <h2>Your Feedback Matters</h2>
                            <p class="lead text-muted">
                                Help us improve the cybersecurity training program by sharing your experience and suggestions.
                            </p>
                            
                            <?php if ($allChaptersCompleted): ?>
                            <div class="alert alert-success" role="alert">
                                <i class="fas fa-trophy me-2"></i>
                                <strong>Congratulations!</strong> You have completed all <?php echo $totalChapters; ?> chapters. 
                                Your feedback is especially valuable.
                            </div>
                            <?php else: ?>
                            <div class="alert alert-info" role="alert">
                                <i class="fas fa-info-circle me-2"></i>
                                You can provide feedback at any time, even if you haven't completed all chapters yet.
                                <br><small>Progress: <?php echo $completedChapters; ?>/<?php echo $totalChapters; ?> chapters completed</small>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Google Form Embed -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">
                                <i class="fas fa-clipboard-list me-2"></i>
                                Course Evaluation Form
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="form-container">
                                <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdOsmujXt0RNI6tqRuYDqrjuZv6p-sBnhilOzqaLBdzN2N-rw/viewform?embedded=true" 
                                        width="100%" 
                                        height="2821" 
                                        frameborder="0" 
                                        marginheight="0" 
                                        marginwidth="0"
                                        class="survey-iframe">
                                    Loading survey form...
                                </iframe>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <div class="text-center mt-4">
                        <a href="index.php" class="btn btn-outline-primary me-2">
                            <i class="fas fa-home me-2"></i>Home
                        </a>
                        <a href="chapters.php" class="btn btn-primary">
                            <i class="fas fa-book me-2"></i>Back to Chapters
                        </a>
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
    
    <script>
        // Make iframe responsive
        function resizeIframe() {
            const iframe = document.querySelector('.survey-iframe');
            if (iframe) {
                // Adjust height based on content if needed
                iframe.style.minHeight = '600px';
            }
        }
        
        // Call on load
        window.addEventListener('load', resizeIframe);
        window.addEventListener('resize', resizeIframe);
    </script>
</body>
</html>
