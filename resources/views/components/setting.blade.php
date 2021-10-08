@props(['heading'])

<section class="py-8 max-w-4xl mx-auto"> 
    <h1 class="text-blue-500 text-lg font-bold mb-8 pb-2 border-b"> 
        {{$heading}}
    </h1>

    <div class="flex">
        <aside class="w-36 flex-shrink-0">
            <h4 class="font-semibold mb-4">Links</h4>
            <ul>
                <li>
                    <a href="/admin-profile" class="{{request()->is('admin-profile') ? 'text-blue-500': ''}}">Profile</a>
                </li>
                <li>
                    <a href="/edit-profile" class="{{request()->is('edit-profile') ? 'text-blue-500': ''}}">Edit Profile</a>
                </li>
                <li>
                    <a href="#" class="{{request()->is('admin/index') ? 'text-blue-500': ''}}">Dashboard</a>
                </li>
                <li>
                    <a href="#" class="{{request()->is('admin/index') ? 'text-blue-500': ''}}">All questions</a>
                </li>
                <li>
                    <a href="/question-create" class="{{request()->is('/question-create') ? 'text-blue-500': ''}}">New Question</a>
                </li>
            </ul>
        </aside>
    
        <main class="flex-1">        
    
            <x-panel class="max-w-6xl mx-auto mt-2 lg:mt-2 space-y-6"> 
                {{$slot}}        
            </x-panel>
        </main>
    </div> 
    
        
</section>