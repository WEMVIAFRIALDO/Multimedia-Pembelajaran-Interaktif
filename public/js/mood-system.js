/* ==========================================
   MOOD SYSTEM - JAVASCRIPT LOGIC
   ========================================== */

class MoodSystem {
    constructor() {
        this.moodMap = {
            fokus: 'fokus',
            focus: 'fokus',
            santai: 'santai',
            relax: 'santai',
            relaxed: 'santai',
            lelah: 'lelah',
            tired: 'lelah',
        };

        this.currentMood = this.normalizeMood(localStorage.getItem('mood')) || null;
        // Disable automatic dark-mode by default for the mood selection UI.
        // Set to true if you want time-based auto dark mode.
        this.autoDarkMode = false;
        this.darkMode = false;
        this.moods = {
            fokus: {
                name: 'Fokus',
                emoji: '📚',
                description: 'Mode konsentrasi tinggi dengan tema Navy/Gelap minimalis',
                colors: {
                    primary: '#1e3a5f',
                    secondary: '#2c5282',
                    light: '#eaf2f8',
                    accent: '#5a9fd4'
                }
            },
            santai: {
                name: 'Santai',
                emoji: '🌿',
                description: 'Mode rileks dengan tema Hijau Pastel yang menyejukkan',
                colors: {
                    primary: '#4a9b8e',
                    secondary: '#6db3a3',
                    light: '#e8f5f0',
                    accent: '#81c7b8'
                }
            },
            lelah: {
                name: 'Capek',
                emoji: '😴',
                description: 'Mode istirahat dengan Oranye hangat untuk mata yang lelah',
                colors: {
                    primary: '#c97e3f',
                    secondary: '#d4925f',
                    light: '#f5e9e0',
                    accent: '#e8a876'
                }
            }
        };

        this.lottieAnimations = {
            fokus: 'https://lottie.host/b69c1a92-a5fd-4de3-8d6c-0c3ec9e58bf0/lxYBBYTXXl.json', // Studying animation
            santai: 'https://lottie.host/e1a9b8c1-9e8b-4c5d-8f2e-1a5d7b6e9f2c/relaxAnimation.json', // Relaxing animation
            lelah: 'https://lottie.host/c8d9e0f1-a2b3-4c5d-6e7f-8a9b0c1d2e3f/sleepAnimation.json' // Sleeping animation
        };

        this.init();
    }

    init() {
        console.log('🎭 Initializing Mood System...');
        
        // Setup event listeners
        this.setupMoodSelectors();
        if (this.autoDarkMode) this.checkTimeForDarkMode();
        this.setupTimeDisplay();
        this.applyStoredMood();
        this.setupAutoSave();
        
        // Check time every minute
        if (this.autoDarkMode) setInterval(() => this.checkTimeForDarkMode(), 60000);
        // If auto dark mode is disabled, ensure dark mode is off on load
        if (!this.autoDarkMode) {
            this.disableDarkMode();
        }
        
        console.log('✅ Mood System initialized');
    }

