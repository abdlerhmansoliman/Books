<a href="{{ route('books.show', $book->id) }}" class="group">
    <div class="bg-white    p-4 flex flex-col items-center">
      
      {{-- صورة الغلاف --}}
      @if($book->coverImage())
        <img src="{{ asset('storage/' . $book->coverImage()->path) }}" 
             alt="Cover" 
             class="w-full h-60 object-cover rounded-xl mb-3" />
      @else
        <div class="w-full h-60 flex items-center justify-center bg-gray-200 text-gray-500 rounded-xl mb-3">
          لا توجد صورة
        </div>
      @endif

      {{-- بيانات الكتاب --}}
      <div class="text-center no-underline">
        <p class="text-sm text-gray-500">{{ $book->auth_name }}</p>
        <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $book->title }}</h2>
      </div>

      {{-- النجوم --}}
      <x-star-rating :rating="$book->ratings_avg_rating ?? 0"  />
     
    </div>