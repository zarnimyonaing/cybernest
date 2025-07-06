<?php
require_once 'includes/config.php';
session_start();
require_once 'includes/functions.php';

// Get chapter ID from URL
$chapterId = isset($_GET['id']) ? intval($_GET['id']) : 1;

// Validate chapter ID
if (!isset($chapters[$chapterId])) {
    header('Location: chapters.php');
    exit;
}

$chapter = $chapters[$chapterId];
$contentFile = "course/chapter{$chapterId}/content.html";

// Check if content file exists
$contentExists = file_exists($contentFile);
$content = $contentExists ? file_get_contents($contentFile) : '';

// Initialize progress if not exists
if (!isset($_SESSION['chapter_progress'])) {
    $_SESSION['chapter_progress'] = array();
}

$isCompleted = in_array($chapterId, $_SESSION['chapter_progress']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($chapter['title']); ?> - CyberNest</title>
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
                                <li class="breadcrumb-item">
                                    <a href="chapters.php" class="text-white-50">Chapters</a>
                                </li>
                                <li class="breadcrumb-item active text-white" aria-current="page">
                                    Chapter <?php echo $chapterId; ?>
                                </li>
                            </ol>
                        </nav>
                        <h1 class="h4 mb-0 mt-2">
                            <span class="badge bg-light text-primary me-2"><?php echo $chapterId; ?></span>
                            <?php echo htmlspecialchars($chapter['title']); ?>
                        </h1>
                    </div>
                    <div class="col-md-4 text-end">
                        <?php if ($isCompleted): ?>
                        <span class="badge bg-success fs-6">
                            <i class="fas fa-check-circle me-1"></i>Completed
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="container my-4">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <!-- Chapter Content -->
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">
                                    <i class="fas fa-book-open me-2"></i>
                                    Chapter Content
                                </h5>
                                <small class="text-muted">
                                    Chapter <?php echo $chapterId; ?> of <?php echo count($chapters); ?>
                                </small>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if ($contentExists && !empty($content)): ?>
                                <div class="chapter-content">
                                    <?php echo $content; ?>
                                </div>
                            <?php else: ?>
                                <div class="alert alert-info" role="alert">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <strong>Content Coming Soon!</strong>
                                    <p class="mb-0 mt-2">
                                        The content for <strong><?php echo htmlspecialchars($chapter['title']); ?></strong> 
                                        will be uploaded soon. In the meantime, you can proceed to the quiz to test 
                                        your existing knowledge on this topic.
                                    </p>
                                </div>
                                
                                <!-- Placeholder content with key points -->
                                <div class="placeholder-content">
                                    <h4><?php echo htmlspecialchars($chapter['title']); ?></h4>
                                    <p class="text-muted"><?php echo htmlspecialchars($chapter['description']); ?></p>
                                    
                                    <div class="alert alert-light border">
                                        <h6><i class="fas fa-lightbulb me-2 text-warning"></i>Key Learning Points:</h6>
                                        <ul class="mb-0">
                                            <li>Understanding the fundamentals of <?php echo strtolower($chapter['title']); ?></li>
                                            <li>Best practices and security measures</li>
                                            <li>Common threats and how to prevent them</li>
                                            <li>Real-world applications and scenarios</li>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <div class="d-flex justify-content-between mt-4">
                        <div>
                            <a href="chapters.php" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Chapters
                            </a>
                        </div>
                        <div>
                            <a href="quiz.php?chapter=<?php echo $chapterId; ?>" class="btn btn-primary">
                                <i class="fas fa-quiz me-2"></i>Take Quiz
                                <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Chapter Navigation -->
                    <div class="card mt-4">
                        <div class="card-body">
                            <h6 class="card-title">Chapter Navigation</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <?php if ($chapterId > 1): ?>
                                    <a href="chapter.php?id=<?php echo $chapterId - 1; ?>" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-chevron-left me-1"></i>
                                        Previous: <?php echo htmlspecialchars($chapters[$chapterId - 1]['title']); ?>
                                    </a>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6 text-end">
                                    <?php if ($chapterId < count($chapters)): ?>
                                    <a href="chapter.php?id=<?php echo $chapterId + 1; ?>" class="btn btn-outline-primary btn-sm">
                                        Next: <?php echo htmlspecialchars($chapters[$chapterId + 1]['title']); ?>
                                        <i class="fas fa-chevron-right ms-1"></i>
                                    </a>
                                    <?php endif; ?>
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
