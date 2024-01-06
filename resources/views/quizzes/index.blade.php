<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quiz List</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto flex justify-between items-center">
                <form method="GET" action="{{ route('quiz.create') }}">
                    @csrf
                    <button type="submit" class="bg-white text-blue-500 px-4 py-2 rounded-md shadow-md hover:bg-blue-100 transition duration-300">Add</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8">User List</h1>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-100">Title</th>
                    <th class="px-6 py-3 bg-gray-100">Descripiton</th>
                    <th class="px-6 py-3 bg-gray-100">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quizzes as $quiz)
                    <tr class="hover:bg-gray-100 transition-colors">
                        <td class="px-6 py-4 text-center">
                            <a href="{{route('quiz.show', $quiz->id)}}">
                                {{ $quiz->title }}
                            </a>
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $quiz->description }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="" class="text-blue-500 hover:underline">
                                <i class='fas fa-edit'></i>
                                Update
                            </a>
                            <form method="POST" action="" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-2 hover:underline">
                                    <i class="fas fa-trash-alt"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
