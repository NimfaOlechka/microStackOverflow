
<x-layout> 
    <p>Create question</p>  
    <x-setting heading="Ask new question">
         
     <form method="POST" action="/profile/update"  enctype="multipart/form-data">
         @csrf

         @method('PATCH')
         <x-form.input name='name' :value="old('name', $user->name)" />

        <x-form.field>
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700 px-2"
                     for="username"
            >
                    UserName
            </label>
        
            <input class="border border-gray-200 p-2 w-full rounded"            
                    name="username"
                    type="text"
                    id="username"  
                    required                     
                    value = "{{ $user->username }}" 
            >
        
            <x-form.error name="username" />
        </x-form.field >

        <x-form.field>
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700 px-2"
                     for="name"
            >
                    Email
            </label>
        
            <input class="border border-gray-200 p-2 w-full rounded"            
                    name="email"
                    type="email"
                    id="email"                       
                    value = "{{ $user->email }}" 
            >
        
            <x-form.error name="name" />
        </x-form.field >
         
        <x-form.field>
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700 px-2"
                     for="name"
            >
                    Password
            </label>
        
            <input class="border border-gray-200 p-2 w-full rounded"            
                    name="password"
                    type="password"
                    id="password"  
                    required   
                    autocomplete="new-password"                  
                    value = "{{ $user->password }}" 
            >
        
            <x-form.error name="password" />
        </x-form.field >
         
          
         {{--Avatar--}}
                      
         <x-form.field>
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700 px-2"
                     for="avatar"
            >
                    Avatar
            </label>
        
            <input class="border border-gray-200 p-2 w-full rounded"            
                    name="avatar"
                    type="file"
                    id="avatar"  
                    required       
                    value = "{{ $user->avatar }}" 
            >
        
            <x-form.error name="password" />
        </x-form.field >        
           
         <x-form.button> Update </x-form.button>
        </form>
    </x-setting>
 </x-layout>