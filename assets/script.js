// Global JavaScript functionality for Cybersecurity Training

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all interactive components
    initializeProgressTracking();
    initializeQuizFunctionality();
    initializeNavigationEnhancements();
    initializeAccessibilityFeatures();
});

// Progress tracking functionality
function initializeProgressTracking() {
    // Update progress indicators dynamically
    const progressBars = document.querySelectorAll('.progress-bar');
    progressBars.forEach(function(bar) {
        const width = bar.style.width;
        if (width) {
            // Animate progress bar
            bar.style.width = '0%';
            setTimeout(function() {
                bar.style.width = width;
                bar.style.transition = 'width 1s ease-in-out';
            }, 100);
        }
    });

    // Add completion animations
    const completionBadges = document.querySelectorAll('.completion-badge i');
    completionBadges.forEach(function(badge, index) {
        setTimeout(function() {
            badge.style.animation = 'fadeInScale 0.5s ease forwards';
        }, index * 100);
    });
}

// Quiz functionality enhancements
function initializeQuizFunctionality() {
    const quizForm = document.getElementById('quizForm');
    if (quizForm) {
        // Add question progress indicator
        addQuizProgressIndicator();
        
        // Add keyboard navigation
        addQuizKeyboardNavigation();
        
        // Add answer change tracking
        trackAnswerChanges();
        
        // Add auto-save functionality
        initializeAutoSave();
    }
}

// Add progress indicator for quiz questions
function addQuizProgressIndicator() {
    const questions = document.querySelectorAll('.question-block');
    if (questions.length > 1) {
        const progressContainer = document.createElement('div');
        progressContainer.className = 'quiz-progress mb-4';
        progressContainer.innerHTML = `
            <div class="d-flex justify-content-between align-items-center">
                <span class="small text-muted">Question Progress</span>
                <span class="small text-muted"><span id="current-question">0</span> of ${questions.length} answered</span>
            </div>
            <div class="progress mt-2">
                <div class="progress-bar" id="quiz-progress-bar" role="progressbar" style="width: 0%"></div>
            </div>
        `;
        
        const firstQuestion = questions[0];
        firstQuestion.parentNode.insertBefore(progressContainer, firstQuestion);
        
        // Update progress when answers change
        const radioButtons = document.querySelectorAll('input[type="radio"]');
        radioButtons.forEach(function(radio) {
            radio.addEventListener('change', updateQuizProgress);
        });
    }
}

// Update quiz progress indicator
function updateQuizProgress() {
    const questions = document.querySelectorAll('.question-block');
    let answeredQuestions = 0;
    
    questions.forEach(function(question) {
        const radios = question.querySelectorAll('input[type="radio"]');
        const answered = Array.from(radios).some(radio => radio.checked);
        if (answered) answeredQuestions++;
    });
    
    const progressBar = document.getElementById('quiz-progress-bar');
    const currentQuestionSpan = document.getElementById('current-question');
    
    if (progressBar && currentQuestionSpan) {
        const percentage = (answeredQuestions / questions.length) * 100;
        progressBar.style.width = percentage + '%';
        currentQuestionSpan.textContent = answeredQuestions;
        
        // Change color based on completion
        if (percentage === 100) {
            progressBar.className = 'progress-bar bg-success';
        } else if (percentage > 50) {
            progressBar.className = 'progress-bar bg-warning';
        } else {
            progressBar.className = 'progress-bar bg-primary';
        }
    }
}

// Add keyboard navigation for quiz
function addQuizKeyboardNavigation() {
    const radioButtons = document.querySelectorAll('input[type="radio"]');
    radioButtons.forEach(function(radio, index) {
        radio.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowDown' || e.key === 'ArrowRight') {
                e.preventDefault();
                const nextRadio = radioButtons[index + 1];
                if (nextRadio) nextRadio.focus();
            } else if (e.key === 'ArrowUp' || e.key === 'ArrowLeft') {
                e.preventDefault();
                const prevRadio = radioButtons[index - 1];
                if (prevRadio) prevRadio.focus();
            }
        });
    });
}

// Track answer changes and provide feedback
function trackAnswerChanges() {
    const radioButtons = document.querySelectorAll('input[type="radio"]');
    radioButtons.forEach(function(radio) {
        radio.addEventListener('change', function() {
            // Add visual feedback for answered questions
            const questionBlock = this.closest('.question-block');
            if (questionBlock) {
                questionBlock.classList.add('answered');
                
                // Add check icon to question title
                const questionTitle = questionBlock.querySelector('.question-title');
                let checkIcon = questionTitle.querySelector('.answer-check');
                if (!checkIcon) {
                    checkIcon = document.createElement('i');
                    checkIcon.className = 'fas fa-check-circle text-success ms-2 answer-check';
                    questionTitle.appendChild(checkIcon);
                }
            }
        });
    });
}

// Auto-save quiz progress
function initializeAutoSave() {
    const radioButtons = document.querySelectorAll('input[type="radio"]');
    radioButtons.forEach(function(radio) {
        radio.addEventListener('change', function() {
            saveQuizProgress();
        });
    });
    
    // Load saved progress
    loadQuizProgress();
}

// Save quiz progress to localStorage
function saveQuizProgress() {
    const answers = {};
    const radioButtons = document.querySelectorAll('input[type="radio"]:checked');
    
    radioButtons.forEach(function(radio) {
        answers[radio.name] = radio.value;
    });
    
    const currentUrl = window.location.href;
    const chapterId = new URL(currentUrl).searchParams.get('chapter');
    
    if (chapterId) {
        const key = `quiz_progress_chapter_${chapterId}`;
        localStorage.setItem(key, JSON.stringify(answers));
    }
}

