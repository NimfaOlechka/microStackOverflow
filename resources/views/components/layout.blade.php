<!doctype html>

<title>Micro Stack Overflow</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<style>
    html{
        scroll-behavior: smooth;

    }

    .clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .clamp.one-line{
        -webkit-line-clamp: 1;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">                   
                    <img class="hidden lg:block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="Workflow">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                    {{-- <x-dropdown>
                        <x-slot name='trigger'>
                            <button class="text-xs font-bold uppercase"
                             > Wellcome, {{auth()->user()->name}}
                            </button>
                        </x-slot> 
                        @can('admin')
                            <x-dropdown-item href="/admin/posts" :active="request()->is('/admin/posts')">
                                Dashboard                            
                            </x-dropdown-item> 
                            <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">
                                New Post                            
                            </x-dropdown-item> 
                        @endcan --}}
                       {{--  @admin
                            <x-dropdown-item href="/logout">
                                Log out
                            </x-dropdown-item>
                        @endadmin --}}
                      {{--   <x-dropdown-item href='#' x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">
                            Post Log out
                        </x-dropdown-item>
                        <form id="logout-form" method="POST" action="/logout" class="hidden">
                            @csrf
                        </form>
                    </x-dropdown> --}}

                    {{-- <form method="POST" action="/logout" class=" text-sm font-bold uppercase text-blue-500 ml-6">
                        @csrf
                        <button type="submit">Log out</button>
                    </form>
                    <a href="/admin/posts/create" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                        + New Post
                    </a>  --}}
                    <a href="#" class="bg-gray-300 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Some link</a>
                @else
                    <a href="#" class="bg-gray-300 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Register</a>
                    <a href="#" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Log In</a>
                @endauth               
                
                               
            </div>
        </nav>    

      {{$slot}}

        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            
            </div>
        </footer>
    </section>

     <x-flash /> 
</body>