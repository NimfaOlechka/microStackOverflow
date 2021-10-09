<x-layout>     
    <x-setting heading="Ask new question">
         
        <form method="POST" action="/admin/questions/create"  enctype="multipart/form-data">
            @csrf
            {{--Title--}}
            <x-form.field>
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700 px-2"
                       for="title"
                >
                    Title
                </label>
                
                <input class="border border-gray-200 p-2 w-full rounded"            
                        name="title"
                        type="text"
                        id="title"  
                        required                     
                        value = "{{ old('title') }}" 
                >
                
                <x-form.error name="title" />
            </x-form.field >
            {{--Slug--}}
            <x-form.field>
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700 px-2"
                         for="slug"
                >
                    Slug
                </label>
                
                <input class="border border-gray-200 p-2 w-full rounded"            
                        name="slug"
                        type="text"
                        id="slug"                       
                        value = "{{ old('slug') }}" 
                >
                
                <x-form.error name="slug" />
            </x-form.field >

            {{--Excerpt--}}

            <x-form.field>
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700 px-2"
                     for="slug"
                >
                    Excerpt
                </label>

                <textarea 
                    class="border border-gray-200 rounded p-2 w-full"
                    cols="30"
                    rows="2"           
                    name="excerpt"   
                    id="excerpt" 
                     required
                >{{old('excerpt')}}</textarea>

                <x-form.error name="excerpt"/>
                </x-form.field>
            
            {{--body--}}
            
            <x-form.field>
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700 px-2"
                     for="slug"
                >
                        Body
                </label>

                <textarea 
                    class="border border-gray-200 rounded p-2 w-full"
                    cols="30"
                    rows="2"           
                    name="body"   
                    id="body" 
                    required
                >{{old('body')}}</textarea>

                <x-form.error name="body"/>
            </x-form.field>             
            {{--Tag select --}}
    
            <x-form.field>
                <x-form.label name='tag'/>                    
    
                    <select class="" name="tag_id" id="tag">
                        @php
                            $tags = \App\Models\Tag::all();
                        @endphp   
    
                        @foreach ($tags as $tag)
                            <option value="{{$tag->id}}"
                                {{ old('tag_id') == $tag->id ? 'selected' : '' }}
                                >{{ ucwords($tag->name) }}</option>
                        @endforeach                       
    
                    </select>    
                <x-form.error name='tag'/>
            </x-form.field>
             
            {{--Thumbnail--}}
                 
           {{--  <x-form.field>
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700 px-2"
                        for="thumbnail"
                >
                        Avatar
                </label>
        
                <input class="border border-gray-200 p-2 w-full rounded"            
                        name="thumbnail"
                        type="file"
                        id="thumbnail"  
                        required       
                        value = "{{ old('thumbnail') }}"
                >
        
                <x-form.error name="thumbnail" />
            </x-form.field >         --}}
              
            <x-form.button> Publish </x-form.button>
        </form>
     
    </x-setting>
 </x-layout>