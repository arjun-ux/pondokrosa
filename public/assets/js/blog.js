// Setup event listeners
function setupEventListeners() {
    // Mobile menu toggle
    const menuBtn = document.querySelector('.menu-btn');
    const navLinks = document.querySelector('.nav-links');
    if (menuBtn && navLinks) {
        menuBtn.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    }

    // Close menu when clicking a link
    document.querySelectorAll('.nav-links a').forEach(link => {
        link.addEventListener('click', () => {
            navLinks.classList.remove('active');
        });
    });

    // Back to top button
    const backToTopBtn = document.getElementById('backToTop');
    if (backToTopBtn) {
        // Fix display style - use flex instead of block to center the icon
        backToTopBtn.style.display = 'none'; // Initially hidden

        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTopBtn.style.display = 'flex';
            } else {
                backToTopBtn.style.display = 'none';
            }
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // Sidebar toggle functionality
    initializeSidebar();
}

// Initialize sidebar toggle
function initializeSidebar() {
    const sidebarToggle = document.querySelector('.sidebar-toggle');
    const sidebar = document.querySelector('.blog-sidebar');
    const overlay = document.querySelector('.sidebar-overlay');

    if (sidebarToggle && sidebar && overlay) {
        // Make sure to remove any existing event listeners
        const newToggle = sidebarToggle.cloneNode(true);
        sidebarToggle.parentNode.replaceChild(newToggle, sidebarToggle);

        // Add event listeners with console logging for debugging
        newToggle.addEventListener('click', function(e) {
            console.log('Sidebar toggle clicked');
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
            e.stopPropagation(); // Prevent event bubbling
        });

        overlay.addEventListener('click', function() {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        });

        // Control visibility based on screen size
        function updateToggleVisibility() {
            if (window.innerWidth <= 768 && sidebar) {
                newToggle.style.display = 'flex';
                newToggle.style.opacity = '1';
                newToggle.style.visibility = 'visible';
            } else {
                newToggle.style.display = 'none';
                newToggle.style.opacity = '0';
                newToggle.style.visibility = 'hidden';
            }
        }

        // Initial check
        updateToggleVisibility();

        // Update on window resize
        window.addEventListener('resize', updateToggleVisibility);
    }
}

// Initialize when DOM is loaded
function initializeBlogPage() {
    setupEventListeners();
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', initializeBlogPage);
