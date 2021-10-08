@auth
<x-panel>
    <form method="POST" action="/questions/{{$question->slug}}/answers" >
        @csrf
        
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="50" class="rounded-full">
            <h1 class="ml-4">Do you know the answer?</h1>
        </header>

        <div class="m-2 border border-gray-200 rounded-xl ">    
            
            <textarea class="w-full border-gray-100 rounded-xl text-sm p-2" 
                   cols="30" rows="5"                                           
                   name="body"                                          
                   placeholder="Leave your answer her..."                                           
                   required
            ></textarea>
            <x-form.error name="body" />
        </div>

        <div class="flex justify-end">
            <button type="submit"
                    class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-2 px-10 hover:bg-blue-500"
            >
                Post
            </button>

            <x-form.button> Answer </x-form.button>
        </div>    
    </form>
</x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class=" text-blue-300 hover:underline">Register</a>
        or <a href="/login" class="text-blue-300 hover:underline">Log in</a>
        to leave an answer.
    </p>
@endauth