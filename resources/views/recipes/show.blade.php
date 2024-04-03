<x-layout>

    <div class="p-4 bg-gray-200 w-5/6 mx-auto mt-10 rounded">

        <div id="pdfContent">
            <h1 class="font-bold text-4xl py-6 text-center bg-gray-300 mb-4" id="recipeTitle">
                {{ ucfirst($recipe->title) }}</h1>
            <div class="text-center basis-1/2">
                <img class="md:w-4/6 mx-auto border-2 border-black"
                    src={{ $recipe->photo ? asset('storage/' . $recipe->photo) : asset('/img/default.png') }}
                    alt="" />

            </div>


            <div class="flex flex-col items-center justify-center px-2 w-100 text-center basis-3/4">
                <div class="my-8">
                    <h2 class="text-2xl underline font-bold mb-4">Information</h2>
                    <div class="md:flex justify-between items-center w-100 md:gap-20">

                        <div class="text-xl">
                            <div class="flex">
                                <h2 class="font-semibold">Author : </h2>
                                <p>&nbsp;{{ ucfirst($recipe->user->name) }}</p>
                            </div>
                            <div class="flex">
                                <h2 class="font-semibold">Posted : </h2>
                                <p>&nbsp;{{ date('Y-m-d', strtotime($recipe->created_at)) }}</p>
                            </div>
                        </div>
                        <div class="my-8 text-xl">
                            <div class="flex">
                                <h2 class="font-semibold">Good for : </h2>
                                <p>&nbsp;<span class="font-bold text-xl">{{ $recipe->serving }}</span> servings</p>
                            </div>
                            <div class="flex">
                                <h2 class="font-semibold">Category : </h2>
                                <p>&nbsp;{{ ucfirst($recipe->category) }}</p>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- DESCRIPTION --}}
                <div class="mb-8">
                    <h2 class="text-2xl underline font-bold mb-4">Description</h2>
                    <p class="mx-auto">
                        {{ $recipe->description }}
                    </p>
                </div>

                <div class="mb-8">
                    <h2 class="text-2xl font-bold underline mb-4">Ingredients</h2>
                    <ol class="text-left ingredients">
                        {!! $recipe->ingredientStr !!}
                    </ol>
                </div>
                <div class="mb-8 px-6">
                    <h2 class="text-2xl font-bold underline mb-4">Instructions and Tips</h2>
                    <ol class="text-left instructions">
                        {!! $recipe->instructionStr !!}
                    </ol>
                </div>


                {{-- ingredients --}}
                {{-- <p class="w-1/2 mx-auto">
            </p> --}}
                {{-- <div class="my-8">
                <h2 class="text-2xl underline font-bold mb-4">Ingredients</h2>
                @foreach (explode(',', $recipe->ingredients) as $ingredient)
                    <ul>
                        <li>{{ $ingredient }}</li>
                    </ul>
                @endforeach
            </div> --}}

                {{-- INSTRUCTIONS --}}


                {{-- <div class="mb-8">
                <h2 class="text-2xl font-bold underline mb-4">Instructions</h2>
                <p class="mx-auto" id="instructions">
                    {{ $recipe->instructions }}
                </p>
            </div> --}}


            </div>


        </div>

    </div>
    <div class="flex items-center justify-center w-full py-8 gap-10">
        <button class="bg-red-600 hover:bg-red-800 py-2 px-4 text-white font-semibold rounded" id="download">
            <i class="fa-solid fa-download"></i>
            Download Recipe
        </button>
        <button class="bg-blue-600 py-1 px-4 text-white font-semibold rounded">
            <i class="fa-solid fa-save"></i>
            Save to Favorites (To be added later)
        </button>
    </div>
</x-layout>
