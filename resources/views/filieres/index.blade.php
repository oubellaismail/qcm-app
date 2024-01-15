<x-layout>
    <div class="bg-gray-100">
        <div class="container mx-auto py-8">
            <h1 class="text-3xl font-bold mb-8">Field of Study List</h1>

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
                            <td class="px-6 py-4">{{ $filiere->name }}</td>
                            <td class="px-6 py-4">
                                <a href="" class="text-blue-500 hover:underline">
                                    See Students
                                </a>
                                <a href="" class="text-blue-500 hover:underline">
                                    Assign Professor
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
