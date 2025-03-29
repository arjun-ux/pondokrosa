<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tags -->
    <title>Blog - Pondok Pesantren Roudlotussalam</title>
    <meta name="title" content="Blog - Pondok Pesantren Roudlotussalam">
    <meta name="description" content="Artikel-artikel menarik seputar pendidikan Islam, kegiatan pesantren, dan informasi terkini dari Pondok Pesantren Roudlotussalam.">
    <meta name="keywords" content="blog pesantren, artikel islam, pendidikan islam, pondok pesantren, roudlotussalam">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://roudlotussalam.com/blog">
    <meta property="og:title" content="Blog - Pondok Pesantren Roudlotussalam">
    <meta property="og:description" content="Artikel-artikel menarik seputar pendidikan Islam, kegiatan pesantren, dan informasi terkini dari Pondok Pesantren Roudlotussalam.">
    <meta property="og:image" content="https://roudlotussalam.com/assets/img/hero.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://roudlotussalam.com/blog">
    <meta property="twitter:title" content="Blog - Pondok Pesantren Roudlotussalam">
    <meta property="twitter:description" content="Artikel-artikel menarik seputar pendidikan Islam, kegiatan pesantren, dan informasi terkini dari Pondok Pesantren Roudlotussalam.">
    <meta property="twitter:image" content="https://roudlotussalam.com/assets/img/hero.jpg">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- Preconnect to required origins -->
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- CSS Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/blog.css') }}">
    @stack('css')
</head>
<body>
    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')

    <!-- Back to Top Button -->
    <button id="backToTop" title="Back to Top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- JavaScript -->
    <script type="module" src="../assets/js/blog.js"></script>
    <script>
        // Mobile Menu Toggle
        document.querySelector('.menu-btn').addEventListener('click', function() {
            document.querySelector('.nav-links').classList.toggle('active');
        });

        // Back to Top Button
        window.onscroll = function() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("backToTop").style.display = "block";
            } else {
                document.getElementById("backToTop").style.display = "none";
            }
        };

        document.getElementById("backToTop").addEventListener("click", function() {
            window.scrollTo({top: 0, behavior: 'smooth'});
        });

        // Fade In Animation
        function fadeIn() {
            const elements = document.querySelectorAll('.fade-in');
            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementBottom = element.getBoundingClientRect().bottom;

                if (elementTop < window.innerHeight && elementBottom > 0) {
                    element.classList.add('visible');
                }
            });
        }

        window.addEventListener('scroll', fadeIn);
        window.addEventListener('load', fadeIn);
    </script>
</body>
</html>
