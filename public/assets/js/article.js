function initializeArticlePage() {
    // Example article and author data. Replace with dynamic data if necessary.
    const article = {
        title: 'Your Article Title',
        excerpt: 'A brief excerpt from the article.',
        featured_image: 'path/to/your/featured-image.jpg',
        tags: [
            { id: 1, name: 'Tag 1' },
            { id: 2, name: 'Tag 2' }
        ]
    };

    const author = {
        name: 'John Doe',
        avatar: 'path/to/author-avatar.jpg',
        bio: 'Author bio goes here.'
    };

    const relatedPosts = [
        { title: 'Related Post 1', url: '#', featured_image: 'path/to/image1.jpg' },
        { title: 'Related Post 2', url: '#', featured_image: 'path/to/image2.jpg' }
    ];

    // Call functions to update the page
    updateMetaTags(article);
    updateBreadcrumbs(article);
    updateArticleFooter(article);
    updateAuthorBox(author);
    updateRelatedPosts(relatedPosts);

    // Setup event listeners
    setupEventListeners();
}


// Update meta tags
function updateMetaTags(article) {
    // Update Open Graph tags
    document.querySelector('meta[property="og:title"]').content = article.title;
    document.querySelector('meta[property="og:description"]').content = article.excerpt;
    document.querySelector('meta[property="og:image"]').content = article.featured_image;

    // Update Twitter tags
    document.querySelector('meta[property="twitter:title"]').content = article.title;
    document.querySelector('meta[property="twitter:description"]').content = article.excerpt;
    document.querySelector('meta[property="twitter:image"]').content = article.featured_image;
}

// Update breadcrumbs
function updateBreadcrumbs(article) {
    const breadcrumb = document.querySelector('.breadcrumb');
    if (breadcrumb) {
        breadcrumb.innerHTML = `
            <li class="breadcrumb-item"><a href="../index.html"><i class="fas fa-home"></i> Beranda</a></li>
            <li class="breadcrumb-item"><a href="blog.html">Blog</a></li>
            <li class="breadcrumb-item active">${article.title}</li>
        `;
    }
}

// Update article footer
function updateArticleFooter(article) {
    const articleFooter = document.querySelector('.article-footer');
    if (articleFooter) {
        // Update tags
        const tagsContainer = articleFooter.querySelector('.article-tags');
        if (tagsContainer) {
            const tagsHTML = article.tags.map(tag =>
                `<a href="blog.html?tag=${tag.id}" class="tag">${tag.name}</a>`
            ).join('');
            tagsContainer.innerHTML = `
                <span class="tag-label">Tags:</span>
                ${tagsHTML}
            `;
        }

        // Update share buttons
        const shareContainer = articleFooter.querySelector('.article-share');
        if (shareContainer) {
            const shareUrl = encodeURIComponent(window.location.href);
            const shareTitle = encodeURIComponent(article.title);

            shareContainer.innerHTML = `
                <span class="share-label">Bagikan:</span>
                <a href="https://www.facebook.com/sharer/sharer.php?u=${shareUrl}" class="share-btn" target="_blank">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?url=${shareUrl}&text=${shareTitle}" class="share-btn" target="_blank">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url=${shareUrl}&title=${shareTitle}" class="share-btn" target="_blank">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="https://wa.me/?text=${shareTitle}%20${shareUrl}" class="share-btn" target="_blank">
                    <i class="fab fa-whatsapp"></i>
                </a>
            `;
        }
    }
}

// Update author box
function updateAuthorBox(author) {
    const authorBox = document.querySelector('.author-box');
    if (authorBox) {
        const authorImage = authorBox.querySelector('.author-image img');
        if (authorImage) {
            authorImage.src = author.avatar;
            authorImage.alt = author.name;
        }

        const authorInfo = authorBox.querySelector('.author-info');
        if (authorInfo) {
            authorInfo.innerHTML = `
                <h3>Tentang Penulis</h3>
                <h4>${author.name}</h4>
                <p>${author.bio}</p>
            `;
        }
    }
}

// Update related posts
function updateRelatedPosts(posts) {
    const relatedPostsContainer = document.querySelector('.related-posts-grid');
    if (relatedPostsContainer) {
        relatedPostsContainer.innerHTML = posts.map(post => BlogUI.createRelatedPostCard(post)).join('');
    }
}

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
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                backToTopBtn.style.display = 'block';
            } else {
                backToTopBtn.style.display = 'none';
            }
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
}

// Show error message
function showError(message) {
    const errorContainer = document.createElement('div');
    errorContainer.className = 'error-message';
    errorContainer.textContent = message;

    const blogContent = document.querySelector('.blog-content');
    if (blogContent) {
        blogContent.insertBefore(errorContainer, blogContent.firstChild);
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', initializeArticlePage);