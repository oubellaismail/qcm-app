<x-prof-layout>
    <div class="bg-gray-100">
        <div class="container mx-auto mt-5">
            <h1 class="text-center text-4xl font-bold mb-8">Questions List</h1>
            <div class="flex justify-center">
                <div class="w-full md:w-1/3 bg-white shadow-md rounded px-8 py-6">
                    <div>
                        <ul>
                            @foreach($quiz->questions as $question)
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
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-prof-layout>
