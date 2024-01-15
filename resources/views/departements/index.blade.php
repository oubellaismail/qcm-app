<x-layout>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold">Department List</h1>
        <form method="GET" action="{{ route('departement.create') }}">
            @csrf
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition duration-300">Add</button>
        </form>
    </div>
    <div class="bg-gray-100">
        <div class="container mx-auto py-8">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-100">Name</th>
                        <th class="px-6 py-3 bg-gray-100">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                        <tr class="hover:bg-gray-100 transition-colors">
                            <td class="px-6 py-4">{{ $department->name }}</td>
                            <td class="px-6 py-4 flex">
                                <form method="POST" action="{{ route('department.destroy', $department->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline mr-2">
                                        Delete
                                    </button>
                                </form>
                                <a href="{{ route('departement.show', $department->id) }}" class="text-blue-500 hover:underline">
                                    See Professors
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