    /**
     * Setup mood selector buttons
     */
    setupMoodSelectors() {
        const buttons = document.querySelectorAll('[data-mood]');
        buttons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const mood = btn.getAttribute('data-mood');
                this.setMood(mood);
            });
        });
    }

    /**
     * Set mood and apply theme
     */
    normalizeMood(mood) {
        if (!mood) {
            return null;
        }

        return this.moodMap[mood.toLowerCase().trim()] || null;
    }

    setMood(mood) {
        const normalizedMood = this.normalizeMood(mood);
        if (!normalizedMood || !this.moods[normalizedMood]) {
            console.error('❌ Invalid mood:', mood);
            return;
        }

        this.currentMood = normalizedMood;
        localStorage.setItem('mood', normalizedMood);
        
        // Update UI
        this.applyMoodTheme(normalizedMood);
        
        // Show confirmation
        console.log(`🎨 Mood changed to: ${this.moods[normalizedMood].name}`);
        this.showMoodNotification(this.moods[normalizedMood].name);

        // Save to database via AJAX
        this.saveMoodToDatabase(normalizedMood);
    }

    /**
     * Apply mood theme to the page
     */
    applyMoodTheme(mood) {
        const normalizedMood = this.normalizeMood(mood);
        if (!normalizedMood || !this.moods[normalizedMood]) {
            return;
        }

        const body = document.body;
        const colors = this.moods[normalizedMood].colors;

        // Remove all known mood classes but preserve dark mode if already active
        body.classList.remove('mood-focus', 'mood-fokus', 'mood-relax', 'mood-relaxed', 'mood-santai', 'mood-tired', 'mood-lelah');
        body.classList.add(`mood-${normalizedMood}`);
        if (normalizedMood === 'fokus') {
            body.classList.add('mood-focus');
        } else if (normalizedMood === 'santai') {
            body.classList.add('mood-relax');
        } else if (normalizedMood === 'lelah') {
            body.classList.add('mood-tired');
        }

        // Update CSS variables
        document.documentElement.style.setProperty('--current-primary', colors.primary);
        document.documentElement.style.setProperty('--current-secondary', colors.secondary);
        document.documentElement.style.setProperty('--current-light', colors.light);
        document.documentElement.style.setProperty('--current-accent', colors.accent);

        // Update active button
        document.querySelectorAll('[data-mood]').forEach(btn => {
            btn.classList.remove('active', 'ring-2', 'ring-offset-2');
            if (this.normalizeMood(btn.getAttribute('data-mood')) === normalizedMood) {
                btn.classList.add('active', 'ring-2', 'ring-offset-2');
                btn.style.setProperty('--tw-ring-color', colors.accent);
            }
        });

        // Update glow effects on cards
        this.updateGlowEffects(normalizedMood);

        // Update Lottie animation if present
        this.updateLottieAnimation(normalizedMood);
    }

    /**
     * Update glow effects on cards based on mood
     */
    updateGlowEffects(mood) {
        const normalizedMood = this.normalizeMood(mood);
        if (!normalizedMood) {
            return;
        }

        const cards = document.querySelectorAll('.glass-card');
        cards.forEach(card => {
            card.classList.remove('mood-focus', 'mood-fokus', 'mood-relax', 'mood-relaxed', 'mood-santai', 'mood-tired', 'mood-lelah');
            card.classList.add(`mood-${normalizedMood}`);
            if (normalizedMood === 'fokus') {
                card.classList.add('mood-focus');
            } else if (normalizedMood === 'santai') {
                card.classList.add('mood-relax');
            } else if (normalizedMood === 'lelah') {
                card.classList.add('mood-tired');
            }
        });
    }

    /**
     * Update Lottie animation based on mood
     */
    updateLottieAnimation(mood) {
        const normalizedMood = this.normalizeMood(mood);
        const lottieContainer = document.getElementById('mood-animation');
        if (!lottieContainer) return;

        const player = lottieContainer.querySelector('lottie-player');
        if (player) {
            const animationUrl = this.lottieAnimations[normalizedMood];
            if (animationUrl) {
                player.setAttribute('src', animationUrl);
                player.play();
            }
        }
    }

    /**
     * Check time for automatic dark mode
     */
    checkTimeForDarkMode() {
        if (!this.autoDarkMode) return;
        const now = new Date();
        const hour = now.getHours();
        
        const isDarkTime = hour >= 19 || hour < 5; // 7 PM to 5 AM
        
        if (isDarkTime && !this.darkMode) {
            this.enableDarkMode();
        } else if (!isDarkTime && this.darkMode) {
            this.disableDarkMode();
        }

        // Update dark mode indicator
        this.updateDarkModeIndicator(isDarkTime);
    }

    /**
     * Enable dark mode
     */
    enableDarkMode() {
        this.darkMode = true;
        document.body.classList.add('dark-mode');
        
        // Update all cards to dark mode style
        document.querySelectorAll('.glass-card').forEach(card => {
            card.style.setProperty('background', 'rgba(31, 41, 55, 0.4)');
        });

        console.log('🌙 Dark Mode activated (Auto)');
    }

    /**
     * Disable dark mode
     */
    disableDarkMode() {
        this.darkMode = false;
        document.body.classList.remove('dark-mode');
        
        // Reapply mood theme
        if (this.currentMood) {
            this.applyMoodTheme(this.currentMood);
        }

        console.log('☀️ Dark Mode deactivated');
    }

    /**
     * Setup time display
     */
    setupTimeDisplay() {
        const updateTime = () => {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
            
            const dateString = now.toLocaleDateString('id-ID', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            const timeDisplay = document.querySelector('.time-display .time');
            const dateDisplay = document.querySelector('.time-display .date');
            
            if (timeDisplay) timeDisplay.textContent = timeString;
            if (dateDisplay) dateDisplay.textContent = dateString;
        };

        updateTime();
        setInterval(updateTime, 1000);
    }

    /**
     * Update dark mode indicator
     */
    updateDarkModeIndicator(isDarkTime) {
        const indicator = document.querySelector('.dark-mode-indicator');
        if (!indicator) return;

        if (isDarkTime) {
            indicator.classList.add('active');
            indicator.innerHTML = '🌙 Dark Mode Aktif (Otomatis)';
        } else {
            indicator.classList.remove('active');
            indicator.innerHTML = '☀️ Light Mode';
        }
    }

    /**
     * Apply stored mood on page load
     */
    applyStoredMood() {
        const pageMood = this.normalizeMood(document.body.className.match(/mood-(\w+)/)?.[1]);
        const mood = this.currentMood || pageMood;
        if (mood) {
            this.applyMoodTheme(mood);
        }
    }

    /**
     * Setup auto-save every 30 seconds
     */
    setupAutoSave() {
        setInterval(() => {
            if (this.currentMood) {
                this.saveMoodToDatabase(this.currentMood);
            }
        }, 30000);
    }

    /**
     * Save mood to database
     */
    saveMoodToDatabase(mood) {
        const normalizedMood = this.normalizeMood(mood);
        if (!normalizedMood) {
            return;
        }

        fetch('/mood/update', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': this.getCSRFToken()
            },
            body: JSON.stringify({ mood: normalizedMood })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('✅ Mood saved to database');
            }
        })
        .catch(error => console.error('❌ Error saving mood:', error));
    }

    /**
     * Show mood change notification
     */
    showMoodNotification(moodName) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = 'fixed top-4 right-4 bg-white shadow-lg rounded-lg px-6 py-4 flex items-center space-x-3 z-50 animate-bounce';
        notification.innerHTML = `
            <span class="text-2xl">${this.moods[this.currentMood].emoji}</span>
            <div>
                <p class="font-semibold text-gray-900">Mode ${moodName}</p>
                <p class="text-sm text-gray-600">${this.moods[this.currentMood].description}</p>
            </div>
        `;

        document.body.appendChild(notification);

        // Remove notification after 4 seconds
        setTimeout(() => {
            notification.remove();
        }, 4000);
    }

    /**
     * Get CSRF token from meta tag
     */
    getCSRFToken() {
        return document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    }
}

