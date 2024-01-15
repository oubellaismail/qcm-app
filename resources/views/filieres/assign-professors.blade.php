<x-layout>
    <div class="bg-gray-100">
        <div class="container mx-auto py-8">
            <h1 class="text-3xl font-bold mb-8">Assign Professors to {{ $filiere->name }}</h1>

            <form method="POST" action="{{route('filiere.assign-professors', $filiere->id)}}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="professors">
                        Select Professors to Assign
                    </label>
                    @foreach ($professors as $professor)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="professor_{{ $professor->id }}" name="professors[]" value="{{ $professor->id }}">
                            <label class="form-check-label" for="professor_{{ $professor->id }}">
                                {{ $professor->user->name }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition duration-300">
                    Assign Professors
                </button>
            </form>
        </div>
    </div>
</x-layout>
