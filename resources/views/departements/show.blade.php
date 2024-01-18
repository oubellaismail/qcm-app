<x-layout>
    
    <div class="bg-gray-100">
        <div class="container mx-auto py-8">
            <h1 class="text-3xl font-bold mb-8">{{ $department->name }}</h1>

            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-100">Name</th>
                        <th class="px-6 py-3 bg-gray-100">Email</th>
                        <!-- Add more columns if needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($department->professors as $professor)
                        <tr class="hover:bg-gray-100 transition-colors">
                            <td class="px-6 py-4 text-center">{{ $professor->user->name }}</td>
                            <td class="px-6 py-4 text-center">{{ $professor->user->email }}</td>
                            <!-- Add more columns if needed -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
