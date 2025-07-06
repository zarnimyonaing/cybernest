<?php
require_once 'includes/config.php';
session_start();
require_once 'includes/functions.php';

// Get chapter ID from URL
$chapterId = isset($_GET['chapter']) ? intval($_GET['chapter']) : 1;

// Validate chapter ID
if (!isset($chapters[$chapterId])) {
    header('Location: chapters.php');
    exit;
}

$chapter = $chapters[$chapterId];

// Initialize progress if not exists
if (!isset($_SESSION['chapter_progress'])) {
    $_SESSION['chapter_progress'] = array();
}

// Handle quiz submission
$showResults = false;
$score = 0;
$totalQuestions = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_quiz'])) {
    $userAnswers = $_POST['answers'] ?? array();
    $quizQuestions = getQuizQuestions($chapterId);
    $totalQuestions = count($quizQuestions);
    
    foreach ($quizQuestions as $questionIndex => $question) {
        if (isset($userAnswers[$questionIndex]) && 
            $userAnswers[$questionIndex] == $question['correct']) {
            $score++;
        }
    }
    
    $showResults = true;
    
    // Mark chapter as completed if score is perfect
    if ($score == $totalQuestions && !in_array($chapterId, $_SESSION['chapter_progress'])) {
        $_SESSION['chapter_progress'][] = $chapterId;
    }
}

$quizQuestions = getQuizQuestions($chapterId);
$isCompleted = in_array($chapterId, $_SESSION['chapter_progress']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz: <?php echo htmlspecialchars($chapter['title']); ?> - CyberNest</title>
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
                                <li class="breadcrumb-item">
                                    <a href="chapter.php?id=<?php echo $chapterId; ?>" class="text-white-50">
                                        Chapter <?php echo $chapterId; ?>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active text-white" aria-current="page">Quiz</li>
                            </ol>
                        </nav>
                        <h1 class="h4 mb-0 mt-2">
                            <i class="fas fa-quiz me-2"></i>
                            Quiz: <?php echo htmlspecialchars($chapter['title']); ?>
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
                <div class="col-lg-8 mx-auto">
                    <?php if ($showResults): ?>
                    <!-- Quiz Results -->
                    <div class="card">
                        <div class="card-header <?php echo $score == $totalQuestions ? 'bg-success text-white' : 'bg-warning'; ?>">
                            <h5 class="mb-0">
                                <i class="fas fa-chart-bar me-2"></i>
                                Quiz Results
                            </h5>
                        </div>
                        <div class="card-body text-center">
                            <div class="result-score mb-4">
                                <h2 class="display-4 <?php echo $score == $totalQuestions ? 'text-success' : 'text-warning'; ?>">
                                    <?php echo $score; ?>/<?php echo $totalQuestions; ?>
                                </h2>
                                <p class="lead">
                                    <?php echo round(($score / $totalQuestions) * 100); ?>% Correct
                                </p>
                            </div>
                            
                            <?php if ($score == $totalQuestions): ?>
                            <div class="alert alert-success">
                                <i class="fas fa-trophy me-2"></i>
                                <strong>Excellent!</strong> You've completed this chapter successfully.
                            </div>
                            <?php else: ?>
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                <strong>Good effort!</strong> Review the content and try again to improve your score.
                            </div>
                            <?php endif; ?>
                            
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <a href="chapter.php?id=<?php echo $chapterId; ?>" class="btn btn-outline-primary">
                                    <i class="fas fa-book me-2"></i>Review Content
                                </a>
                                <a href="chapters.php" class="btn btn-primary">
                                    <i class="fas fa-list me-2"></i>Back to Chapters
                                </a>
                                <?php if ($score == $totalQuestions && $chapterId < count($chapters)): ?>
                                <a href="chapter.php?id=<?php echo $chapterId + 1; ?>" class="btn btn-success">
                                    <i class="fas fa-arrow-right me-2"></i>Next Chapter
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <?php else: ?>
                    <!-- Quiz Form -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">
                                    <i class="fas fa-question-circle me-2"></i>
                                    Chapter Quiz
                                </h5>
                                <small class="text-muted">
                                    <?php echo count($quizQuestions); ?> Questions
                                </small>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" id="quizForm">
                                <?php foreach ($quizQuestions as $questionIndex => $question): ?>
                                <div class="question-block mb-4">
                                    <h6 class="question-title">
                                        <span class="badge bg-primary me-2"><?php echo $questionIndex + 1; ?></span>
                                        <?php echo htmlspecialchars($question['question']); ?>
                                    </h6>
                                    
                                    <div class="options mt-3">
                                        <?php foreach ($question['options'] as $optionIndex => $option): ?>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" 
                                                   name="answers[<?php echo $questionIndex; ?>]" 
                                                   value="<?php echo $optionIndex; ?>"
                                                   id="q<?php echo $questionIndex; ?>_<?php echo $optionIndex; ?>"
                                                   required>
                                            <label class="form-check-label" for="q<?php echo $questionIndex; ?>_<?php echo $optionIndex; ?>">
                                                <?php echo htmlspecialchars($option); ?>
                                            </label>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                
                                <?php if ($questionIndex < count($quizQuestions) - 1): ?>
                                <hr>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                
                                <div class="d-grid gap-2 d-md-flex justify-content-md-between mt-4">
                                    <a href="chapter.php?id=<?php echo $chapterId; ?>" class="btn btn-outline-secondary">
                                        <i class="fas fa-arrow-left me-2"></i>Back to Content
                                    </a>
                                    <button type="submit" name="submit_quiz" class="btn btn-primary">
                                        <i class="fas fa-check me-2"></i>Submit Quiz
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php endif; ?>
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
    
    <?php if (!$showResults): ?>
    <script>
        // Quiz validation
        document.getElementById('quizForm').addEventListener('submit', function(e) {
            const questions = document.querySelectorAll('.question-block');
            let allAnswered = true;
            
            questions.forEach(function(question) {
                const radios = question.querySelectorAll('input[type="radio"]');
                const answered = Array.from(radios).some(radio => radio.checked);
                
                if (!answered) {
                    allAnswered = false;
                }
            });
            
            if (!allAnswered) {
                e.preventDefault();
                alert('Please answer all questions before submitting.');
            }
        });
    </script>
    <?php endif; ?>
</body>
</html>
