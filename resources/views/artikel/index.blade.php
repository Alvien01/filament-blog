<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest Articles</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-8 text-gray-800">Latest Articles</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($articles as $article)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                @if($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                @endif
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-2 text-gray-800">{{ $article->title }}</h2>
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ $article->meta_description }}</p>
                    <div class="flex justify-between items-center text-sm text-gray-500">
                        <span>{{ $article->created_at->format('M d, Y') }}</span>
                        <span class="bg-blue-100 text-blue-800 py-1 px-2 rounded-full text-xs">Views: {{ $article->view }}</span>
                    </div>
                    <a href="{{ route('artikel.show', $article->slug) }}" class="inline-block mt-4 text-blue-500 hover:text-blue-700 font-semibold">Read More &rarr;</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
