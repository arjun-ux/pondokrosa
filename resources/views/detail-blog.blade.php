@extends('partials.main')

@section('content')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/article.css') }}">
@endpush
    <!-- Breadcrumbs -->
    <div class="breadcrumbs fade-in">
        <div class="section-container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index.html"><i class="fas fa-home"></i> Beranda</a></li>
                    <li class="breadcrumb-item active">Blog</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Blog Header -->
    <section class="blog-header">
        <div class="section-container">
            <div class="blog-header-content fade-in">
                <h1>{{ $data['title'] ?? null }}</h1>
                <p>{{ $data['description'] ?? null }}</p>
            </div>
        </div>
    </section>

    <!-- Blog Content -->
    <section class="blog-content">
        <div class="blog-grid">
            <!-- Main Content -->
            <div class="blog-main">
                <!-- Article Meta -->
                <div class="article-meta fade-in">
                    <span><i class="far fa-calendar"></i> {{ Carbon\Carbon::parse($data['created_at'])->locale('id')->isoFormat('D MMMM YYYY') ?? null }}</span>
                    <span><i class="far fa-user"></i> {{ $data['name'] ?? null }}</span>
                    <span><i class="far fa-folder"></i> {{ $data['category'] ?? null }}</span>
                    <span><i class="far fa-eye"></i> {{ $data['viewer'] ?? null }}</span>
                    <span><i class="far fa-clock"></i> 5 menit baca</span>
                </div>

                <!-- Featured Image -->
                <div class="article-featured-image fade-in">
                    <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="Pendidikan Islam Terpadu">
                </div>

                <!-- Article Content -->
                <div class="article-content fade-in">
                    {!! $data['content'] ?? null !!}
                </div>

                <!-- Article Footer -->
                <div class="article-footer fade-in">
                    <div class="article-tags">
                        <span class="tag-label">Tags:</span>
                        <a href="#" class="tag">Pendidikan Islam</a>
                        <a href="#" class="tag">Pesantren Modern</a>
                        <a href="#" class="tag">Generasi Unggul</a>
                    </div>
                    <div class="article-share">
                        <span class="share-label">Bagikan:</span>
                        <a href="#" class="share-btn"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="share-btn"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="share-btn"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="share-btn"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>

                <!-- Author Box -->
                <div class="author-box fade-in">
                    <div class="author-image">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="Admin">
                    </div>
                    <div class="author-info">
                        <h3>Tentang Penulis</h3>
                        <h4>{{ $data['name'] ?? null }}</h4>
                        <p>Tim konten Pondok Pesantren Roudlotussalam yang berdedikasi untuk menyajikan informasi berkualitas seputar pendidikan Islam dan kegiatan pesantren.</p>
                    </div>
                </div>

                <!-- Related Posts -->
                <div class="related-posts fade-in">
                    <h3>Artikel Terkait</h3>
                    <div class="related-posts-grid">
                        <article class="related-post">
                            <div class="related-post-image">
                                <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="Related Post 1">
                            </div>
                            <div class="related-post-content">
                                <h4><a href="#">Tips Menghafal Al-Quran untuk Pemula</a></h4>
                                <div class="related-post-meta">
                                    <span><i class="far fa-calendar"></i> 28 Maret 2024</span>
                                </div>
                            </div>
                        </article>
                        <article class="related-post">
                            <div class="related-post-image">
                                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="Related Post 2">
                            </div>
                            <div class="related-post-content">
                                <h4><a href="#">Mengembangkan Kreativitas Santri</a></h4>
                                <div class="related-post-meta">
                                    <span><i class="far fa-calendar"></i> 27 Maret 2024</span>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="blog-sidebar">
                <!-- Recent Posts Widget -->
                <div class="sidebar-widget">
                    <h3>Artikel Terbaru</h3>
                    <ul class="recent-posts">
                        <li class="recent-post-item">
                            <div class="recent-post-image">
                                <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="Recent Post 1">
                            </div>
                            <div class="recent-post-content">
                                <h4><a href="#">Tips Menghafal Al-Quran untuk Pemula</a></h4>
                                <div class="recent-post-meta">
                                    <span><i class="far fa-calendar"></i> 28 Maret 2024</span>
                                </div>
                            </div>
                        </li>
                        <li class="recent-post-item">
                            <div class="recent-post-image">
                                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="Recent Post 2">
                            </div>
                            <div class="recent-post-content">
                                <h4><a href="#">Mengembangkan Kreativitas Santri</a></h4>
                                <div class="recent-post-meta">
                                    <span><i class="far fa-calendar"></i> 27 Maret 2024</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Categories Widget -->
                <div class="sidebar-widget">
                    <h3>Kategori</h3>
                    <ul class="categories-list">
                        <li class="category-item">
                            <a href="#">Pendidikan Islam <span class="category-count">12</span></a>
                        </li>
                        <li class="category-item">
                            <a href="#">Tahfidz Al-Quran <span class="category-count">8</span></a>
                        </li>
                        <li class="category-item">
                            <a href="#">Kewirausahaan <span class="category-count">5</span></a>
                        </li>
                        <li class="category-item">
                            <a href="#">Teknologi <span class="category-count">4</span></a>
                        </li>
                        <li class="category-item">
                            <a href="#">Kegiatan Santri <span class="category-count">10</span></a>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </section>
@endsection
