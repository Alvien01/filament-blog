@extends('front')

@section('title', 'Home')

@section('styles')
    <style>
        /* Modern Hero/Carousel Styles */
        .hero-section {
            margin-top: 30px;
            margin-bottom: 60px;
        }

        .carousel-container {
            position: relative;
            background: #000;
            border-radius: 20px;
            overflow: hidden;
            height: 550px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .carousel-slide {
            display: none;
            height: 100%;
            position: relative;
        }

        .carousel-slide.active {
            display: block;
            animation: fadeIn 0.5s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0.8; }
            to { opacity: 1; }
        }

        .carousel-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.65;
            transition: transform 10s ease;
        }
        
        .carousel-slide.active .carousel-image {
            transform: scale(1.1);
        }

        .carousel-content {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 60px;
            background: linear-gradient(to top, rgba(0,0,0,0.9), rgba(0,0,0,0));
            color: white;
            z-index: 10;
        }

        .hero-badge {
            background-color: var(--primary);
            color: white;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            display: inline-block;
            margin-bottom: 16px;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 16px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
        
        .hero-title a {
            color: white;
            transition: color 0.2s;
        }
        
        .hero-title a:hover {
            color: #dbeafe;
        }

        .hero-meta {
            display: flex;
            align-items: center;
            gap: 20px;
            font-size: 0.95rem;
            opacity: 0.9;
        }

        /* Section Headers */
        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--border-color);
        }

        .section-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--text-main);
            position: relative;
            padding-left: 15px;
        }
        
        .section-title::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 6px;
            height: 24px;
            background: var(--primary);
            border-radius: 4px;
        }
        
        .section-link {
            font-weight: 600;
            color: var(--primary);
            font-size: 0.95rem;
             display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .section-link:hover {
            text-decoration: underline;
        }

        /* Popular Grid (Boxy Cards) */
        .popular-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 80px;
        }

        .card {
            background: #fff;
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .card-image-wrapper {
            position: relative;
            padding-top: 60%; /* 16:9 Aspect Ratio */
            overflow: hidden;
        }

        .card-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .card:hover .card-image {
            transform: scale(1.05);
        }

        .card-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: rgba(255,255,255,0.95);
            color: var(--text-main);
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            z-index: 2;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .card-content {
            padding: 24px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            line-height: 1.4;
            margin-bottom: 12px;
            color: var(--text-main);
        }
        
        .card-title a:hover {
            color: var(--primary);
        }

        .card-excerpt {
            font-size: 0.95rem;
            color: var(--text-muted);
            margin-bottom: 20px;
            line-height: 1.6;
            flex-grow: 1;
        }

        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 15px;
            border-top: 1px solid #f1f5f9;
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        /* Latest List (Horizontal Cards) */
        .latest-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            margin-bottom: 50px;
        }
        
        .list-card {
            display: flex;
            background: #fff;
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: 0.3s;
            border: 1px solid var(--border-color);
            height: 180px;
        }
        
        .list-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateX(5px);
            border-color: #cbd5e1;
        }

        .list-card-image {
            width: 200px;
            flex-shrink: 0;
            position: relative;
            overflow: hidden;
        }

        .list-card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .list-card:hover .list-card-img {
            transform: scale(1.05);
        }

        .list-card-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .list-category {
            color: var(--primary);
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 8px;
        }
        
        .list-title {
            font-size: 1.15rem;
            font-weight: 700;
            line-height: 1.4;
            margin-bottom: 10px;
        }
        
        .list-meta {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        @media (max-width: 1024px) {
            .latest-grid {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 768px) {
            .carousel-container {
                height: 400px;
            }
            .hero-title {
                font-size: 1.75rem;
            }
            .carousel-content {
                padding: 30px;
            }
            .list-card {
                height: auto;
                flex-direction: column;
            }
            .list-card-image {
                width: 100%;
                height: 200px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container hero-section">
        <!-- Carousel -->
        @if($carouselArticles->count() > 0)
        <div class="carousel-container">
            @foreach($carouselArticles as $key => $article)
            <div class="carousel-slide {{ $key == 0 ? 'active' : '' }}">
                @if($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="carousel-image">
                @else
                    <div style="background: #333; width: 100%; height: 100%;"></div>
                @endif
                
                <div class="carousel-content">
                    @if($article->category)
                        <span class="hero-badge">{{ $article->category->name }}</span>
                    @endif
                    
                    <h2 class="hero-title">
                        <a href="{{ route('artikel.show', $article->slug) }}">{{ $article->title }}</a>
                    </h2>
                    
                    <div class="hero-meta">
                        <span>{{ $article->created_at->format('d M Y') }}</span>
                        <span style="width: 4px; height: 4px; background: white; border-radius: 50%;"></span>
                        <span>{{ $article->view }} Views</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <script>
            let slideIndex = 0;
            const slides = document.querySelectorAll('.carousel-slide');
            
            if(slides.length > 0) {
                setInterval(() => {
                    slides[slideIndex].classList.remove('active');
                    slideIndex = (slideIndex + 1) % slides.length;
                    slides[slideIndex].classList.add('active');
                }, 5000);
            }
        </script>
        @endif
    </div>

    <div class="container">
        
        <!-- Popular Articles -->
        <div class="section-header">
            <h3 class="section-title">Artikel Terpopuler</h3>
            <a href="#" class="section-link">Lihat Semua <span>&rarr;</span></a>
        </div>
        
        <div class="popular-grid">
            @foreach($popularArticles as $article)
            <div class="card">
                <div class="card-image-wrapper">
                    @if($article->category)
                        <span class="card-badge">{{ $article->category->name }}</span>
                    @endif
                    <a href="{{ route('artikel.show', $article->slug) }}">
                         @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="card-image">
                         @else
                            <div style="width: 100%; height: 100%; background: #eee;"></div>
                         @endif
                    </a>
                </div>
                <div class="card-content">
                    <h4 class="card-title">
                        <a href="{{ route('artikel.show', $article->slug) }}">{{ Str::limit($article->title, 60) }}</a>
                    </h4>
                    <p class="card-excerpt">
                        {{ Str::limit($article->meta_description, 90) }}
                    </p>
                    <div class="card-footer">
                        <span>{{ $article->created_at->format('d M Y') }}</span>
                        <span>👁️ {{ $article->view }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Latest Articles -->
        <div class="section-header">
            <h3 class="section-title">Artikel Terbaru</h3>
             <a href="{{ route('artikel.index') }}" class="section-link">Indeks Artikel <span>&rarr;</span></a>
        </div>
        
        <div class="latest-grid">
            @foreach($latestArticles as $article)
            <div class="list-card">
                <div class="list-card-image">
                     <a href="{{ route('artikel.show', $article->slug) }}">
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="list-card-img">
                        @else
                             <div style="width: 100%; height: 100%; background: #eee; display: flex; align-items: center; justify-content: center; color: #aaa;">No Image</div>
                        @endif
                     </a>
                </div>
                <div class="list-card-content">
                    @if($article->category)
                        <div class="list-category">{{ $article->category->name }}</div>
                    @endif
                    <h3 class="list-title">
                        <a href="{{ route('artikel.show', $article->slug) }}">{{ Str::limit($article->title, 55) }}</a>
                    </h3>
                    <p style="font-size: 0.9rem; color: #64748b; margin-bottom: 15px;">
                         {{ Str::limit($article->meta_description, 70) }}
                    </p>
                    <div class="list-meta">
                        By {{ $article->user->name ?? 'Admin' }} • {{ $article->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
@endsection
