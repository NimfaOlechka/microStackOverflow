<x-layout> 
    
   <x-setting heading="Ask new question">
        
    <form method="POST" action="/question-create"  enctype="multipart/form-data">
        @csrf
        {{--Title--}}
        <x-form.input name='title' required/>
        {{--Slug--}}
        <x-form.textarea name='slug' required/>
        {{--Excerpt--}}
        <x-form.textarea name='excerpt'required/>
        {{--body--}}
        <x-form.textarea name='body' cols='30' rows='5' required/>                
        {{--Category select --}}

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
        <x-form.input name='thumbnail' type='file' />                     
        
          
        <x-form.button> Publish </x-form.button>
    </form>
</x-setting>
</x-layout>