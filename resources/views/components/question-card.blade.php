@props(['question'])
<article
            {{ $attributes->merge(['class'=>'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl'])}}>
            <div class="py-6 px-5">
                
                <div class="mt-8 flex flex-col justify-between">
                    <header>
                        {{--TODO: Many tags for one post--}}
                        <div class="space-x-2">
                            <x-tag-button :tag="$question->tags"/>                                            
                        </div>                         

                        <div class="mt-4">
                            <h1 class="text-3xl">
                                <a href="/questions/{{$question->slug}}">
                                    {{$question->title}}
                                </a>
                            </h1>

                            <span class="mt-2 block text-gray-400 text-xs">
                                Published <time>{{$question->created_at->diffforHumans()}}</time>
                            </span>
                        </div>
                    </header>

                    <div class="text-sm mt-4">
                        <p>
                            {{$question->excerpt}}
                        </p>                        
                    </div>

                    <footer class="flex justify-between items-center mt-8">
                        <div class="flex items-center text-sm">
                            {{--TODO: Update image for users avatar--}}
                            <img src="https://i.pravatar.cc/40?u={{$question->author->id}}" alt="Lary avatar">
                            <div class="ml-3">
                                <h5 class="font-bold">
                                    <a href="/?author={{$question->author->username}}">
                                        {{$question->author->name}}
                                    </a>                                    
                                </h5>                                
                            </div>
                        </div>

                        <div>
                            <a href="/posts/{{$question->slug}}"
                               class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-4"
                            >
                               Read
                            </a>
                        </div>
                    </footer>
                </div>
            </div>
        </article>
