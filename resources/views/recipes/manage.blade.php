<x-layout>

    <header>
        <h1 class="text-3xl text-center font-bold my-6 uppercase">
            Manage Gigs
        </h1>
    </header>
    @unless ($recipes->isEmpty())
        <table class="md:w-4/6 md:table-fixed rounded-sm mx-auto border border-white rounded ">
            <thead class="bg-gray-400 text-xl ">
                <tr>
                    <th class="py-2">Title</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>


                @foreach ($recipes as $recipe)
                    <tr class="border-gray-300">
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg">
                            <a href="/recipes/{{ $recipe->id }}" class="text-white">

                                @foreach (explode(',', $recipe->title) as $title)
                                    <ul>
                                        <li>{{ ucwords($title) }}</li>
                                    </ul>
                                    {{-- <p class="w-1/2 mx-auto">
                        
                        </p> --}}
                                @endforeach
                            </a>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg">
                            <a href="/recipes/ {{ $recipe->id }}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                    class="fa-solid fa-pen-to-square"></i>
                                Edit</a>
                            <form action="/recipes/{{ $recipe->id }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500">
                                    <i class="fa-solid fa-trash"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                        {{-- <td class="px-4 py-2 border-t border-b border-gray-300 text-lg">
                            <form action="/recipes/{{ $recipe->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500">
                                    <i class="fa-solid fa-trash">Delete</i>
                                </button>
                            </form>
                        </td> --}}
                    </tr>
                @endforeach


            </tbody>
        </table>
    @else
        <div class="flex justify-center items-center w-full">
            <p class="text-center text-white font-bold text-4xl">You have no recipes yet, please create <a
                    href="/recipes/create" class="text-blue-400 underline">one</a></p>
        </div>

    @endunless

</x-layout>
