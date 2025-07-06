<?php
// Helper functions for Cybersecurity Training Platform

/**
 * Get quiz questions for a specific chapter
 * @param int $chapterId The chapter ID
 * @return array Array of quiz questions
 */
function getQuizQuestions($chapterId) {
    $quizQuestions = array(
        1 => array( // Password and MFA Security
            array(
                'question' => 'What is the minimum recommended length for a strong password?',
                'options' => array('6 characters', '8 characters', '12 characters', '16 characters'),
                'correct' => 2
            ),
            array(
                'question' => 'Which of the following is an example of multi-factor authentication?',
                'options' => array('Password only', 'Password + SMS code', 'Security question only', 'Username only'),
                'correct' => 1
            ),
            array(
                'question' => 'What should you do if you suspect your password has been compromised?',
                'options' => array('Wait and see', 'Change it immediately', 'Use it on fewer sites', 'Make it longer'),
                'correct' => 1
            )
        ),
        2 => array( // Malware/Virus/Trojan awareness
            array(
                'question' => 'What is the primary difference between a virus and a trojan?',
                'options' => array('Viruses spread, trojans disguise themselves', 'No difference', 'Trojans are worse', 'Viruses are newer'),
                'correct' => 0
            ),
            array(
                'question' => 'Which is the best protection against malware?',
                'options' => array('Antivirus software only', 'Regular updates + antivirus + careful browsing', 'Avoiding internet', 'Using older software'),
                'correct' => 1
            ),
            array(
                'question' => 'What should you do if you receive an unexpected email attachment?',
                'options' => array('Open it immediately', 'Scan it first', 'Delete without opening', 'Forward to friends'),
                'correct' => 2
            )
        ),
        3 => array( // Phishing
            array(
                'question' => 'What is a common sign of a phishing email?',
                'options' => array('Perfect grammar', 'Urgent action required', 'Personalized greeting', 'Company logo'),
                'correct' => 1
            ),
            array(
                'question' => 'Where should you check if an email link is legitimate?',
                'options' => array('Click and see', 'Hover over the link', 'Ask friends', 'Ignore it'),
                'correct' => 1
            ),
            array(
                'question' => 'What should you do if you accidentally clicked a phishing link?',
                'options' => array('Nothing', 'Change passwords immediately', 'Turn off computer', 'Delete browser'),
                'correct' => 1
            )
        ),
        4 => array( // ID theft / personal info security
            array(
                'question' => 'Which information should you never share on social media?',
                'options' => array('Your hobbies', 'Your full address and phone number', 'Your favorite movies', 'Your pet\'s name'),
                'correct' => 1
            ),
            array(
                'question' => 'How often should you check your credit report?',
                'options' => array('Never', 'Once a year', 'At least annually', 'Only when applying for credit'),
                'correct' => 2
            ),
            array(
                'question' => 'What should you do with documents containing personal information before disposal?',
                'options' => array('Throw them away', 'Shred them', 'Burn them', 'Recycle them'),
                'correct' => 1
            )
        ),
        5 => array( // Safe Browsing Practices
            array(
                'question' => 'What does HTTPS indicate about a website?',
                'options' => array('It\'s free', 'It\'s encrypted', 'It\'s fast', 'It\'s popular'),
                'correct' => 1
            ),
            array(
                'question' => 'Which browser setting enhances security?',
                'options' => array('Disable all security', 'Block pop-ups', 'Allow all cookies', 'Auto-download files'),
                'correct' => 1
            ),
            array(
                'question' => 'What should you do before downloading software from the internet?',
                'options' => array('Download immediately', 'Verify the source', 'Ask friends', 'Check the price'),
                'correct' => 1
            )
        ),
        6 => array( // Public WiFi
            array(
                'question' => 'What is the main risk of using public WiFi?',
                'options' => array('Slow speed', 'Data interception', 'High cost', 'Limited time'),
                'correct' => 1
            ),
            array(
                'question' => 'Which is the safest way to use public WiFi?',
                'options' => array('Direct connection', 'Using a VPN', 'Using mobile data', 'Avoiding it completely'),
                'correct' => 1
            ),
            array(
                'question' => 'What should you avoid doing on public WiFi?',
                'options' => array('Reading news', 'Online banking', 'Checking weather', 'Browsing social media'),
                'correct' => 1
            )
        ),
        7 => array( // Social Media Privacy and Security
            array(
                'question' => 'What is the best privacy setting for social media posts?',
                'options' => array('Public', 'Friends only', 'Custom', 'No posts'),
                'correct' => 1
            ),
            array(
                'question' => 'How often should you review your social media privacy settings?',
                'options' => array('Never', 'Regularly', 'Once', 'When required'),
                'correct' => 1
            ),
            array(
                'question' => 'What should you do before accepting friend requests?',
                'options' => array('Accept all', 'Verify the person', 'Reject all', 'Ask for ID'),
                'correct' => 1
            )
        ),
        8 => array( // Data Backup and Recovery
            array(
                'question' => 'How often should you backup important data?',
                'options' => array('Never', 'Regularly', 'Once a year', 'Only when computer breaks'),
                'correct' => 1
            ),
            array(
                'question' => 'What is the 3-2-1 backup rule?',
                'options' => array('3 copies, 2 locations, 1 offline', '3 drives, 2 computers, 1 cloud', '3 times, 2 methods, 1 person', '3 folders, 2 names, 1 password'),
                'correct' => 0
            ),
            array(
                'question' => 'Which backup method is most secure from ransomware?',
                'options' => array('External drive always connected', 'Cloud storage only', 'Offline backup', 'Network backup'),
                'correct' => 2
            )
        ),
        9 => array( // Fake Websites & Online Scams
            array(
                'question' => 'How can you identify a fake website?',
                'options' => array('Good design', 'Check URL carefully', 'Bright colors', 'Many ads'),
                'correct' => 1
            ),
            array(
                'question' => 'What is a common characteristic of online scams?',
                'options' => array('Detailed information', 'Too good to be true offers', 'Professional appearance', 'Slow response'),
                'correct' => 1
            ),
            array(
                'question' => 'What should you do if you encounter a suspicious website?',
                'options' => array('Explore more', 'Leave immediately', 'Download content', 'Share with friends'),
                'correct' => 1
            )
        ),
        10 => array( // Cyberbullying awareness and Digital Wellbeing
            array(
                'question' => 'What is the best response to cyberbullying?',
                'options' => array('Fight back online', 'Block and report', 'Ignore completely', 'Delete all accounts'),
                'correct' => 1
            ),
            array(
                'question' => 'How can you maintain digital wellbeing?',
                'options' => array('Use devices 24/7', 'Set screen time limits', 'Never go offline', 'Only use work devices'),
                'correct' => 1
            ),
            array(
                'question' => 'What should you do if someone is being cyberbullied?',
                'options' => array('Join in', 'Report and support the victim', 'Ignore it', 'Screenshot and share'),
                'correct' => 1
            )
        ),
        11 => array( // Device Encryption and Securing Mobile Devices
            array(
                'question' => 'What does device encryption protect against?',
                'options' => array('Viruses', 'Data theft if device is stolen', 'Battery drain', 'Slow performance'),
                'correct' => 1
            ),
            array(
                'question' => 'Which mobile security feature should always be enabled?',
                'options' => array('Screen lock', 'Bluetooth', 'Location services', 'Auto-backup'),
                'correct' => 0
            ),
            array(
                'question' => 'What should you do if your mobile device is lost or stolen?',
                'options' => array('Wait for it to return', 'Remote wipe immediately', 'Call the device', 'Post on social media'),
                'correct' => 1
            )
        ),
        12 => array( // Cloud Storage Security
            array(
                'question' => 'What is the main security concern with cloud storage?',
                'options' => array('Storage limits', 'Data accessibility by others', 'Upload speed', 'File formats'),
                'correct' => 1
            ),
            array(
                'question' => 'How should you secure your cloud storage account?',
                'options' => array('Simple password', 'Strong password + 2FA', 'Share credentials', 'Auto-login'),
                'correct' => 1
            ),
            array(
                'question' => 'What should you avoid storing in cloud storage?',
                'options' => array('Photos', 'Highly sensitive unencrypted data', 'Documents', 'Music'),
                'correct' => 1
            )
        ),
        13 => array( // Safe Online Shopping & Payment Security
            array(
                'question' => 'What should you check before entering payment information online?',
                'options' => array('Website color', 'HTTPS and security certificates', 'Number of products', 'Website age'),
                'correct' => 1
            ),
            array(
                'question' => 'Which payment method is generally safest for online shopping?',
                'options' => array('Debit card', 'Credit card', 'Bank transfer', 'Cash on delivery'),
                'correct' => 1
            ),
            array(
                'question' => 'What should you do after making an online purchase?',
                'options' => array('Nothing', 'Monitor your account statements', 'Share receipt online', 'Disable security'),
                'correct' => 1
            )
        ),
        14 => array( // Understanding Spyware and Keyloggers
            array(
                'question' => 'What is the primary purpose of a keylogger?',
                'options' => array('Speed up typing', 'Record keystrokes', 'Improve security', 'Clean keyboard'),
                'correct' => 1
            ),
            array(
                'question' => 'How can you protect against spyware?',
                'options' => array('Install any software', 'Use reputable antivirus', 'Disable all security', 'Share passwords'),
                'correct' => 1
            ),
            array(
                'question' => 'What is a sign that your device might have spyware?',
                'options' => array('Faster performance', 'Unusual network activity', 'Better battery life', 'Cleaner interface'),
                'correct' => 1
            )
        ),
        15 => array( // Email Security Best Practices
            array(
                'question' => 'What should you check before clicking email links?',
                'options' => array('Sender reputation and URL', 'Email length', 'Font size', 'Color scheme'),
                'correct' => 0
            ),
            array(
                'question' => 'How should you handle suspicious email attachments?',
                'options' => array('Open immediately', 'Don\'t open, delete or report', 'Forward to others', 'Save to desktop'),
                'correct' => 1
            ),
            array(
                'question' => 'What is the best practice for email passwords?',
                'options' => array('Use same as other accounts', 'Unique and strong', 'Short and simple', 'Share with colleagues'),
                'correct' => 1
            )
        ),
        16 => array( // Cyber Ethics and Responsible Online Behaviour
            array(
                'question' => 'What is considered ethical online behavior?',
                'options' => array('Respecting others\' privacy and rights', 'Sharing personal information', 'Copying content freely', 'Ignoring terms of service'),
                'correct' => 0
            ),
            array(
                'question' => 'How should you handle copyrighted material online?',
                'options' => array('Use freely', 'Respect copyright laws', 'Copy without attribution', 'Sell without permission'),
                'correct' => 1
            ),
            array(
                'question' => 'What should you do if you witness cyberbullying?',
                'options' => array('Join in', 'Report and support victim', 'Ignore it', 'Encourage it'),
                'correct' => 1
            )
        ),
        17 => array( // Recognizing Deepfakes and Misinformation
            array(
                'question' => 'What is a deepfake?',
                'options' => array('Deep ocean fake', 'AI-generated fake media', 'Deep web content', 'Fake profile'),
                'correct' => 1
            ),
            array(
                'question' => 'How can you identify potential misinformation?',
                'options' => array('Share immediately', 'Check multiple reliable sources', 'Believe if shared often', 'Trust emotional content'),
                'correct' => 1
            ),
            array(
                'question' => 'What should you do before sharing news online?',
                'options' => array('Share immediately', 'Verify the source', 'Add personal opinion', 'Change the headline'),
                'correct' => 1
            )
        ),
        18 => array( // App Permissions and Data Collection
            array(
                'question' => 'When should you review app permissions?',
                'options' => array('Never', 'Before installation and regularly', 'After problems occur', 'Only when asked'),
                'correct' => 1
            ),
            array(
                'question' => 'Which app permission should you be most cautious about?',
                'options' => array('Access to camera/microphone', 'Access to calculator', 'Access to clock', 'Access to weather'),
                'correct' => 0
            ),
            array(
                'question' => 'How can you minimize data collection by apps?',
                'options' => array('Grant all permissions', 'Review and limit permissions', 'Never use apps', 'Share more data'),
                'correct' => 1
            )
        ),
        19 => array( // Insider Risk
            array(
                'question' => 'What is an insider threat?',
                'options' => array('External hacker', 'Risk from inside the organization', 'Outside consultant', 'Customer complaint'),
                'correct' => 1
            ),
            array(
                'question' => 'How can organizations reduce insider risk?',
                'options' => array('Trust everyone completely', 'Implement access controls and monitoring', 'Share all information', 'Remove all security'),
                'correct' => 1
            ),
            array(
                'question' => 'What should you do if you notice suspicious colleague behavior?',
                'options' => array('Ignore it', 'Report to appropriate authorities', 'Confront directly', 'Gossip about it'),
                'correct' => 1
            )
        ),
        20 => array( // Securing smart devices: IoT security fundamentals
            array(
                'question' => 'What is the first thing you should do with a new IoT device?',
                'options' => array('Use default settings', 'Change default passwords', 'Connect to public WiFi', 'Share access widely'),
                'correct' => 1
            ),
            array(
                'question' => 'Why are IoT devices often security risks?',
                'options' => array('They\'re too fast', 'Weak default security', 'Too expensive', 'Too small'),
                'correct' => 1
            ),
            array(
                'question' => 'How should you maintain IoT device security?',
                'options' => array('Never update', 'Regular firmware updates', 'Share passwords', 'Disable all features'),
                'correct' => 1
            )
        )
    );
    
    return isset($quizQuestions[$chapterId]) ? $quizQuestions[$chapterId] : array();
}

