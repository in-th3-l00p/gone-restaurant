@extends("layout")

@section("content")
    <main class="w-screen h-screen flex justify-center items-center">
        <form
            action="{{ route("login.submit") }}"
            method="post"
            class="space-y-4"
        >
            @csrf

            <h1 class="text-4xl font-semibold text-center">Authenticate</h1>
            <div class=form-group">
                <label for="passphrase">Passphrase:</label>
                <input
                    type="text" name="passphrase" id="passphrase"
                    class="input"
                >
            </div>
            @error("passphrase")
                <p class="text-red-600 text-center">{{ $message }}</p>
            @enderror

            <button
                type="submit"
                class="button block mx-auto"
            >
                Login
            </button>
        </form>
    </main>
@endsection
