<x-layout> 
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    {{--TODO: Image for the post--}}
                    {{-- <img src="{{ $question->thumbnail}}" alt="" class="rounded-xl"> --}}
                    <img src="https://i.pravatar.cc/300?u={{$question->id}}" alt="" class="rounded-xl">
                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time>{{ $question->created_at->diffforHumans()}}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="{{$question->author->avatar}}" class="rounded-xl" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <a href="/?author={{$question->author->username}}">
                                <h5 class="font-bold">{{$question->author->name}}</h5>                        
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <x-back-button />
                    {{--TODO: Tags to be done --}}
                    <div class="mb-2">
                        <x-tag-button :tag="$question->tags"/>                                           
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{$question->title}}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        <p>{{$question->body}}</p>                    
                    </div>

                    {{--Answer section--}}
                   
                    <section class="col-span-8 col-start-5 mt-10 space-y-6">
                        @include('questions._add-answer-form')
                        <h5 class="font-bold">ANSWERS:</h5>
                        @foreach ($question->answers as $answer)
                            <x-question-answer :answer="$answer"/>     
                        @endforeach                           
                    </section>
                </div>
            </article>
           
        </main>   
    </section>
  </x-layout>