/**
 * Check if a chapter is completed
 * @param int $chapterId The chapter ID
 * @return bool True if completed, false otherwise
 */
function isChapterCompleted($chapterId) {
    if (!isset($_SESSION['chapter_progress'])) {
        $_SESSION['chapter_progress'] = array();
    }
    return in_array($chapterId, $_SESSION['chapter_progress']);
}

/**
 * Mark a chapter as completed
 * @param int $chapterId The chapter ID
 */
function markChapterCompleted($chapterId) {
    if (!isset($_SESSION['chapter_progress'])) {
        $_SESSION['chapter_progress'] = array();
    }
    if (!in_array($chapterId, $_SESSION['chapter_progress'])) {
        $_SESSION['chapter_progress'][] = $chapterId;
    }
}

/**
 * Get completion percentage
 * @return float Completion percentage
 */
function getCompletionPercentage() {
    global $chapters;
    if (!isset($_SESSION['chapter_progress'])) {
        return 0;
    }
    return (count($_SESSION['chapter_progress']) / count($chapters)) * 100;
}

/**
 * Sanitize input to prevent XSS
 * @param string $input The input to sanitize
 * @return string Sanitized input
 */
function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

/**
 * Validate chapter ID
 * @param mixed $chapterId The chapter ID to validate
 * @return int|false Valid chapter ID or false
 */
