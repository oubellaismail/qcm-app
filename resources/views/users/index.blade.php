<x-layout>
            <div class="flex justify-end mb-4">
            <form method="GET" action="{{route('user.create')}}">
                @csrf
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition duration-300">Add</button>
            </form>
        </div>
<div class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8">User List</h1>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-100">Name</th>
                    <th class="px-6 py-3 bg-gray-100">Email</th>
                    <th class="px-6 py-3 bg-gray-100">Role</th>
                    <th class="px-6 py-3 bg-gray-100">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-100 transition-colors">
                        <td class="px-6 py-4 text-center">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-center">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $user->role->name }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('user.edit', $user->id) }}" class="text-blue-500 hover:underline">
                                <i class='fas fa-edit'></i>
                                Update
                            </a>
                            <form method="POST" action="{{ route('user.destroy', $user->id) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-2 hover:underline">
                                    <i class="fas fa-trash-alt"></i>
                                    Delete
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
