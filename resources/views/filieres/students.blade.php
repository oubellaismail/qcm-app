<x-layout>
    <div class="bg-gray-100">
        <div class="container mx-auto py-8">
            <h1 class="text-3xl font-bold mb-8">Students in {{ $filiere->name }}</h1>

            <table class="w-full border-collapse border border-gray-300">
                <!-- Table Header -->
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-100">Name</th>
                        <th class="px-6 py-3 bg-gray-100">Email</th>
                        <!-- Add more columns if needed -->
                    </tr>
                </thead>
                <!-- Table Body -->
                <tbody>
                    @foreach ($filiere->students as $student)
                        <tr class="hover:bg-gray-100 transition-colors">
                            <td class="px-6 py-4">{{ $student->user->name }}</td>
                            <td class="px-6 py-4">{{ $student->user->email }}</td>
                            <!-- Add more columns if needed -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
