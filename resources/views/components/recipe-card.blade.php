{{-- we gonna pass the recipe data here with @props --}}
@props(['recipe'])

<div class="flex items-center justify-center flex-col w-80 border border-white rounded p-4 relative bg-cardBg hover:scale-105 ease-in-out duration-700"
    title="{{ $recipe->title }}">

    <a href="/recipes/{{ $recipe->id }}" title="Check {{ $recipe->title }}"
        class="bg-red-700 py-1 px-2 rounded absolute top-2 left-2"><i class="fa-solid fa-eye text-white"></i></a>

    <div class="w-80 h-60 px-2">
        <img class="w-full h-full rounded" {{-- src={{asset("/img/default.png")}}  --}}
            src={{ $recipe->photo ? asset('storage/' . $recipe->photo) : asset('/img/default.png') }}
            alt="{{ $recipe->title }}">
    </div>

    <div title="{{ $recipe->description }}">
        <h1 class="font-bold mb-2 underline py-2 text-xl">
            @foreach (explode(',', $recipe->title) as $title)
                <ul>
                    <li>{{ ucwords($title) }}</li>
                </ul>
            @endforeach
        </h1>
        <p class="font-semibold mb-2">{{ substr($recipe->description, 0, 50) }}...</p>
        <div>
            <p><a href="/?category={{ $recipe->category }}">Category:&nbsp;<span
                        class="underline text-blue-800">{{ $recipe->category }}</span></a></p>
        </div>

    </div>

</div>
