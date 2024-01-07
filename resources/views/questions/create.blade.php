<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Question</title>
    <!-- Include Tailwind CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto mt-5">
    <h1 class="text-center text-4xl font-bold mb-8">Add Question</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="flex justify-center">
        <div class="w-full md:w-1/3 bg-white shadow-md rounded px-8 py-6">
            <form class="w-full max-w-lg mx-auto" method="POST" action="{{route('question.store', $quiz->id)}}">
                @csrf
            
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Question:</label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " name="description" required></textarea>
                    </div>
                </div>
            {{--  --}}
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label for="options" class="block text-gray-700 text-sm font-bold mb-2">Options:</label>
                        @for($i = 0; $i < 4; $i++)
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-3" name="options[]" placeholder="Option {{ $i + 1 }}" required>
                        @endfor
                    </div>
                </div>
            
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label for="correct_option" class="block text-gray-700 text-sm font-bold mb-2">Correct Option:</label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="correct_option" required>
                            @for($i = 0; $i < 4; $i++)
                                <option value="{{ $i }}">Option {{ $i + 1 }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Question</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include any necessary JavaScript scripts or CDN links here -->
</body>
</html>
