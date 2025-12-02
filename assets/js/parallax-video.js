document.addEventListener('DOMContentLoaded', function() {
    const parallaxCovers = document.querySelectorAll('.wp-block-cover.has-parallax-video, .wp-block-cover.is-style-has-parallax-video');

    if (!parallaxCovers.length) return;

    function updateParallax() {
        parallaxCovers.forEach(cover => {
            const videoContainer = cover.querySelector('.wp-block-cover__video-background');
            if (!videoContainer) return;

            const rect = cover.getBoundingClientRect();
            const windowHeight = window.innerHeight;

            // Only animate when in viewport
            if (rect.bottom < 0 || rect.top > windowHeight) return;

            // Calculate parallax offset (adjust 0.3 for intensity)
            const scrollPercent = (rect.top + rect.height / 2 - windowHeight / 2) / windowHeight;
            const parallaxOffset = scrollPercent * rect.height * 0.3;
            
            // Clamp the offset to prevent gaps (limit to 15% of container height)
            // This ensures the 130% height video always covers the 100% container
            const maxOffset = rect.height * 0.15;
            const clampedOffset = Math.max(-maxOffset, Math.min(maxOffset, parallaxOffset));

            // Apply transform to the video container (centered with parallax offset)
            videoContainer.style.transform = `translate(-50%, calc(-50% + ${clampedOffset}px)) translateZ(0)`;
            
            // Ensure video element inside is properly sized
            const videoElement = videoContainer.querySelector('video');
            if (videoElement) {
                videoElement.style.width = '100%';
                videoElement.style.height = '100%';
                videoElement.style.objectFit = 'cover';
            }
        });
    }

    // Use requestAnimationFrame for smooth performance
    let ticking = false;
    window.addEventListener('scroll', function() {
        if (!ticking) {
            requestAnimationFrame(function() {
                updateParallax();
                ticking = false;
            });
            ticking = true;
        }
    }, { passive: true });

    updateParallax();
});

