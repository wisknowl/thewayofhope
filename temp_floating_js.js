// Floating Donate Button functionality
document.addEventListener('DOMContentLoaded', function() {
    const floatingBtn = document.getElementById('floatingDonateBtn');
    
    if (floatingBtn) {
        // Show/hide floating button based on scroll position
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                floatingBtn.style.opacity = '1';
                floatingBtn.style.visibility = 'visible';
            } else {
                floatingBtn.style.opacity = '0';
                floatingBtn.style.visibility = 'hidden';
            }
        });
        
        // Add hover effects
        const donateBtn = floatingBtn.querySelector('.btn-donate-floating');
        if (donateBtn) {
            donateBtn.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.1)';
            });
            
            donateBtn.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        }
    }
});

