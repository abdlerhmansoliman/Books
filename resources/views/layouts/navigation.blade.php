<nav>
  <!-- Top Navigation Bar -->
  <div class="bg-white shadow">
    <div class="flex items-center justify-between px-8 py-4 text-black">
      <!-- Hamburger Menu (Left) -->
<!-- القائمة الجانبية باستخدام checkbox -->
<div class="relative z-50">
  <!-- Input مخفي للتحكم -->
  <input type="checkbox" id="menu-toggle" class="hidden peer" />

  <!-- زر الهامبرجر -->
  <label for="menu-toggle" class="flex items-center cursor-pointer">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
  </label>

  <!-- القائمة الجانبية -->
  <x-sidebar />

</div>

      
      <!-- Auth Buttons (Center-Left) -->
        
      <div class="flex space-x-2">
      @guest

        <a href="/login" class="px-6 py-2 bg-blue-900 text-white rounded-md hover:bg-blue-800 transition">
          {{ __('messages.login') }}
        </a>
        <a href="/register" class="px-6 py-2 bg-yellow-400 text-black rounded-md hover:bg-yellow-300 transition">
          {{ __('messages.new account') }}
        
        </a>
      @endguest

      </div>
     <!-- Search Bar (Center) -->
      <div class="flex-1 max-w-xl mx-6">
<form action="{{ route('search') }}" method="GET" class="relative w-full flex">
  <input
    type="text"
    id="search"
    name="query"
    placeholder="{{ __('messages.can search') }}"
    class="w-full pl-12 pr-4 py-2 bg-gray-100 border border-gray-200 rounded-full focus:outline-none"
  >
  <!-- Search icon -->
  <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
         viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103 10.5a7.5 7.5 0 0013.65 6.15z" />
    </svg>
  </div>

  <button type="submit" class="ml-2 px-4 py-2 hidden bg-blue-600 text-white rounded-full hover:bg-blue-700 transition">بحث</button>
</form>

      </div>
      
      <!-- Brand/Logo (Right) -->
      <div class="text-xl font-bold text-blue-900">
        {{ __('messages.mybooks') }}
      </div>
    </div>
  </div>
  
  <!-- Bottom Navigation -->
  <div class="bg-gray-50 border-t border-gray-200 py-3 shadow-lg">
    <div class="container mx-auto px-8 flex justify-between items-center">
      <!-- Subscription Button (Left) -->
      <div>
        <a href="/add" class="flex items-center justify-center gap-2 px-4 py-2 border border-blue-900 rounded-md bg-white text-blue-900 hover:bg-blue-50 transition">
          <span class="text-sm font-medium">
            {{ __('messages.publish') }}
          </span>
          <!-- Book Icon SVG -->
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_0_1742)">
              <path d="M20 2.49985V17.1757L10 20.0332L0 17.1757V3.33318C0 2.54152 0.3625 1.81402 0.995 1.33735C1.2025 1.18068 1.43083 1.07402 1.66667 0.989018V15.919L10 18.2999L18.3333 15.919V0.155684C18.5692 0.240684 18.7983 0.347351 19.005 0.504018C19.6375 0.980684 20 1.70818 20 2.49985ZM10.8333 2.80902V14.6949L10 14.9332L9.16667 14.6949V2.80902C9.16667 1.69902 8.42083 0.709851 7.29083 0.389851L5.9 0.0573508C4.59083 -0.255149 3.33333 0.738184 3.33333 2.08402V14.7615L10 16.6665L16.6667 14.7615V2.11235C16.6667 0.781518 15.4358 -0.208483 14.1358 0.0773508L12.6458 0.404851C11.5783 0.709851 10.8325 1.69902 10.8325 2.80902H10.8333Z" fill="#1B3764"/>
            </g>
            <defs>
              <clipPath id="clip0_0_1742">
                <rect width="20" height="20" fill="white"/>
              </clipPath>
            </defs>
          </svg>
        </a>
      </div>
      
      <!-- Main Navigation Links (Center) -->
      <div class="flex-1 flex justify-center">
        <ul class="flex space-x-6 text-lg">
          <li class="flex flex-col items-center relative">
            <a href="/" class="text-black-500"> {{ __('messages.home') }} </a>
            @if(request()->is('/'))
              <div class="absolute top-full mt-2 w-2 h-2 bg-blue-800 rounded-full"></div>
            @endif
          </li>
      
          <li class="flex flex-col items-center relative">
            <a href="/categories">
              {{ __('messages.categories') }}
            </a>
            @if(request()->is('categories'))
              <div class="absolute top-full mt-2 w-2 h-2 bg-blue-800 rounded-full"></div>
            @endif
          </li>
  
          <li class="flex flex-col items-center relative">
            <a href="{{route('books.top-rated')}}" class="text-black">
              {{ __('messages.best books') }}
            </a>
            @if(request()->is('top-rated-books'))
              <div class="absolute top-full mt-2 w-2 h-2 bg-blue-800 rounded-full"></div>
            @endif
          </li>
      
          <li class="flex flex-col items-center relative">
            <a href="/authors" class="text-black-500">
              {{ __('messages.authors') }}
            </a>
            @if(request()->is('authors'))
              <div class="absolute top-full mt-2 w-2 h-2 bg-blue-800 rounded-full"></div>
            @endif
          </li>
        </ul>
      </div>
    </div>
  </div>
  
</nav>