// Load quiz progress from localStorage
function loadQuizProgress() {
    const currentUrl = window.location.href;
    const chapterId = new URL(currentUrl).searchParams.get('chapter');
    
    if (chapterId) {
        const key = `quiz_progress_chapter_${chapterId}`;
        const savedAnswers = localStorage.getItem(key);
        
        if (savedAnswers) {
            const answers = JSON.parse(savedAnswers);
            
            Object.keys(answers).forEach(function(name) {
                const radio = document.querySelector(`input[name="${name}"][value="${answers[name]}"]`);
                if (radio) {
                    radio.checked = true;
                    radio.dispatchEvent(new Event('change'));
                }
            });
        }
    }
}

// Navigation enhancements
function initializeNavigationEnhancements() {
    // Add smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Add loading states to buttons
    const buttons = document.querySelectorAll('.btn[href], button[type="submit"]');
    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            if (this.type === 'submit') {
                setTimeout(() => {
                    this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
                    this.disabled = true;
                }, 100);
            }
        });
    });
    
    // Add back to top functionality
    addBackToTopButton();
}

// Add back to top button
function addBackToTopButton() {
    const backToTopButton = document.createElement('button');
    backToTopButton.innerHTML = '<i class="fas fa-arrow-up"></i>';
    backToTopButton.className = 'btn btn-primary btn-sm position-fixed';
    backToTopButton.style.cssText = `
        bottom: 20px;
        right: 20px;
        z-index: 1000;
        border-radius: 50%;
        width: 45px;
        height: 45px;
        display: none;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    `;
    
    backToTopButton.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    document.body.appendChild(backToTopButton);
    
    // Show/hide based on scroll position
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            backToTopButton.style.display = 'block';
        } else {
            backToTopButton.style.display = 'none';
        }
    });
}

// Accessibility features
function initializeAccessibilityFeatures() {
    // Add focus indicators
    addFocusIndicators();
    
    // Add skip navigation
    addSkipNavigation();
    
    // Add aria labels where needed
    enhanceAriaLabels();
    
    // Add keyboard navigation for cards
    addCardKeyboardNavigation();
}

// Enhanced focus indicators
function addFocusIndicators() {
    const focusableElements = document.querySelectorAll('a, button, input, select, textarea, [tabindex]');
    
    focusableElements.forEach(function(element) {
        element.addEventListener('focus', function() {
            this.style.outline = '2px solid #0d6efd';
            this.style.outlineOffset = '2px';
        });
        
        element.addEventListener('blur', function() {
            this.style.outline = '';
            this.style.outlineOffset = '';
        });
    });
}

// Add skip navigation
function addSkipNavigation() {
    const skipLink = document.createElement('a');
    skipLink.href = '#main';
    skipLink.textContent = 'Skip to main content';
    skipLink.className = 'sr-only sr-only-focusable btn btn-primary position-absolute';
    skipLink.style.cssText = 'top: 10px; left: 10px; z-index: 9999;';
    
    document.body.insertBefore(skipLink, document.body.firstChild);
    
    // Add main landmark if not exists
    const main = document.querySelector('main');
    if (main && !main.id) {
        main.id = 'main';
    }
}

// Enhance ARIA labels
function enhanceAriaLabels() {
    // Add aria-label to progress bars
    const progressBars = document.querySelectorAll('.progress-bar');
    progressBars.forEach(function(bar) {
        if (!bar.getAttribute('aria-label')) {
            const value = bar.style.width.replace('%', '');
            bar.setAttribute('aria-label', `Progress: ${value}% complete`);
        }
    });
    
    // Add aria-describedby to form elements
    const formControls = document.querySelectorAll('.form-control, .form-check-input');
    formControls.forEach(function(control) {
        const helpText = control.parentNode.querySelector('.form-text, .text-muted');
        if (helpText && !helpText.id) {
            helpText.id = 'help-' + Math.random().toString(36).substr(2, 9);
            control.setAttribute('aria-describedby', helpText.id);
        }
    });
}

// Add keyboard navigation for cards
function addCardKeyboardNavigation() {
    const cards = document.querySelectorAll('.card');
    cards.forEach(function(card) {
        const link = card.querySelector('a');
        if (link) {
            card.setAttribute('tabindex', '0');
            card.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    link.click();
                }
            });
        }
    });
}

// Utility functions
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
    notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; max-width: 300px;';
    notification.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    document.body.appendChild(notification);
    
    // Auto-remove after 5 seconds
    setTimeout(function() {
        if (notification.parentNode) {
            notification.remove();
        }
    }, 5000);
}

// Handle form submissions with loading states
function handleFormSubmission(form, callback) {
    form.addEventListener('submit', function(e) {
        const submitButton = form.querySelector('button[type="submit"]');
        const originalText = submitButton.innerHTML;
        
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Loading...';
        submitButton.disabled = true;
        
        if (callback) {
            callback(e);
        }
        
        // Reset button after 3 seconds if form is still there
        setTimeout(function() {
            if (submitButton.parentNode) {
                submitButton.innerHTML = originalText;
                submitButton.disabled = false;
            }
        }, 3000);
    });
}

// Initialize tooltips and popovers if Bootstrap is available
if (typeof bootstrap !== 'undefined') {
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        
        // Initialize popovers
        const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl);
        });
    });
}

// Clear quiz progress when starting a new attempt
function clearQuizProgress(chapterId) {
    const key = `quiz_progress_chapter_${chapterId}`;
    localStorage.removeItem(key);
}

// Export functions for use in other scripts
window.CyberTraining = {
    showNotification: showNotification,
    handleFormSubmission: handleFormSubmission,
    clearQuizProgress: clearQuizProgress
};
