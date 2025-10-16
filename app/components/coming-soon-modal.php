<!-- Coming Soon Modal Component -->
<div id="comingSoonModal" class="coming-soon-modal" style="display: none;">
    <div class="coming-soon-overlay"></div>
    <div class="coming-soon-content">
        <!-- Go Back Button -->
        <button class="coming-soon-close" onclick="goBackFromModal()" aria-label="Go Back">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M19 12H5M12 19l-7-7 7-7"/>
            </svg>
            <span style="margin-left: 0.5rem; font-weight: 600;">Go Back</span>
        </button>

        <!-- Modal Content -->
        <div class="coming-soon-body">
            <!-- Left Column -->
            <div class="coming-soon-left">
                <!-- Title -->
                <h2 class="coming-soon-title">Coming Soon!</h2>
                
                <!-- Description -->
                <p class="coming-soon-description">
                    We're working hard to bring you something amazing. This feature will be available soon. Stay tuned for updates!
                </p>

                <!-- Features List -->
                <div class="coming-soon-features">
                    <div class="feature-item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>New and exciting features</span>
                    </div>
                    <div class="feature-item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>Enhanced user experience</span>
                    </div>
                    <div class="feature-item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>Worth the wait</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="coming-soon-actions">
                    <button onclick="goToHomepage()" class="btn btn-primary" style="width: 100%;">
                        Explore Other Pages
                    </button>
                </div>
            </div>

            <!-- Right Column -->
            <div class="coming-soon-right">
                <!-- Animated Icon -->
                <div class="coming-soon-icon">
                    <svg width="200" height="200" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="60" cy="60" r="55" stroke="url(#gradient)" stroke-width="3" stroke-dasharray="10 5" class="rotating-circle"/>
                        <path d="M60 30V60L75 75" stroke="var(--primary-blue)" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="60" cy="60" r="3" fill="var(--primary-blue)"/>
                        <defs>
                            <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#FFC107;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#FF9800;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>

                <!-- Notify Me Form -->
                <div class="coming-soon-notify">
                    <p class="notify-text">Get notified when we launch</p>
                    <form class="notify-form" onsubmit="handleNotifySubmit(event)">
                        <input type="email" placeholder="Your email" class="notify-input" required>
                        <button type="submit" class="notify-button">Notify Me</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Coming Soon Modal Styles */
.coming-soon-modal {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1rem;
    animation: fadeIn 0.3s ease-out;
}

.coming-soon-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(5px);
    animation: fadeIn 0.3s ease-out;
}

.coming-soon-content {
    position: relative;
    background: white;
    border-radius: 20px;
    max-width: 900px;
    width: 90%;
    height: auto;
    max-height: 85vh;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    animation: slideUp 0.4s ease-out;
    border: 2px solid #FFC107;
}

.coming-soon-close {
    position: absolute;
    top: 1.5rem;
    left: 1.5rem;
    padding: 0.75rem 1.5rem;
    border: none;
    background: #FFC107;
    border-radius: 25px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #000;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    z-index: 1;
    box-shadow: 0 2px 10px rgba(255, 193, 7, 0.3);
}

.coming-soon-close:hover {
    background: #FFD54F;
    transform: translateX(-5px);
    box-shadow: 0 4px 15px rgba(255, 193, 7, 0.5);
}

.coming-soon-body {
    padding: 4rem 3rem 3rem 3rem;
    text-align: center;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 3rem;
    align-items: center;
}

.coming-soon-left {
    text-align: left;
}

.coming-soon-right {
    text-align: center;
}

.coming-soon-icon {
    margin-bottom: 2rem;
    animation: bounceIn 0.6s ease-out;
}

.rotating-circle {
    animation: rotate 8s linear infinite;
    transform-origin: center;
}

.coming-soon-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--primary-blue);
    margin-bottom: 1rem;
    background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.coming-soon-description {
    font-size: 1.125rem;
    color: var(--text-dark-grey);
    line-height: 1.6;
    margin-bottom: 2rem;
}

