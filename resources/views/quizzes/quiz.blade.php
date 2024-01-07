<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions List</title>
    <!-- Include Tailwind CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto mt-5">
    <h1 class="text-center text-4xl font-bold mb-8">Questions List</h1>
    <div class="flex justify-center">
        <div class="w-full md:w-1/3 bg-white shadow-md rounded px-8 py-6">
            <form method="get" action="{{ route('quiz.show', $quiz->id) }}">
                @csrf
                <ul>
                    <li class="mb-6">
                        <strong class="block mb-2">{{ $question->description }}</strong>
                        <ul>
                            @foreach($question->options as $option)
                                <li class="flex items-center mb-2">
                                    <input type="checkbox" name="selected_options[]" value="{{ $option->id }}" class="form-checkbox rounded text-blue-500">
                                    <span class="ml-2">{{ $option->option_text }}</span>
                                    @if($option->is_correct)
                                        <span class="text-green-500 ml-2">[Correct]</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                <div class="text-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full md:w-auto">Check Answers</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include any necessary JavaScript scripts or CDN links here -->
</body>
</html>
