<x-layout>
    <div class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8">Quiz List</h1>

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
                            <a href="{{route('question.create', $quiz->id)}}" class="text-blue-500 hover:underline">
                                Add Question
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

</x-layout>