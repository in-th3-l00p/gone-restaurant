@php use Carbon\Carbon; @endphp
@extends("layout")

@section("content")
    <main class="flex h-screen w-screen">
        <x-sidebar/>

        <section class="p-16 flex-grow">
            <div class="space-y-2 mb-8">
                <h1 class="text-5xl font-semibold">Dishes</h1>
                <p>Listing of all the dishes being sold right now</p>
            </div>

            <div class="max-w-2xl flex flex-col gap-8">
                @forelse($dishes as $dish)
                    <div class="p-4 rounded-md shadow-md bg-white w-full flex gap-8">
                        <img
                            src="/storage/{{ $dish->picture }}"
                            alt="{{ $dish->name }} picture"
                            class="w-[200px] aspect-square rounded-md"
                        >
                        <div class="flex-grow">
                            <h2 class="text-xl font-semibold">{{ $dish->name }}</h2>
                            <p class="text-slate-500 !mb-4">{{ Carbon::create($dish->created_at)->toDateString() }}</p>
                            <p>{{ $dish->description }}</p>
                        </div>
                        <div>
                            <p class="text-lg">€{{ number_format($dish->price, 2) }}</p>
                        </div>
                        <div class="flex flex-col items-center gap-4">
                            <a
                                href="{{ route("dishes.edit", [ "dish" => $dish ]) }}"
                                class="button w-full text-center"
                            >
                                Edit
                            </a>
                            <form action="{{ route("dishes.destroy", [ "dish" => $dish ]) }}" method="post">
                                @csrf
                                @method("DELETE")

                                <button
                                    type="submit"
                                    class="button w-full text-center"
                                >
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-slate-500 text-center">There are no dishes being sold at this moment</p>
                @endforelse
            </div>
        </section>
    </main>
@endsection
