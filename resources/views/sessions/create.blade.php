<x-layout>
  <section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
      <h1 class="text-center font-bold text-xl">Log in!</h1>
      {{-- use POST as we're creating a new resource' --}}
      <form method="POST" action="/login">
        @csrf
        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                  for="username"
          >
          Username
          </label>
          <input 
            class="border border-gray-400 p-2 w-full"
            type="text"
            name="username"
            id="username"
            value="{{old('username')}}"
            required
          >
          @error('username')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                  for="password"
          >
          Password
          </label>
          <input 
            class="border border-gray-400 p-2 w-full"
            type="password"
            name="password"
            id="password"
            required
          >
          @error('password')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-6">
          <button type="submit" class="bg-blue-600 text-white rounded py-2 px-4 hover:bg-blue-700">
            Submit
          </button>

        </div>

        {{-- Another way to show form errors is by checking and looping over the error bag --}}
        @if($errors->any())
          <ul>
            @foreach($errors->all() as $error)
            <li class="text-red-500 text-xs">{{$error}}</li>
            @endforeach
          </ul>
        @endif

      </form>
    </main>
  </section>
</x-layout>