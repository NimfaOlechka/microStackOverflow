<x-layout> 
    <x-setting :heading="'Edit Question: '. $question->title">
        <form method="POST" action="/questions/edit/{{ $question->id }}"  enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            {{--Title--}}
            <x-form.input name='title' :value="old('title', $question->title)" />
            {{--Slug--}}
            <x-form.textarea name='slug'>{{ old('slug', $question->slug) }}</x-form.textarea>
            {{--Excerpt--}}
            <x-form.textarea name='excerpt'>{{ old('excerpt', $question->excerpt) }}</x-form.textarea>
            {{--body--}}
            <x-form.textarea name='body' cols='30' rows='5'>{{ old('body', $question->body) }}</x-form.textarea>                
            {{--Category select --}}
            
            {{--Thumbnail--}}
            <div class="flex mt-6 mb-6">
                <div class="flex-2 mr-4">
                    <img src="{{ asset('storage/'.$question->thumbnail)}}" alt="" class="rounded-xl" width="150">
                </div>
                    <x-form.input name='thumbnail' type='file' :value="old('thumbnail', $question->thumbnail)"/>
                    
            </div>            
              
            <x-form.button> Save changes </x-form.button>
        </form>
    </x-setting>    
</x-layout>