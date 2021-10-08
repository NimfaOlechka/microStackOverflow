@props(['answer'])
<x-panel class="bg-gray-100">
    <article class="flex  space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/100?u={{$answer->id}}" alt="" class="rounded-xl">
        </div>
        <div class="">
            <header class="mb-4">
                <h3 class="font-bold">
                    {{$answer->author->username}}
                </h3>
                <p class="text-xs">
                    Answered
                    <time>{{$answer->created_at->diffforHumans()}}</time>
                </p>
            </header>
            <p class="mb-4">
                {{$answer->body}}
            </p>
            <p class="mb-4" > Vote rating number</p>
            <a href="#" class="bg-blue-300 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-4">Up!</a>
            <a href="#" class="bg-red-300 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-4">Down!</a>
        </div>
    </article>
</x-panel>