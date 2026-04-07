<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Schrijven</title>
 
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen pt-10">

    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-sm">
        
    <div class="flex items-center mb-16 relative">
            <a href="{{ url('/reviews') }}" class="px-8 py-2 border border-gray-400 rounded-3xl text-black-600 hover:bg-gray-100 transition duration-200 z-10">
                Terug
            </a>
            <h1 class="text-3xl text-black-500 absolute left-1/2 transform -translate-x-1/2">
                Plaats een review
            </h1>
        </div>

        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('reviews.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label for="rating" class="block mb-2 text-sm font-medium text-gray-900">Beoordeling (1-5)</label>
                <input type="number" name="rating" id="rating" min="1" max="5" 
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                       value="{{ old('rating') }}" required>
            </div>

            <div class="mb-6">
                <label for="comment" class="block mb-2 text-sm font-medium text-gray-900">Jouw mening</label>
                <textarea name="comment" id="comment" rows="4" 
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                          required>{{ old('comment') }}</textarea>
            </div>

            <button type="submit" 
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">
                Verstuur Review
            </button>
        </form>

    </div>

</body>
</html>