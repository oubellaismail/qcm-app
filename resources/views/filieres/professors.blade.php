<x-layout>
    <div class="bg-gray-100">
        <div class="container mx-auto py-8">
            <div class="flex justify-end mb-4">
            <form method="GET" action="{{route('filiere.no-assign-professors', $filiere->id)}}">
                @csrf
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition duration-300">Asseign professor</button>
            </form>
        </div>
            <h1 class="text-3xl font-bold mb-8">Professors in {{ $filiere->name }}</h1>

            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-100">Name</th>
                        <th class="px-6 py-3 bg-gray-100">Email</th>
                        <th class="px-6 py-3 bg-gray-100">Action</th>
                    </tr>
                </thead>
                <!-- Table Body -->
                <tbody>
                    @foreach ($filiere->professors as $professor)
                        <tr class="hover:bg-gray-100 transition-colors">
                            <td class="px-6 py-4 text-center">{{ $professor->user->name }}</td>
                            <td class="px-6 py-4 text-center">{{ $professor->user->email }}</td>
                            <td class="px-6 py-4 text-center">                                
                                <form action="{{ route('filiere.detachProfessor', ['filiere' => $filiere->id, 'professor' => $professor->id]) }}" method="post" class="flex justify-center">
                                @csrf
                                <button class="block py-2 px-2 rounded-md text-white bg-blue-500">
                                    De-Assign
                                </button>
                            </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
