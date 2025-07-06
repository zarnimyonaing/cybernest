<?php
// Configuration file for Cybersecurity Training Platform

// Session configuration - only set if session hasn't started yet
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_httponly', 1);
    ini_set('session.use_strict_mode', 1);
    ini_set('session.cookie_secure', 0); // Set to 1 if using HTTPS
}

// Define the 20 cybersecurity training chapters
$chapters = array(
    1 => array(
        'title' => 'Password and MFA Security',
        'description' => 'Learn about creating strong passwords and implementing multi-factor authentication for enhanced security.',
        'file' => 'content.html'
    ),
    2 => array(
        'title' => 'Malware/Virus/Trojan Awareness',
        'description' => 'Understand different types of malicious software and how to protect against them.',
        'file' => 'content.html'
    ),
    3 => array(
        'title' => 'Phishing',
        'description' => 'Identify and avoid phishing attacks that attempt to steal your personal information.',
        'file' => 'content.html'
    ),
    4 => array(
        'title' => 'ID Theft / Personal Info Security',
        'description' => 'Protect your personal information and prevent identity theft.',
        'file' => 'content.html'
    ),
    5 => array(
        'title' => 'Safe Browsing Practices',
        'description' => 'Browse the internet safely and recognize potential threats.',
        'file' => 'content.html'
    ),
    6 => array(
        'title' => 'Public WiFi',
        'description' => 'Safely use public WiFi networks and understand the associated risks.',
        'file' => 'content.html'
    ),
    7 => array(
        'title' => 'Social Media Privacy and Security',
        'description' => 'Secure your social media accounts and protect your privacy online.',
        'file' => 'content.html'
    ),
    8 => array(
        'title' => 'Data Backup and Recovery',
        'description' => 'Implement effective backup strategies to protect your important data.',
        'file' => 'content.html'
    ),
    9 => array(
        'title' => 'Fake Websites & Online Scams',
        'description' => 'Recognize and avoid fake websites and various online scams.',
        'file' => 'content.html'
    ),
    10 => array(
        'title' => 'Cyberbullying Awareness and Digital Wellbeing',
        'description' => 'Understand cyberbullying and maintain healthy digital habits.',
        'file' => 'content.html'
    ),
    11 => array(
        'title' => 'Device Encryption and Securing Mobile Devices',
        'description' => 'Encrypt your devices and secure your mobile phones and tablets.',
        'file' => 'content.html'
    ),
    12 => array(
        'title' => 'Cloud Storage Security',
        'description' => 'Securely use cloud storage services and protect your data in the cloud.',
        'file' => 'content.html'
    ),
    13 => array(
        'title' => 'Safe Online Shopping & Payment Security',
        'description' => 'Shop online safely and protect your payment information.',
        'file' => 'content.html'
    ),
    14 => array(
        'title' => 'Understanding Spyware and Keyloggers',
        'description' => 'Learn about spyware and keyloggers and how to protect against them.',
        'file' => 'content.html'
    ),
    15 => array(
        'title' => 'Email Security Best Practices',
        'description' => 'Secure your email communications and recognize email threats.',
        'file' => 'content.html'
    ),
    16 => array(
        'title' => 'Cyber Ethics and Responsible Online Behaviour',
        'description' => 'Understand ethical behavior online and your digital responsibilities.',
        'file' => 'content.html'
    ),
    17 => array(
        'title' => 'Recognizing Deepfakes and Misinformation',
        'description' => 'Identify deepfakes and combat misinformation online.',
        'file' => 'content.html'
    ),
    18 => array(
        'title' => 'App Permissions and Data Collection',
        'description' => 'Manage app permissions and understand how your data is collected.',
        'file' => 'content.html'
    ),
    19 => array(
        'title' => 'Insider Risk',
        'description' => 'Understand and mitigate risks from insider threats.',
        'file' => 'content.html'
    ),
    20 => array(
        'title' => 'Securing Smart Devices: IoT Security Fundamentals',
        'description' => 'Secure your smart home devices and understand IoT security basics.',
        'file' => 'content.html'
    )
);

// Site configuration
define('SITE_NAME', 'CyberNest');
define('SITE_DESCRIPTION', 'Comprehensive cybersecurity training for individuals and organizations');
define('SITE_VERSION', '1.0.0');

// Error reporting (disabled for clean user experience)
error_reporting(0);
ini_set('display_errors', 0);

// Timezone setting
date_default_timezone_set('UTC');

// Security headers
function setSecurityHeaders() {
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('X-XSS-Protection: 1; mode=block');
    header('Referrer-Policy: strict-origin-when-cross-origin');
}

// Call security headers function
setSecurityHeaders();
?>
