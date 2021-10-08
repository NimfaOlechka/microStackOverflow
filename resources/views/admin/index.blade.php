<x-layout> 
    <x-setting heading="Manage Posts">
            
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    @if ($questions->count())
                     
                        @if ($questions->count()>0)

                        <table class="min-w-full divide-y divide-gray-200">            
                        
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($questions as $question)                   
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">                    
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <a href="/questions/{{ $question->slug}}" class="hover:text-blue-700">
                                                            {{ $question->title }}
                                                        </a>
                                                        
                                                    </div>                      
                                                </div>
                                            </div>
                                        </td>                              
                                        

                                        {{-- Action buttons --}}
                                        
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="/admin/questions/{{ $question->id }}/edit" class="text-blue-500 hover:text-blue-700">Edit</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            {{-- <a href="/admin/posts/{{ $post->id }}/edit" class="text-red-500 hover:text-red-700">Delete</a> --}}
                                            <form method="POST" action="/admin/questions/{{$question->id}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            
                            </tbody>
                        </table>
                    @endif
                    @else
                    <p class="text-center">
                        Youd did not ask any questions yet. Create yours first question!
                      </p>
                    @endif
                </div>
            </div>
            </div>
        </div>
  
    </x-setting>    
</x-layout>