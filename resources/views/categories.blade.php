<x-app-layout>  

  <x-page-header subpage="{{ __('messages.categories') }}" />
  
    <div class="container ">
    <div class=" py-3">
        <!-- Hero Section -->
    
      </div>
      <div class="grid grid-cols-4 gap-3">
        @foreach ($categories as $category )
        <div class="p-3 bg-white rounded-lg shadow-sm flex justify-center ">
          <a href="{{ route('category.show', $category->id) }}" class="flex items-center gap-4">
            
            <!-- النصوص -->
            <div class="flex flex-col items-end">
              <!-- اسم التصنيف -->
              <p class="text-blue-900 font-bold text-lg ">{{$category->name}}</p>
        
              <!-- عدد الكتب -->
              <p class="text-amber-400 text-sm mt-1 flex items-center justify-end">
                <span>{{$category->books_count}} {{__('messages.book')}}</span>
                <svg width="17" height="16" viewBox="0 0 17 16"  xmlns="http://www.w3.org/2000/svg">
                  <path d="M16.5 1.99978V13.7405L8.5 16.0265L0.5 13.7405V2.66645C0.5 2.03312 0.79 1.45112 1.296 1.06978C1.462 0.94445 1.64467 0.859116 1.83333 0.791116V12.7351L8.5 14.6398L15.1667 12.7351V0.12445C15.3553 0.19245 15.5387 0.277783 15.704 0.403116C16.21 0.78445 16.5 1.36645 16.5 1.99978ZM9.16667 2.24712V11.7558L8.5 11.9465L7.83333 11.7558V2.24712C7.83333 1.35912 7.23667 0.567783 6.33267 0.311783L5.22 0.045783C4.17267 -0.204217 3.16667 0.59045 3.16667 1.66712V11.8091L8.5 13.3331L13.8333 11.8091V1.68978C13.8333 0.625117 12.8487 -0.166884 11.8087 0.061783L10.6167 0.323783C9.76267 0.567783 9.166 1.35912 9.166 2.24712H9.16667Z" fill="#EBBB3F"/>
                </svg>
              </p>
            </div>
        
          </a>
        </div>
        
          @endforeach
                              
      </div>     
    </div>
    </div>
</x-app-layout>