/**
 * Progress Bar Animation System
 */
class ProgressBarSystem {
    constructor() {
        this.init();
    }

    init() {
        this.setupProgressBars();
        this.observeProgressChanges();
    }

    /**
     * Setup progress bars with animations
     */
    setupProgressBars() {
        const progressBars = document.querySelectorAll('[data-progress]');
        progressBars.forEach(bar => {
            const progress = parseInt(bar.getAttribute('data-progress'));
            const mood = this.normalizeMood(document.body.className.match(/mood-(\w+)/)?.[1]) || 'fokus';
            
            // Set progress with animation
            this.animateProgressBar(bar, progress, mood);
        });
    }

    /**
     * Animate progress bar to target value
     */
    animateProgressBar(element, targetProgress, mood) {
        const bar = element.querySelector('.progress-bar') || element;
        let currentProgress = 0;
        const increment = targetProgress / 30; // Animate over 30 frames
        const moodClassMap = {
            fokus: 'focus',
            santai: 'relax',
            lelah: 'tired'
        };
        const themeMood = moodClassMap[mood] || mood;
        const mood_class = `progress-bar-${themeMood}`;
        
        bar.classList.add('progress-bar-animated', mood_class);

        const animate = () => {
            if (currentProgress < targetProgress) {
                currentProgress += increment;
                bar.style.width = Math.min(currentProgress, targetProgress) + '%';
                bar.setAttribute('aria-valuenow', Math.min(currentProgress, targetProgress));
                requestAnimationFrame(animate);
            }
        };

        animate();
    }

    /**
     * Observe progress changes
     */
    observeProgressChanges() {
        const observer = new MutationObserver((mutations) => {
            mutations.forEach(mutation => {
                if (mutation.type === 'attributes' && mutation.attributeName === 'data-progress') {
                    const progress = parseInt(mutation.target.getAttribute('data-progress'));
                    const mood = this.normalizeMood(document.body.className.match(/mood-(\w+)/)?.[1]) || 'fokus';
                    this.animateProgressBar(mutation.target, progress, mood);
                }
            });
        });

        document.querySelectorAll('[data-progress]').forEach(el => {
            observer.observe(el, { attributes: true });
        });
    }
}

/**
 * Micro-Interactions System
 */
class MicroInteractions {
    constructor() {
        this.init();
    }

    init() {
        this.setupCardHovers();
        this.setupButtonRipples();
    }

    /**
     * Setup card hover effects
     */
    setupCardHovers() {
        const cards = document.querySelectorAll('.glass-card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.classList.add('glow-effect');
            });

            card.addEventListener('mouseleave', () => {
                card.classList.remove('glow-effect');
            });
        });
    }

    /**
     * Setup button ripple effect
     */
    setupButtonRipples() {
        const buttons = document.querySelectorAll('button, [role="button"]');
        buttons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                const rect = btn.getBoundingClientRect();
                const ripple = document.createElement('span');
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                ripple.style.cssText = `
                    position: absolute;
                    left: ${x}px;
                    top: ${y}px;
                    width: ${size}px;
                    height: ${size}px;
                    background: rgba(255, 255, 255, 0.5);
                    border-radius: 50%;
                    animation: ripple 0.6s ease-out;
                `;

                btn.style.position = 'relative';
                btn.style.overflow = 'hidden';
                btn.appendChild(ripple);

                setTimeout(() => ripple.remove(), 600);
            });
        });
    }
}

/* ========== INITIALIZE ON DOM READY ========== */
document.addEventListener('DOMContentLoaded', () => {
    // Initialize all systems
    const moodSystem = new MoodSystem();
    const progressSystem = new ProgressBarSystem();
    const interactions = new MicroInteractions();

    // Make systems globally accessible for debugging
    window.moodSystem = moodSystem;
    window.progressSystem = progressSystem;
    window.interactions = interactions;

    console.log('🎯 All systems initialized');
});

// Add CSS animation for ripple effect
if (!document.querySelector('style[data-ripple]')) {
    const style = document.createElement('style');
    style.setAttribute('data-ripple', 'true');
    style.textContent = `
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);
}
