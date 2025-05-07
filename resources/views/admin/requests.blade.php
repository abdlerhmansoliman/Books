    <x-dash-layout>
        <table class="table-fixed  m-8 text-sm text-left text-gray-700 border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="w-1/6 px-4 py-2">{{ __('messages.book name') }}</th>
                    <th class="w-1/6 px-4 py-2">{{ __('messages.author name') }}</th>
                    <th class="w-1/6 px-4 py-2">{{ __('messages.book category') }}</th>
                    <th class="w-1/6 px-4 py-2">{{ __('messages.book description') }}</th>
                    <th class="w-1/6 px-4 py-2">{{ __('messages.pages') }}</th>
                    <th class="w-1/6 px-4 py-2">{{ __('messages.review') }}</th>
                    <th class="w-1/6 px-4 py-2">{{ __('messages.rating') }}</th>
                    <th class="w-1/6 px-4 py-2">{{ __('messages.control') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $books as $book )
                
                <tr class="border-t">
                    <td class="px-4 py-2 flex items-center space-x-3">
                        @if ($book->coverImage())
                        <img src="{{ asset('storage/' . $book->coverImage()->path) }}" 
                        alt="صورة بروفايل" 
                        class="w-20 h-20 rounded-full object-cover shadow-md">  
                        @else
    
                        @endif
      
                        <span>{{$book->title}} </span>
                    </td>                               
                    <td class="px-4 py-2">
                        {{$book->auth_name}}
                    </td>
                    <td class="px-4 py-2 break-all"> {{$book->category->name}}
                    </td>
                    <td class="px-4 py-2">
                        {{$book->description}}
                    </td>
                    <td class="px-4 py-2">{{$book->pages}}</td>
                    <td class="px-4 py-2">{{ $book->reviews_count}} </td>
                    <td class="px-4 py-2">{{ $book->RatingsAvgRating ?? 0}} </td>
                    <td class="px-4 py-2">
                        <form action="{{route('request.update',$book->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" name="status" value="approved" class="btn btn-success">{{__('messages.approv')}} </button>
                            <button type="submit" name="status" value="rejected" class="btn btn-danger">{{__('messages.reject')}} </button>
                        </form>
                        
                      </td>
                </tr>
                @endforeach
    
            </tbody>
        </table>
    </x-dash-layout>