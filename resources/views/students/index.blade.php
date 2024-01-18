<x-layout>
    <div class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8">Quiz List</h1>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-100">Title</th>
                    <th class="px-6 py-3 bg-gray-100">Descripiton</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quizzes as $quiz)
                    <tr class="hover:bg-gray-100 transition-colors">
                        <td class="px-6 py-4 text-center">
                            <a href="{{route('quiz.pass', $quiz->id)}}">
                                {{ $quiz->title }}
                            </a>
                            @error('error')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $quiz->description }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

</x-layout>