function validateChapterId($chapterId) {
    global $chapters;
    $id = intval($chapterId);
    return (isset($chapters[$id])) ? $id : false;
}

/**
 * Get next chapter ID
 * @param int $currentChapterId Current chapter ID
 * @return int|null Next chapter ID or null if last chapter
 */
function getNextChapterId($currentChapterId) {
    global $chapters;
    $nextId = $currentChapterId + 1;
    return isset($chapters[$nextId]) ? $nextId : null;
}

/**
 * Get previous chapter ID
 * @param int $currentChapterId Current chapter ID
 * @return int|null Previous chapter ID or null if first chapter
 */
function getPreviousChapterId($currentChapterId) {
    $prevId = $currentChapterId - 1;
    return ($prevId >= 1) ? $prevId : null;
}

/**
 * Check if all chapters are completed
 * @return bool True if all completed, false otherwise
 */
function areAllChaptersCompleted() {
    global $chapters;
    if (!isset($_SESSION['chapter_progress'])) {
        return false;
    }
    return count($_SESSION['chapter_progress']) >= count($chapters);
}

/**
 * Reset progress (for testing or admin purposes)
 */
function resetProgress() {
    $_SESSION['chapter_progress'] = array();
}

/**
 * Get chapter content file path
 * @param int $chapterId The chapter ID
 * @return string File path
 */
