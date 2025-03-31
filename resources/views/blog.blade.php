@extends('partials.main')

@section('content')

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
            <h1>Blog Roudlotussalam</h1>
            <p>Artikel-artikel menarik seputar pendidikan Islam dan kegiatan pesantren</p>
        </div>
    </div>
</section>

<!-- Blog Content -->
<section class="blog-content">
    <div class="blog-grid">
        <!-- Main Content -->
        <div class="blog-main">
            <article class="blog-featured fade-in">
                <div class="blog-image">
                    <img src="{{ $latest_post['image'] ?: 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80' }}" alt="Featured Blog Post">
                </div>
                <div class="blog-details">
                    <div class="blog-meta">
                        <span><i class="far fa-calendar"></i> {{ Carbon\Carbon::parse($latest_post['created_at'])->locale('id')->isoFormat('D MMMM YYYY') }}</span>
                        <span><i class="far fa-user"></i> {{ $latest_post['writer'] }}</span>
                    </div>
                    <h2>{{ $latest_post['title'] }}</h2>
                    <p>{!! implode(' ', array_slice(explode(' ', $latest_post['content']), 0, 15)) !!}...</p>
                    <a href="{{ route('detail.blog', $latest_post['slug']) }}" class="read-more">Baca Selengkapnya <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>

            <!-- Regular Posts -->
            <div class="blog-posts">
                <!-- Post 1 -->
                @foreach ($datas as $item)
                    <article class="blog-post fade-in delay-1">
                        <div class="blog-image">
                            <img src="{{ $item['image'] ?: 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80' }}" alt="Blog Post 1">
                        </div>
                        <div class="blog-details">
                            <div class="blog-meta">
                                <span><i class="far fa-calendar"></i> {{ Carbon\Carbon::parse($item['created_at'])->locale('id')->isoFormat('D MMMM YYYY') }}</span>
                                <span><i class="far fa-user"></i> {{ $item['writer'] }}</span>
                            </div>
                            <h3>{{ $item['title'] }}</h3>
                            <p>{!! implode(' ', array_slice(explode(' ', $item['content']), 0, 5)) !!}...</p>
                            <a href="{{ route('detail.blog', $item['slug']) }}" class="read-more">Baca Selengkapnya <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pagination fade-in">
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#"><i class="fas fa-chevron-right"></i></a>
            </div>
        </div>

        <!-- Sidebar -->
        <aside class="blog-sidebar">
            <!-- Recent Posts Widget -->
            <div class="sidebar-widget">
                <h3>Artikel Terbaru</h3>
                <ul class="recent-posts">
                    @foreach ($latest_posts as $item)
                    <li class="recent-post-item">
                        <div class="recent-post-image">
                            <img src="{{ $item['image'] ?: 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80' }}" alt="Recent Post 1">
                        </div>
                        <div class="recent-post-content">
                            <h4><a href="{{ route('detail.blog', $item['slug']) }}">{{ $item['title'] }}</a></h4>
                            <div class="recent-post-meta">
                                <span><i class="far fa-calendar"></i> {{ Carbon\Carbon::parse($item['created_at'])->locale('id')->isoFormat('D MMMM YYYY') }}</span>
                            </div>
                        </div>
                    </li>
                    @endforeach
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