.coming-soon-features {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    margin-bottom: 2rem;
    text-align: left;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem 1rem;
    background: #FFF8E1;
    border-radius: 8px;
    border-left: 3px solid #FFC107;
    transition: all 0.3s ease;
}

.feature-item:hover {
    transform: translateX(5px);
    background: #FFECB3;
    box-shadow: 0 2px 8px rgba(255, 193, 7, 0.2);
}

.feature-item svg {
    flex-shrink: 0;
    color: #FFC107;
}

.feature-item span {
    color: var(--text-dark-grey);
    font-weight: 500;
    font-size: 0.95rem;
}

.coming-soon-notify {
    background: linear-gradient(135deg, rgba(255, 193, 7, 0.1), rgba(255, 152, 0, 0.1));
    padding: 1.5rem;
    border-radius: 15px;
    margin-top: 2rem;
}

.notify-text {
    font-size: 1rem;
    font-weight: 600;
    color: var(--text-dark-grey);
    margin-bottom: 1rem;
}

.notify-form {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.notify-input {
    flex: 1;
    padding: 0.875rem 1.25rem;
    border: 2px solid var(--border-light);
    border-radius: 10px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.notify-input:focus {
    outline: none;
    border-color: var(--primary-blue);
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
}

.notify-button {
    padding: 0.875rem 1.75rem;
    background: var(--primary-blue);
    color: white;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.notify-button:hover {
    background: var(--secondary-blue);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
}

.coming-soon-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
}

/* Animations */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes bounceIn {
    0% {
        opacity: 0;
        transform: scale(0.3);
    }
    50% {
        transform: scale(1.05);
    }
    70% {
        transform: scale(0.9);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes rotate {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

/* Responsive Design */
@media (max-width: 968px) {
    .coming-soon-body {
        grid-template-columns: 1fr;
        gap: 2rem;
        padding: 3rem 2rem;
    }

    .coming-soon-left {
        text-align: center;
    }

    .coming-soon-icon svg {
        width: 150px;
        height: 150px;
    }
}

@media (max-width: 768px) {
    .coming-soon-content {
        width: 95%;
    }

    .coming-soon-body {
        padding: 3rem 1.5rem;
    }

    .coming-soon-title {
        font-size: 2rem;
    }

    .coming-soon-description {
        font-size: 1rem;
    }

    .coming-soon-close {
        top: 1rem;
        left: 1rem;
        padding: 0.5rem 1rem;
        font-size: 0.85rem;
    }

    .coming-soon-icon svg {
        width: 120px;
        height: 120px;
    }
}
</style>

<script>
// Show Coming Soon Modal
function showComingSoonModal() {
    const modal = document.getElementById('comingSoonModal');
    if (modal) {
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
}

// Go back to previous page
function goBackFromModal() {
    window.history.back();
}

// Go to homepage
function goToHomepage() {
    window.location.href = '<?php echo dirname($_SERVER["SCRIPT_NAME"]); ?>/';
}

// Handle Notify Form Submission
function handleNotifySubmit(event) {
    event.preventDefault();
    const email = event.target.querySelector('input[type="email"]').value;
    
    // You can implement actual notification logic here
    alert(`Thank you! We'll notify you at ${email} when we launch.`);
    event.target.reset();
}

// Prevent closing the modal (user must use Go Back button)
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('comingSoonModal');
    if (modal) {
        // Disable clicking outside to close
        modal.querySelector('.coming-soon-overlay')?.addEventListener('click', function(e) {
            e.preventDefault();
            // Do nothing - force user to use Go Back button
        });
    }
});

// Disable Escape key to close modal
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const modal = document.getElementById('comingSoonModal');
        if (modal && modal.style.display === 'flex') {
            event.preventDefault();
            // Do nothing - force user to use Go Back button
        }
    }
});
</script>

