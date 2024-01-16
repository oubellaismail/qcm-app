<x-prof-layout>
    <div class="bg-gray-100">
        <div class="container mx-auto py-8">
            <h1 class="text-3xl font-bold mb-8">Grades</h1>

            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-100">Student Name</th>
                        <th class="px-6 py-3 bg-gray-100">Quiz Title</th>
                        <th class="px-6 py-3 bg-gray-100">Grade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grades as $grade)
                        <tr class="hover:bg-gray-100 transition-colors">
                            <td class="px-6 py-4">{{ $grade->student->user->name }}</td>
                            <td class="px-6 py-4">{{ $grade->quiz->title }}</td>
                            <td class="px-6 py-4">{{ $grade->grade }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-prof-layout>