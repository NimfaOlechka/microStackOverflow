<x-layout>  

<header class="max-w-xl mx-auto mt-20 text-center px-4">
    <h1 class="text-4xl font-bold">
        My <span class="text-blue-500">Stack Overflow</span> Micro
    </h1>

    {{-- Avatar --}}
    <div class="mt-6 flex justify-center">
        <img
            src="{{ asset('storage/avatars/pubava1.png') }}"
            alt="User avatar"
            class="w-16 h-16 rounded-full object-cover border-2 border-gray-200 shadow-sm"
        />
    </div>

    {{-- Thumbnail --}}
    <div class="mt-6 flex justify-center">
        <img
            src="{{ asset('storage/thumbnail/thumb1.png') }}"
            alt="Question thumbnail"
            class="w-full max-w-sm h-48 object-cover rounded-xl shadow-md"
        />
    </div>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <!-- TODO: tags -->
        <div class="relative lg:inline-flex items-center bg-gray-100 rounded-xl">
        </div>

        <!-- Search -->
        {{-- TODO: Fix height of the button and search form --}}
        {{-- TODO: Define and implement search function --}}
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="/">
                @if (request('tags'))
                    <input type="hidden" name="category" value="{{ request('tags') }}">
                @endif

                <input
                    type="text"
                    name="search"
                    placeholder="Find something"
                    class="bg-transparent placeholder-black font-semibold text-sm"
                    value="{{ request('search') }}"
                >
            </form>
        </div>
    </div>
</header>
  
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
      @if ($questions->count())
        @if ($questions->count()>=1)
        
            <div class="lg:grid lg:grid-cols-6">
    
                @foreach ($questions as $question)         
                    <x-question-card
                        :question='$question' 
                    class="col-span-2"/>
                @endforeach  
            </div>
            {{ $questions->links() }}
    @endif
      @else
          <p class="text-center">
            No questions yet. Please check back later.
          </p>
      @endif     
    </main>
</x-layout>