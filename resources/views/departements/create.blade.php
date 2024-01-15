<x-layout>
    <div class="bg-gray-100">
        <div class="container mx-auto py-8">
            <h1 class="text-3xl font-bold mb-8">Add Department</h1>

            <form method="POST" action="{{ route('department.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                    <input type="text" id="name" name="name" class="border-2 border-gray-300 p-2 w-full" required>
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Department</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>