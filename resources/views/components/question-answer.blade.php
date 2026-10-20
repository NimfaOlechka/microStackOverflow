@props(['answer'])

<x-panel class="bg-gray-100">
    <article class="flex gap-4">
        {{-- Answer avatar --}}
        <div class="flex-shrink-0">
            <img
                src="https://i.pravatar.cc/100?u={{ $answer->id }}"
                alt="Answer author avatar"
                class="w-12 h-12 rounded-full object-cover"
            >
        </div>

        <div class="flex-1 min-w-0">
            {{-- Edit answer --}}
            @if (auth()->check() && $answer->author->username === auth()->user()->username)
                <a
                    href="/answer/{{ $answer->id }}/update"
                    class="inline-block mb-3 rounded-full bg-blue-500 hover:bg-blue-600 text-xs font-semibold text-white uppercase py-2 px-4 transition"
                >
                    Edit answer
                </a>
            @endif

            {{-- Author and date --}}
            <header class="mb-4">
                <h3 class="font-bold text-gray-900">
                    {{ $answer->author->username }}
                </h3>

                <p class="text-xs text-gray-500">
                    Answered
                    <time>{{ $answer->created_at->diffForHumans() }}</time>
                </p>
            </header>

            {{-- Answer body --}}
            <p class="mb-5 text-gray-800 leading-relaxed whitespace-pre-line">
                {{ $answer->body }}
            </p>

            {{-- Voting section --}}
            <div class="flex flex-wrap items-center gap-3 border-t border-gray-200 pt-4">
                <a
                    href="/rating/{{ $answer->id }}/voteUp"
                    aria-label="Upvote answer"
                    title="Upvote"
                    class="inline-flex items-center gap-2 rounded-lg border border-green-200 bg-green-50 px-4 py-2 text-sm font-semibold text-green-700 hover:bg-green-100 hover:border-green-300 transition focus:outline-none focus:ring-2 focus:ring-green-400"
                >
                    <span aria-hidden="true">▲</span>
                    <span>Upvote</span>
                </a>

                <div class="min-w-12 rounded-lg bg-white border border-gray-200 px-4 py-2 text-center">
                    <span class="text-sm font-bold text-gray-800">
                        {{ $answer->rating->sum('vote') }}
                    </span>
                </div>

                <a
                    href="/rating/{{ $answer->id }}/voteDown"
                    aria-label="Downvote answer"
                    title="Downvote"
                    class="inline-flex items-center gap-2 rounded-lg border border-red-200 bg-red-50 px-4 py-2 text-sm font-semibold text-red-700 hover:bg-red-100 hover:border-red-300 transition focus:outline-none focus:ring-2 focus:ring-red-400"
                >
                    <span aria-hidden="true">▼</span>
                    <span>Downvote</span>
                </a>

                @if ($answer->rating->isEmpty())
                    <span class="text-xs text-gray-500">Be the first to vote</span>
                @endif
            </div>
        </div>
    </article>
</x-panel>