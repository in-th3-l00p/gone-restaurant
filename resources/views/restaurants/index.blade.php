@php use Carbon\Carbon; @endphp
@extends("layout")

@section("content")
    <main class="flex h-screen w-screen">
        <x-sidebar/>

        <section class="p-16 flex-grow">
            <div class="space-y-2 mb-8">
                <h1 class="text-5xl font-semibold">Restaurants</h1>
                <p>Listing of all the restaurants showed on the website right now</p>
            </div>

            <div class="max-w-2xl flex flex-col gap-8">
                @forelse($restaurants as $restaurant)
                    <div class="p-4 rounded-md shadow-md bg-white w-full flex gap-8">
                        <img
                            src="/storage/{{ $restaurant->picture }}"
                            alt="{{ $restaurant->name }} picture"
                            class="w-[200px] aspect-square rounded-md"
                        >
                        <div class="flex-grow">
                            <h2 class="text-xl font-semibold">{{ $restaurant->name }}</h2>
                            <p class="text-slate-500 !mb-4">{{ Carbon::create($restaurant->created_at)->toDateString() }}</p>
                            <p>{{ $restaurant->description }}</p>
                        </div>
                        <div>
                            <p class="text-lg">{{ $restaurant->stars }} stars</p>
                        </div>
                        <div class="flex flex-col items-center gap-4">
                            <a
                                href="{{ route("restaurants.edit", [ "restaurant" => $restaurant ]) }}"
                                class="button w-full text-center"
                            >
                                Edit
                            </a>
                            <a
                                href="{{ route("restaurants.destroy", [ "restaurant" => $restaurant ]) }}"
                                class="button w-full text-center"
                            >
                                Delete
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-slate-500 text-center">There are no restaurants being sold at this moment</p>
                @endforelse
            </div>
        </section>
    </main>
@endsection
