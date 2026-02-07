@extends('front')

@section('title', 'Artikel Detail')

@section('styles')
    <style>
        /* Modern Design System for Article Detail */
        :root {
            --primary-color: #2563eb;
            --text-heading: #1e293b;
            --text-body: #334155;
            --bg-gray: #f8fafc;
        }

        .article-header {
            text-align: center;
            padding: 60px 0 40px;
            max-width: 800px;
            margin: 0 auto;
        }

        .category-tag {
            display: inline-block;
            background-color: #dbeafe;
            color: var(--primary-color);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 20px;
        }

        .article-title {
            font-size: 2.75rem;
            font-weight: 800;
            line-height: 1.2;
            color: var(--text-heading);
            margin-bottom: 25px;
        }

        .article-meta {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            color: #64748b;
            font-size: 0.95rem;
        }

        .article-meta span {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .featured-image-container {
            width: 100%;
            height: 500px;
            overflow: hidden;
            border-radius: 16px;
            margin-bottom: 50px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .featured-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .article-content {
            max-width: 800px;
            margin: 0 auto;
            font-size: 1.15rem;
            line-height: 1.8;
            color: var(--text-body);
        }
        
        .article-content p {
            margin-bottom: 1.5em;
        }

        .article-content img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 20px 0;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .article-content h2 {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-heading);
            margin-top: 2em;
            margin-bottom: 1em;
        }

        .article-content blockquote {
            border-left: 4px solid var(--primary-color);
            padding-left: 20px;
            margin: 2em 0;
            font-style: italic;
            color: #475569;
            background: #f1f5f9;
            padding: 20px;
            border-radius: 0 8px 8px 0;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 30px;
            transition: transform 0.2s;
        }

        .back-link:hover {
            transform: translateX(-5px);
        }

        .share-section {
            border-top: 1px solid #e2e8f0;
            margin-top: 60px;
            padding-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        @media (max-width: 768px) {
            .article-title {
                font-size: 2rem;
            }
            .featured-image-container {
                height: 300px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container" style="padding-top: 40px; padding-bottom: 60px;">
        <div style="display: grid; grid-template-columns: 1fr 350px; gap: 40px; align-items: start;">
            <!-- Main Content (Left) -->
            <div class="main-column">
                <!-- Breadcrumb -->
                <nav style="font-size: 0.9rem; color: #64748b; margin-bottom: 20px;">
                    <a href="{{ route('home') }}" style="color: var(--primary-color);">Beranda</a> 
                    <span style="margin: 0 5px;">/</span> 
                    <a href="{{ route('artikel.index') }}" style="color: var(--primary-color);">Artikel</a> 
                    <span style="margin: 0 5px;">/</span> 
                    <span style="color: #334155;">{{ Str::limit($article->title, 20) }}</span>
                </nav>

                <!-- Featured Image -->
                @if($article->image)
                <div class="featured-image-container" style="margin-bottom: 30px; height: auto; aspect-ratio: 16/9;">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="featured-image">
                </div>
                @endif

                <!-- Header Info (Title & Meta) -->
                <header class="article-header" style="text-align: left; padding: 0; margin: 0 0 30px 0; max-width: 100%;">
                    @if($article->category)
                    <span class="category-tag" style="margin-bottom: 15px;">{{ $article->category->name }}</span>
                    @endif
                    
                    <h1 class="article-title" style="font-size: 2.25rem; margin-bottom: 15px;">{{ $article->title }}</h1>
                    
                    <div class="article-meta" style="justify-content: flex-start; flex-wrap: wrap;">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            {{ $article->user->name ?? 'Admin' }}
                        </span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            {{ $article->created_at->format('d M Y') }}
                        </span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            {{ $article->view }} Views
                        </span>
                    </div>
                </header>

                <!-- Content -->
                <div class="article-content" style="max-width: 100%;">
                    <?php 
                        $content = $article->content;
                        // Normalize paths: strip existing domain/storage prefixes for this folder
                        $content = str_replace('http://localhost/storage/artikel-attachments/', 'artikel-attachments/', $content);
                        $content = str_replace('storage/artikel-attachments/', 'artikel-attachments/', $content);
                        // Ensure correct absolute path
                        $content = str_replace('artikel-attachments/', '/storage/artikel-attachments/', $content);
                    ?>
                    {!! Str::markdown($content) !!}
                </div>

                <!-- Share -->
                <div class="share-section">
                    <div style="font-weight: 600; color: #475569;">Bagikan artikel ini:</div>
                    <div style="display: flex; gap: 10px;">
                        <button style="background: #3b5998; color: white; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer;">Facebook</button>
                        <button style="background: #1da1f2; color: white; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer;">Twitter</button>
                        <button style="background: #25d366; color: white; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer;">WhatsApp</button>
                    </div>
                </div>
            </div>

            <!-- Sidebar (Right) -->
            <aside class="sidebar-column" style="position: sticky; top: 100px;">
                <!-- Latest Articles -->
                <div style="margin-bottom: 40px;">
                    <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--text-heading); margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid var(--border-color);">Artikel Terbaru</h3>
                    <div style="display: flex; flex-direction: column; gap: 20px;">
                        @foreach($latestArticles as $latest)
                        <a href="{{ route('artikel.show', $latest->slug) }}" style="display: flex; gap: 15px; align-items: start; group">
                            <div style="width: 80px; height: 60px; border-radius: 8px; overflow: hidden; flex-shrink: 0;">
                                <img src="{{ asset('storage/' . $latest->image) }}" alt="{{ $latest->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div>
                                <h4 style="font-size: 0.95rem; font-weight: 600; color: var(--text-heading); line-height: 1.4; margin-bottom: 5px;">{{ Str::limit($latest->title, 40) }}</h4>
                                <span style="font-size: 0.8rem; color: #64748b;">{{ $latest->created_at->format('d M Y') }}</span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- Popular Articles -->
                <div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--text-heading); margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid var(--border-color);">Artikel Terpopuler</h3>
                    <div style="display: flex; flex-direction: column; gap: 20px;">
                        @foreach($popularArticles as $popular)
                        <a href="{{ route('artikel.show', $popular->slug) }}" style="display: flex; gap: 15px; align-items: start;">
                            <div style="width: 80px; height: 60px; border-radius: 8px; overflow: hidden; flex-shrink: 0;">
                                <img src="{{ asset('storage/' . $popular->image) }}" alt="{{ $popular->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div>
                                <h4 style="font-size: 0.95rem; font-weight: 600; color: var(--text-heading); line-height: 1.4; margin-bottom: 5px;">{{ Str::limit($popular->title, 40) }}</h4>
                                <span style="font-size: 0.8rem; color: #64748b;">{{ $popular->view }} Views</span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <style>
        @media (max-width: 1024px) {
            .container > div {
                grid-template-columns: 1fr !important;
            }
            .sidebar-column {
                position: static !important;
                margin-top: 40px;
            }
        }
    </style>
@endsection
