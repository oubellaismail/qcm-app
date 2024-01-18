<x-prof-layout>

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold">Filieres List</h1>
        <form method="GET" action="{{ route('filiere.create') }}">
            @csrf
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition duration-300">Add</button>
        </form>
    </div>

    <div class="bg-gray-100">
        <div class="container mx-auto py-8">
            <table class="w-full border-collapse border border-gray-300">
                <!-- Table Header -->
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-100">Name</th>
                        <th class="px-6 py-3 bg-gray-100">Actions</th>
                    </tr>
                </thead>
                <!-- Table Body -->
                <tbody>
                    @foreach ($filieres as $filiere)
                        <tr class="hover:bg-gray-100 transition-colors">
                            <td class="px-6 py-4 text-center">{{ $filiere->name }}</td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{route('filiere.students', $filiere->id)}}" class="text-blue-500 hover:underline">
                                    See Students
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-prof-layout>
