# CyberNest - Cybersecurity Training Website

## Overview

This is a comprehensive cybersecurity training website called "CyberNest" built as a course content platform. The system provides 20 chapters of cybersecurity education covering topics from password security to IoT device protection, followed by an assessment quiz. The platform is designed to be user-friendly, accessible, and educational without requiring database connectivity.

## System Architecture

The application follows a simple, file-based architecture using vanilla web technologies:

- **Frontend**: HTML pages with Bootstrap CSS framework for responsive design
- **Styling**: Custom CSS with modern design elements and animations
- **Interactivity**: Vanilla JavaScript for dynamic functionality
- **Content Management**: File-based system with HTML content files
- **Assessment**: JavaScript-based quiz system with local storage

## Key Components

### 1. Landing Page System
- Course overview and introduction
- "Start Training" button for navigation
- Survey access point for feedback collection
- Hero section with course highlights

### 2. Chapter Navigation
- 20-chapter structure covering comprehensive cybersecurity topics
- Progress tracking with visual indicators
- Flexible navigation allowing users to access any chapter
- Completion status management using local storage

### 3. Content Delivery System
- HTML-based content files stored in `course/chapter{n}/content.html`
- Rich content with alerts, cards, and interactive elements
- Consistent formatting using Bootstrap components
- Accessible design with proper heading structure

### 4. Assessment System
- Quiz functionality with predefined questions and answers
- Score calculation and display
- No chapter locking - users can access quiz anytime
- Results presentation with performance feedback

### 5. Progress Tracking
- Client-side progress management
- Visual progress indicators and completion badges
- Auto-save functionality for user state
- Animated progress bars and completion status

## Data Flow

1. **User Entry**: Landing page introduces the course and provides entry point
2. **Chapter Selection**: Users navigate to chapter overview page
3. **Content Consumption**: Individual chapter content loaded from HTML files
4. **Progress Updates**: JavaScript updates completion status in local storage
5. **Assessment**: Quiz system presents questions and calculates scores
6. **Feedback Loop**: Survey system allows user feedback collection

## External Dependencies

- **Bootstrap 5**: CSS framework for responsive design and components
- **Font Awesome**: Icon library for visual elements
- **Google Fonts (Segoe UI fallback)**: Typography enhancement

## Deployment Strategy

The application is designed for simple static hosting:

- **No server-side processing required**
- **No database dependencies**
- **Pure client-side functionality**
- **Compatible with any web server or CDN**
- **Mobile-responsive design for cross-device access**

The file-based architecture makes it easy to:
- Deploy to static hosting platforms
- Update content by replacing HTML files
- Scale horizontally without backend concerns
- Maintain without complex infrastructure

## Changelog

- July 06, 2025. Initial setup

## User Preferences

Preferred communication style: Simple, everyday language.