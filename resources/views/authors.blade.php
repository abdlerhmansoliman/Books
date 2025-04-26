<x-app-layout>  
  <x-page-header subpage="{{ __('messages.authors') }}" />
  <div class="container ">
    <div class=" py-10">
        <!-- Hero Section -->
    
      </div>
 <div class="grid grid-cols-3 gap-4">
  @foreach ($users as $user)
    <a href="{{ route('books.author', $user->id) }}" class="block">
      <div class="p-4 bg-white shadow-sm rounded-lg flex items-center gap-4 min-h-[110px]">
        <!-- معلومات الكاتب -->
        <div class="flex-1 flex flex-col justify-center">
          <!-- اسم الكاتب -->
          <h2 class="font-bold text-blue-900 mb-1 text-lg truncate">{{$user->name}}</h2>
          
          <!-- تقييمات الكاتب -->
          <div class="flex items-center gap-2 mb-2">
            <span class="text-gray-500 text-sm">( {{$user->ratings_count}} {{__('messages.rating')}} )</span>
            <div class="flex gap-1 flex-row-reverse">
              <div class="flex items-center px-2 py-0.5 text-blue-900 rounded-md text-sm">
                <x-star-rating :rating="$user->ratings_avg_rating ?? 0" />
              </div>
            </div>
          </div>
          
          <!-- عدد الكتب مع أيقونة -->
          <div class="flex items-center gap-1 justify-start text-amber-400 text-sm">
            <span>{{$user->books_count}}</span>
            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M16.5 1.99978V13.7405L8.5 16.0265L0.5 13.7405V2.66645C0.5 2.03312 0.79 1.45112 1.296 1.06978C1.462 0.94445 1.64467 0.859116 1.83333 0.791116V12.7351L8.5 14.6398L15.1667 12.7351V0.12445C15.3553 0.19245 15.5387 0.277783 15.704 0.403116C16.21 0.78445 16.5 1.36645 16.5 1.99978ZM9.16667 2.24712V11.7558L8.5 11.9465L7.83333 11.7558V2.24712C7.83333 1.35912 7.23667 0.567783 6.33267 0.311783L5.22 0.045783C4.17267 -0.204217 3.16667 0.59045 3.16667 1.66712V11.8091L8.5 13.3331L13.8333 11.8091V1.68978C13.8333 0.625117 12.8487 -0.166884 11.8087 0.061783L10.6167 0.323783C9.76267 0.567783 9.166 1.35912 9.166 2.24712H9.16667Z" fill="#EBBB3F"/>
            </svg>
          </div>
        </div>
        
        <!-- صورة الكاتب -->
        <div class="flex-shrink-0">
          <img src="https://images.pexels.com/photos/694740/pexels-photo-694740.jpeg?w=300&h=400&auto=compress&cs=tinysrgb" class="w-20 h-20 rounded-full object-cover border-4 border-white" />
        </div>
      </div>
    </a>
  @endforeach
</div>

    </div>
    </div>
    
</x-app-layout>