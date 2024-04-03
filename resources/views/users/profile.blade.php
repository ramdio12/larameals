<x-layout>
    {{-- <div class="md:flex items-center justify-center">

        <div class="bg-gray-200 mx-auto md:flex items-center justify-center flex-col md:w-1/2 rounded py-4 my-8 pl-2">
            <h1 class="font-bold text-xl mb-8">My Profile</h1>
            <div class="">
                <div class="">
                    <img class="w-48 mb-6 mx-auto rounded-full border-4 border-blue-300"
                        src={{ $profile->user()->photo ? asset('storage/' . $profile->user()->photo) : asset('/img/default.png') }}
                        alt="" />
                </div>
                <div class="mb-4 text-center">
                    <p class="font-semibold text-4xl"><span>@</span>{{ ucfirst($profile->user()->name) }}</p>
                    <p class="font-semibold text-xl">{{ $profile->user()->email }}</p>

                    <p class="font-semibold text-xl italic mt-4">
                        "
                        @if ($profile->user()->introduction)
                            {{ $profile->user()->introduction }}
                        @else
                            {{ "I'm a potential expert cook" }}
                        @endif
                        "
                    </p>

                </div>
            </div>

            <div class="w-80 flex justify-between items-center">
                <a href="/user/{{ $profile->user()->id }}/edit"
                    class="bg-blue-500 hover:bg-blue-700 duration-500 ease-in-out text-xl text-white py-2 px-4 w-28 text-center rounded-full">
                    <i class="fa-solid fa-edit"></i>
                    Edit</a>

                <a href="/recipes/manage"
                    class="bg-green-600 hover:bg-green-800 duration-500 ease-in-out text-xl text-white p-2 rounded-full">
                    <i class="fa-solid fa-eye"></i>
                    My Recipes</a>
            </div>
        </div>

    </div> --}}
    <div class=" md:w-4/6 mx-auto my-4 rounded  relative mx-8 py-4">
        <div class="h-44 bg-[url('/img/profile-bg.jpg')] bg-center bg-cover">
            <input type="hidden" name="">
        </div>
        <div class="h-80 bg-gray-400">
            <input type="hidden" name="">
        </div>
        <div
            class="absolute top-0 right-0 left-0 bottom-0 md:flex items-center justify-center flex-col rounded py-4 my-8 pl-2">
            <h1 class="font-bold text-xl mb-8 hidden md:block">My Profile</h1>
            <div class="">
                <div class="">
                    <img class="w-48 mb-6 mx-auto rounded-full bg-white border-4 border-blue-300"
                        src={{ $profile->user()->photo ? asset('storage/' . $profile->user()->photo) : asset('/img/default.png') }}
                        alt="" />
                </div>
                <div class="mb-4 text-center">
                    <p class="font-semibold text-4xl"><span>@</span>{{ ucfirst($profile->user()->name) }}</p>
                    <p class="font-semibold text-xl">{{ $profile->user()->email }}</p>

                    <p class="font-semibold text-xl italic mt-4">
                        "
                        @if ($profile->user()->introduction)
                            {{ $profile->user()->introduction }}
                        @else
                            {{ "I'm a potential expert cook" }}
                        @endif
                        "
                    </p>

                </div>
            </div>

            <div class="w-80 flex justify-between items-center mx-auto">
                <a href="/user/{{ $profile->user()->id }}/edit"
                    class="bg-blue-500 hover:bg-blue-700 duration-500 ease-in-out text-xl text-white py-2 px-4 w-28 text-center rounded-full">
                    <i class="fa-solid fa-edit"></i>
                    Edit</a>

                <a href="/recipes/manage"
                    class="bg-green-600 hover:bg-green-800 duration-500 ease-in-out text-xl text-white p-2 rounded-full">
                    <i class="fa-solid fa-eye"></i>
                    My Recipes</a>
            </div>
        </div>
    </div>


</x-layout>
