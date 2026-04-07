<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews - BMPerformance</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen pt-10">

    <div class="max-w-4xl mx-auto px-4">

        {{-- Header --}}
        <div class="flex items-center mb-10 relative">
            <a href="{{ url('/dashboard') }}" 
               class="px-6 py-2 border border-gray-400 rounded-3xl text-gray-700 hover:bg-gray-200 transition duration-200 z-10">
                Terug
            </a>
            <h1 class="text-3xl font-bold text-gray-800 absolute left-1/2 transform -translate-x-1/2">
                Reviews
            </h1>
        </div>

        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                {{ session('status') }}
            </div>
        @endif


        <div class="flex justify-end mb-6">
            <a href="{{ route('reviews.create') }}" 
               class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-150 ease-in-out">
                Plaats Review
            </a>
        </div>

        @if($reviews->count() > 0)
            <div class="bg-white rounded-lg shadow-sm p-6 mb-8 text-center">
                <p class="text-gray-500 text-sm mb-1">Gemiddelde beoordeling</p>
                <div class="flex items-center justify-center gap-2">
                    <span class="text-5xl font-bold text-gray-800">
                        {{ number_format($reviews->avg('rating'), 1) }}
                    </span>
                    <span class="text-4xl text-yellow-400">★</span>
                </div>
                <p class="text-gray-400 text-sm mt-1">Gebaseerd op {{ $reviews->count() }} {{ $reviews->count() === 1 ? 'review' : 'reviews' }}</p>
            </div>
        @endif

        @if($reviews->count() > 0)
            <div class="flex flex-col gap-6 mb-10">
                @foreach($reviews as $review)
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold text-lg">
                                    {{ strtoupper(substr($review->user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">{{ $review->user->name }}</p>
                                    <p class="text-xs text-gray-400">{{ $review->created_at->format('d-m-Y') }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-1">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->rating)
                                        <span class="text-yellow-400 text-xl">★</span>
                                    @else
                                        <span class="text-gray-300 text-xl">★</span>
                                    @endif
                                @endfor
                                <span class="ml-2 text-sm text-gray-500">({{ $review->rating }}/5)</span>
                            </div>
                        </div>

                        <p class="text-gray-700 leading-relaxed">{{ $review->comment }}</p>

                    </div>
                @endforeach
            </div>

        @else
            <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                <p class="text-gray-400 text-lg mb-4">Er zijn nog geen reviews geplaatst.</p>
                <a href="{{ route('reviews.create') }}" 
                   class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-150 ease-in-out">
                    Nog geen reviews...
                </a>
            </div>
        @endif

    </div>

</body>
</html>