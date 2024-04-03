<x-layout>

    <div class="overflow-hidden">
        <h1 class="font-bold text-4xl text-center py-8 text-white">Lara Meals</h1>
        <p class="text-xl text-center md:w-1/2 mx-auto mb-8 text-white">
            All meals here are created by ordinary people who wanted to share their
            knowledge on a certain recipe. You can browse their works if you are
            looking for an affordable and innovative recipes, or you can share yours
            too.
        </p>
        {{-- <div class="text-center mb-4">
        <input type="text" class="w-80 py-2 bg-gray-200" />
        <button class="py-2 bg-red-500 text-white px-2">Search</button>
      </div> --}}

        @include('partials._search')
        <p class="text-white text-center">As of now, we already have {{ $totalrecipes }} recipes in total</p>

    </div>

    <div class="flex items-center justify-center flex-wrap gap-4 p-2">
        @unless (count($recipes) == 0)
            @foreach ($recipes as $recipe)
                <x-recipe-card :recipe="$recipe" />
            @endforeach
        @else
            <h1>No recipes yet</h1>
        @endunless
    </div>
    <div class="mt-6 p-4">
        {{ $recipes->links() }}
    </div>
</x-layout>
