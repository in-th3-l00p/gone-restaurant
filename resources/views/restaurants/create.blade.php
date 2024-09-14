@extends("layout")

@section("content")
    <main class="flex h-screen w-screen">
        <x-sidebar />

        <section class="p-16 flex-grow">
            <div class="space-y-2 mb-8">
                <h1 class="text-5xl font-semibold">Add a restaurant</h1>
                <p>Publish your restaurant</p>
            </div>

            <form
                method="post"
                action="{{ route("restaurants.store") }}"
                class="space-y-4 max-w-xl"
                enctype="multipart/form-data"
            >
                @csrf

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input
                        type="text" name="name" id="name"
                        class="input" value="{{ old("name") }}"
                    >
                </div>
                @error("name")
                    <p class="text-red-600">{{ $message }}</p>
                @enderror

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea
                        type="text" name="description" id="description"
                        class="input" rows="8"
                    >{{ old("description") }}</textarea>
                </div>
                @error("description")
                    <p class="text-red-600">{{ $message }}</p>
                @enderror

                <div class="form-group">
                    <label for="stars">Stars:</label>
                    <input
                        type="number" name="stars" id="stars"
                        class="input" value="{{ old("stars") }}"
                    >
                </div>
                @error("stars")
                <p class="text-red-600">{{ $message }}</p>
                @enderror

                <div class="form-group">
                    <label for="picture">Picture:</label>
                    <input
                        type="file" accept="image/*"
                        name="picture" id="picture"
                        class="input" value="{{ old("picture") }}"
                    >
                </div>
                @error("picture")
                <p class="text-red-600">{{ $message }}</p>
                @enderror

                <button type="submit" class="button">Create</button>
            </form>
        </section>
    </main>
@endsection