function getChapterContentPath($chapterId) {
    return "course/chapter{$chapterId}/content.html";
}

/**
 * Check if chapter content exists
 * @param int $chapterId The chapter ID
 * @return bool True if content exists, false otherwise
 */
function chapterContentExists($chapterId) {
    $contentPath = getChapterContentPath($chapterId);
    return file_exists($contentPath) && !empty(file_get_contents($contentPath));
}

/**
 * Generate breadcrumb navigation
 * @param array $items Breadcrumb items
 * @return string HTML breadcrumb
 */
function generateBreadcrumb($items) {
    $html = '<nav aria-label="breadcrumb"><ol class="breadcrumb mb-0">';
    
    $count = count($items);
    foreach ($items as $index => $item) {
        $isLast = ($index === $count - 1);
        
        if ($isLast) {
            $html .= '<li class="breadcrumb-item active text-white" aria-current="page">' . 
                     htmlspecialchars($item['text']) . '</li>';
        } else {
            $html .= '<li class="breadcrumb-item"><a href="' . 
                     htmlspecialchars($item['url']) . '" class="text-white-50">' . 
                     htmlspecialchars($item['text']) . '</a></li>';
        }
    }
    
    $html .= '</ol></nav>';
    return $html;
}

/**
 * Log activity (for debugging or analytics)
 * @param string $action The action performed
 * @param array $data Additional data
 */
function logActivity($action, $data = array()) {
    $logEntry = array(
        'timestamp' => date('Y-m-d H:i:s'),
        'action' => $action,
        'session_id' => session_id(),
        'data' => $data
    );
    
    // In a production environment, you might want to log to a file or database
    // For now, we'll just store in session for debugging
    if (!isset($_SESSION['activity_log'])) {
        $_SESSION['activity_log'] = array();
    }
    $_SESSION['activity_log'][] = $logEntry;
    
    // Keep only last 50 entries to prevent session bloat
    if (count($_SESSION['activity_log']) > 50) {
        $_SESSION['activity_log'] = array_slice($_SESSION['activity_log'], -50);
    }
}
?>
