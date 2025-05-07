<x-app-layout>  
  <x-page-header />

  <div class="container bg-white ">

    <div class=" py-10">

        <!-- Hero Section -->
        <div class="max-w-4xl mx-auto p-10 bg-amber-50 rounded-lg relative overflow-hidden">
          <!-- Background Decoration Elements -->
          <div class="absolute top-6 left-6 w-16 h-16 bg-amber-100 rounded-lg opacity-50"></div>
          <div class="absolute bottom-12 right-12 w-20 h-20 bg-amber-100 rounded-lg opacity-50"></div>
          <div class="absolute top-20 right-24 w-10 h-10 bg-amber-100 rounded-lg opacity-30"></div>
          <div class="absolute bottom-28 left-28 w-12 h-12 bg-amber-100 rounded-lg opacity-30"></div>
          
          <!-- Main Content -->
          <div class="relative z-10 flex flex-col items-center text-center">
            <!-- Heading -->
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-10  w-full">
                {{ __('messages.travel') }}
             </h1>
            
            <!-- Search Box -->
            <div class="w-full bg-white rounded-lg shadow-sm p-1">
              <div class="flex items-center">
                <!-- Search Input -->
                <div class="flex-grow">
                  <div class="relative">
                    <form action="{{ route('search') }}" method="GET">
                    <input 
                      type="text" 
                      name="query"
                      placeholder="{{ __('messages.can search') }}" 
                      class="w-full py-3 px-4  focus:outline-none rounded-lg"
                    >
                  </form>
                    <!-- Search Icon -->
                    <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                      </svg>
                    </div>
                  </div>
                </div>
                
                <!-- Search Button -->
                <div class="ml-2">
                  <button class="px-6 py-3 bg-amber-400 hover:bg-amber-500 transition text-gray-800 font-medium rounded-lg">
                    {{ __('messages.search') }}       
                </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="min-h-screen  py-10 px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
          @if($books)
          @foreach ($books as $book )
          <x-book-card :book="$book" />
          @endforeach
          @endif

        </a>
        </div>
      </div>
      
    </div>
</x-app-layout>