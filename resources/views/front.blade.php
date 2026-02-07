<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filament Blog - @yield('title', 'Home')</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        /* Modern Reset & Base Styles */
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --secondary: #64748b;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --bg-body: #ffffff;
            --bg-light: #f1f5f9;
            --border-color: #e2e8f0;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
            --sidebar-width: 300px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: color 0.2s;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Modern Navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 10000;
            height: 80px;
        }

        .navbar-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100%;
        }

        .brand {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--text-main);
            letter-spacing: -0.025em;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .brand span {
            color: var(--primary);
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 32px;
        }

        .nav-links {
            display: flex;
            gap: 32px;
        }

        .nav-links a {
            font-weight: 600;
            color: var(--text-muted);
            font-size: 0.95rem;
            position: relative;
        }

        .nav-links a:hover, .nav-links a.active {
            color: var(--primary);
        }
        
        /* Sidebar Toggle Button */
        .sidebar-toggle {
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px;
            display: flex;
            flex-direction: column;
            gap: 5px;
            z-index: 10002;
        }
        
        .sidebar-toggle span {
            display: block;
            width: 24px;
            height: 2px;
            background-color: var(--text-main);
            transition: 0.3s;
        }
        
        /* Off-canvas Sidebar */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 10000;
            opacity: 0;
            visibility: hidden;
            transition: 0.3s;
        }
        
        .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        
        .sidebar {
            position: fixed;
            top: 0;
            right: -100%;
            width: var(--sidebar-width);
            height: 100%;
            background: #fff;
            z-index: 10001;
            transition: 0.4s cubic-bezier(0.19, 1, 0.22, 1);
            padding: 80px 30px 30px;
            box-shadow: -5px 0 15px rgba(0,0,0,0.1);
            overflow-y: auto;
        }
        
        .sidebar.active {
            right: 0;
        }
        
        .sidebar-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 24px;
            padding-bottom: 12px;
            border-bottom: 2px solid var(--border-color);
        }
        
        .category-list {
            list-style: none;
        }
        
        .category-item {
            margin-bottom: 12px;
        }
        
        .category-link {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 14px;
            background: var(--bg-light);
            border-radius: var(--radius-md);
            color: var(--text-main);
            font-weight: 500;
            transition: 0.2s;
        }
        
        .category-link:hover {
            background: #e2e8f0;
            color: var(--primary);
            transform: translateX(5px);
        }
        
        .category-count {
            background: var(--primary);
            color: #fff;
            padding: 2px 8px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        /* Footer */
        footer {
            background: #0f172a;
            color: #cbd5e1;
            padding: 60px 0;
            margin-top: 80px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }
        
        .footer-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 20px;
            display: block;
        }
        
        .footer-text {
            line-height: 1.6;
            margin-bottom: 20px;
            opacity: 0.8;
        }
        
        .footer-heading {
            color: #fff;
            font-weight: 600;
            margin-bottom: 20px;
            font-size: 1.1rem;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 12px;
        }
        
        .footer-links a {
            transition: 0.2s;
        }
        
        .footer-links a:hover {
            color: #fff;
            text-decoration: underline;
        }
        
        .copyright {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 30px;
            text-align: center;
            font-size: 0.9rem;
        }

        /* Reusable components for children */
        @yield('styles')
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="container navbar-content">
            <a href="/" class="brand">My<span>Blog</span></a>
            
            <div class="nav-right">
                <div class="nav-links">
                    <a href="{{ route('home') }}">Beranda</a>
                    <a href="{{ route('artikel.index') }}">Artikel</a>
                </div>
                
                <button class="sidebar-toggle" onclick="toggleSidebar()">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </nav>
    
    <!-- Sidebar & Overlay -->
    <div class="sidebar-overlay" onclick="toggleSidebar()"></div>
    <div class="sidebar">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; padding-bottom: 20px; border-bottom: 1px solid var(--border-color);">
            <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--text-main); margin: 0;">Menu</h3>
            <button onclick="toggleSidebar()" style="background: none; border: none; cursor: pointer; color: var(--text-muted); transition: 0.2s; padding: 5px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>

        <h3 class="sidebar-title">Kategori</h3>
        <ul class="category-list">
            @if(isset($categories) && count($categories) > 0)
                @foreach($categories as $category)
                <li class="category-item">
                    <a href="#" class="category-link" style="display: flex; align-items: center; justify-content: space-between;">
                        <span style="display: flex; align-items: center; gap: 10px;">
                            <span style="width: 6px; height: 6px; background-color: var(--primary); border-radius: 50%;"></span>
                            {{ $category->name }}
                        </span>
                        <span class="category-count">{{ $category->artikel_count }}</span>
                    </a>
                </li>
                @endforeach
            @else
                <li style="color: #94a3b8; font-style: italic; font-size: 0.9rem;">Belum ada kategori.</li>
            @endif
        </ul>
    </div>

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div>
                    <a href="/" class="footer-brand">MyBlog</a>
                    <p class="footer-text">Platform berbagi wawasan dan inspirasi terkini seputar dunia teknologi, gaya hidup, dan kreativitas.</p>
                </div>
                <div>
                    <h4 class="footer-heading">Navigasi</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li><a href="{{ route('artikel.index') }}">Artikel</a></li>
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="footer-heading">Sosial Media</h4>
                    <ul class="footer-links">
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">LinkedIn</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; {{ date('Y') }} Filament Blog. Built with Laravel & Filament.</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('active');
            document.querySelector('.sidebar-overlay').classList.toggle('active');
        }
    </script>
    
    @yield('scripts')
</body>
</html>
