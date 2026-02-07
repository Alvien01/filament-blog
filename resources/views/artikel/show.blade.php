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
    <div class="container" style="padding-top: 40px;">
        <a href="{{ route('home') }}" class="back-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            Kembali ke Beranda
        </a>

        <header class="article-header">
            @if($article->category)
            <span class="category-tag">{{ $article->category->name }}</span>
            @endif
            <h1 class="article-title">{{ $article->title }}</h1>
            
            <div class="article-meta">
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

        @if($article->image)
        <div class="featured-image-container">
            <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="featured-image">
        </div>
        @endif

        <div class="article-content">
            {!! $article->content !!}
        </div>

        <div class="share-section">
            <div style="font-weight: 600; color: #475569;">Bagikan artikel ini:</div>
            <div style="display: flex; gap: 10px;">
                <!-- Social Share Buttons Placeholder -->
                <button style="background: #3b5998; color: white; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer;">Facebook</button>
                <button style="background: #1da1f2; color: white; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer;">Twitter</button>
                <button style="background: #25d366; color: white; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer;">WhatsApp</button>
            </div>
        </div>
    </div>
@endsection
