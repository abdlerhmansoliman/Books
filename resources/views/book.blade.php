<x-app-layout>  
    <div class="max-w-6xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="flex flex-col md:flex-row">
            <!-- Book Information -->
            <div class="p-6 flex-grow">
                <!-- Author Name -->
                <h3 class="text-right text-yellow-500 text-lg font-semibold mb-2">{{$book->auth_name}}</h3>
                
                <!-- Book Title -->
                <h2 class="text-right text-blue-900 text-2xl font-bold mb-1">{{$book->title}} </h2>
                
                <!-- Category -->
                <p class="text-right text-[#EBBB3F] text-sm mb-6">{{$book->category->name}} </p>
                
                <!-- Book Details - Grid Layout -->
                <div class="grid grid-cols-2 gap-y-3 border-b border-gray-200 pb-6 mb-4">
                    <div class="text-gray-800 font-medium text-right">{{__('messages.language')}}:</div>
                    <div class="text-gray-600 text-right"> اللغة العربية</div>
                    
                    <div class="text-gray-800 font-medium text-right">{{__('messages.publish date')}} :</div>
                    <div class="text-gray-600 text-right">  {{$book->publication_year}}: </div>
                    
                    <div class="text-gray-800 font-medium text-right">{{__('messages.pages')}}:</div>
                    <div class="text-gray-600 text-right"> {{$book->pages}}</div>
                    
                    <div class="text-gray-800 font-medium text-right">{{__('messages.size')}} :</div>
                    <div class="text-gray-600 text-right">  {{$book->pdf_size}}</div>
                    
                    <div class="text-gray-800 font-medium text-right"> {{__('messages.file type')}}:</div>
                    <div class="text-gray-600 text-right"> {{ $fileExtension ?? 'N/A' }}</div>
                    
                    <div class="text-gray-800 font-medium text-right">{{__('messages.downloads')}}:</div>
                    <div class="text-gray-600 text-right"> {{$downloadCount}}</div>
                </div>
                
                <!-- Ratings and Reviews -->
                <div class="flex items-center justify-between mb-6">
                    <!-- Star Rating -->
                    <div class="flex items-center">
                        <div class="flex items-center space-x-1 space-x-reverse">
                            <span class="text-yellow-400">
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="text-yellow-400">
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="text-yellow-400">
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="text-yellow-400">
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="text-gray-300">
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                    </div>
                    
                    <!-- Reviews and Ratings Count -->
                    <div class="flex items-center gap-4 space-x-4 space-x-reverse">
                        <!-- عرض عدد التقييمات -->
                        <div class="text-yellow-500">({{ $book->ratings_count  }}) {{ __('messages.rating') }}</div>
                        <div class="text-yellow-500">({{ $book->reviews_count  }}) {{ __('messages.review') }}</div>
                        <!-- عرض النجوم بناءً على متوسط التقييم -->
                        <div class="flex">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= floor($book->ratings_avg_rating))
                                    <!-- نجم مملوء -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#F2C94C" stroke="currentColor" stroke-width="0.5" viewBox="0 0 24 24" class="w-5 h-5">
                                        <path d="M12 2l2.4 7.4h7.6l-6.2 4.5 2.4 7.4-6.2-4.5-6.2 4.5 2.4-7.4-6.2-4.5h7.6z"/>
                                    </svg>
                                @elseif ($i - $book->ratings_avg_rating < 1 && $i - $book->ratings_avg_rating > 0)
                                    <!-- نجم نصف مملوء - بنفس تصميم الآخرين -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                        <path fill="none" stroke="currentColor" stroke-width="0.5" d="M12 2l2.4 7.4h7.6l-6.2 4.5 2.4 7.4-6.2-4.5-6.2 4.5 2.4-7.4-6.2-4.5h7.6z"/>
                                        <clipPath id="half-star-{{ $i }}">
                                            <rect x="0" y="0" width="12" height="24" />
                                        </clipPath>
                                        <path clip-path="url(#half-star-{{ $i }})" fill="#F2C94C" stroke="none" d="M12 2l2.4 7.4h7.6l-6.2 4.5 2.4 7.4-6.2-4.5-6.2 4.5 2.4-7.4-6.2-4.5h7.6z"/>
                                    </svg>
                                @else
                                    <!-- نجم فارغ -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="0.5" viewBox="0 0 24 24" class="w-5 h-5">
                                        <path d="M12 2l2.4 7.4h7.6l-6.2 4.5 2.4 7.4-6.2-4.5-6.2 4.5 2.4-7.4-6.2-4.5h7.6z"/>
                                    </svg>
                                @endif
                            @endfor
                        </div>
                    </div>
                    
                </div>
                
                <!-- Action Buttons -->
                <div class="flex flex-wrap gap-3">
                    <div>
                        <a href="{{ route('books.read', $book->id) }}" target="_blank">
                            <button class="flex items-center justify-center gap-2 px-4 py-2 border border-blue-900 rounded-md bg-white text-blue-900 hover:bg-blue-50 transition">
                                <span class="text-right text-sm font-medium">
                                    {{ __('messages.read book') }}
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
                            </button>
                        </a>
                        
                      </div>
                    
                      <div>
                        <form action="{{route('books.download',$book->id)}}" method="GET">
                        <button class="flex items-center justify-center gap-2 px-4 py-2 border border-blue-900 rounded-md bg-white text-blue-900 hover:bg-blue-50 transition">
                          <span class="text-right text-sm font-medium">
                        {{ __('messages.download book') }}
                
                          </span>
                          <!-- Book Icon SVG -->
                          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.0835 8.4915H14.6752C12.7002 8.4915 11.0918 6.88317 11.0918 4.90817V2.49984C11.0918 2.0415 10.7168 1.6665 10.2585 1.6665H6.72516C4.1585 1.6665 2.0835 3.33317 2.0835 6.30817V13.6915C2.0835 16.6665 4.1585 18.3332 6.72516 18.3332H13.2752C15.8418 18.3332 17.9168 16.6665 17.9168 13.6915V9.32484C17.9168 8.8665 17.5418 8.4915 17.0835 8.4915ZM10.2335 13.1498L8.56683 14.8165C8.5085 14.8748 8.4335 14.9248 8.3585 14.9498C8.2835 14.9832 8.2085 14.9998 8.12516 14.9998C8.04183 14.9998 7.96683 14.9832 7.89183 14.9498C7.82516 14.9248 7.7585 14.8748 7.7085 14.8248C7.70016 14.8165 7.69183 14.8165 7.69183 14.8082L6.02516 13.1415C5.7835 12.8998 5.7835 12.4998 6.02516 12.2582C6.26683 12.0165 6.66683 12.0165 6.9085 12.2582L7.50016 12.8665V9.37484C7.50016 9.03317 7.7835 8.74984 8.12516 8.74984C8.46683 8.74984 8.75016 9.03317 8.75016 9.37484V12.8665L9.35016 12.2665C9.59183 12.0248 9.99183 12.0248 10.2335 12.2665C10.4752 12.5082 10.4752 12.9082 10.2335 13.1498Z" fill="#1B3764"/>
                            <path d="M14.5251 7.34158C15.3167 7.34991 16.4167 7.34991 17.3584 7.34991C17.8334 7.34991 18.0834 6.79158 17.7501 6.45825C16.5501 5.24991 14.4001 3.07491 13.1667 1.84158C12.8251 1.49991 12.2334 1.73325 12.2334 2.20825V5.11658C12.2334 6.33325 13.2667 7.34158 14.5251 7.34158Z" fill="#1B3764"/>
                            </svg>
                            
                            
                        </button>
                        </form>
                      </div>
                    
                      <div>
                        <div>
                            <!-- زر التقييم -->
                            <button id="comment-btn" class="flex items-center justify-center gap-2 px-4 py-2 border border-blue-900 rounded-lg bg-white text-blue-900 hover:bg-blue-50 transition duration-300 ease-in-out">
                              <span class="text-sm font-medium">
                                {{ __('messages.rating') }}
                              </span>
                              <!-- Book Icon SVG -->
                              <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-blue-900">
                                <path d="M10 0L13.0095 5.85783L19.5106 6.90983L14.8694 11.5822L15.8779 18.0902L10 15.12L4.12215 18.0902L5.13059 11.5822L0.489435 6.90983L6.99054 5.85783L10 0Z" fill="#1B3764"/>
                              </svg>
                            </button>
                          
                            <!-- نموذج التعليق -->
                                <div id="comment-box" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
                                    <form action="{{ route('books.rate', $book->id) }}" method="POST">
                                        @csrf
                                        <div class="rating flex flex-col bg-white p-6 rounded-lg w-96 justify-center gap-3  mb-2">
                                            <!-- نجوم التقييم -->
                                            <h1 class="text-black text-right text-lg ">{{__('messages.add review')}}</h1>
                                            <div class="flex  justify-end gap-1">
                                                @for ($i = 5; $i >= 1; $i--)
                                                    <input type="radio" id="star-{{ $book->id }}-{{ $i }}" name="rating" value="{{ $i }}" class="hidden peer" />
                                                    <label for="star-{{ $book->id }}-{{ $i }}" class="cursor-pointer">
                                                        <svg class="w-5 h-5 
                                                                    peer-checked:fill-yellow-400 
                                                                    peer-hover:fill-yellow-300 
                                                                    transition-all duration-150 
                                                                    fill-gray-300 
                                                                    hover:fill-yellow-300" 
                                                             viewBox="0 0 24 22" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12 0L15.6114 7.0294L23.4127 8.2918L17.8433 13.8986L19.0534 21.7082L12 18.144L4.94658 21.7082L6.15671 13.8986L0.587322 8.2918L8.38865 7.0294L12 0Z"/>
                                                        </svg>
                                                    </label>
                                                @endfor
                                            </div>
                                        
                                            <!-- مربع النص للتعليق -->
                                            <textarea name="review" id="comment-text" class="w-full h-32 p-2 border border-gray-300 rounded-lg" placeholder="اكتب تعليقك هنا..."></textarea>
                                        
                                            <!-- الأزرار -->
                                            <div class="mt-4 flex justify-start gap-2">
                                                <button type="submit" class="bg-[#1B3764]  text-white p-2 rounded-lg">إرسال</button>
                                                <button type="button" id="close-comment" class=" text-[#1B3764] border border-[#1B3764] p-2 rounded-lg">إغلاق</button>
                                            </div>
                                        </div>
                                        

 
                                    </form>
                                    
                                </div>
                          </div>
                          
                      </div>
                    
                      <div>
                        <form action="{{route('bookmark.add',$book->id)}}" method="POST">
                            @csrf
                        <button class="flex items-center justify-center gap-2 px-4 py-2 border border-blue-900 rounded-md bg-white text-blue-900 hover:bg-blue-50 transition">
                          <span class="text-right text-sm font-medium">
                        {{ __('messages.save') }}
                
                          </span>
                          <!-- Book Icon SVG -->
                          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.37399 19.625C2.82902 19.8195 3.33211 19.8723 3.81761 19.7765C4.30312 19.6808 4.7485 19.441 5.09565 19.0883L9.99982 14.2108L14.904 19.0883C15.1327 19.3203 15.4051 19.5047 15.7054 19.6307C16.0058 19.7567 16.3282 19.8219 16.654 19.8225C16.9888 19.8215 17.3202 19.7544 17.629 19.625C18.0877 19.4393 18.4799 19.1197 18.7541 18.7077C19.0284 18.2958 19.1721 17.8107 19.1665 17.3158V4.16667C19.1652 3.062 18.7258 2.00296 17.9446 1.22185C17.1635 0.440735 16.1045 0.00132321 14.9998 0L4.99982 0C3.89516 0.00132321 2.83612 0.440735 2.055 1.22185C1.27389 2.00296 0.834476 3.062 0.833153 4.16667V17.3158C0.827775 17.8111 0.971967 18.2964 1.24687 18.7084C1.52178 19.1204 1.9146 19.4399 2.37399 19.625Z" fill="#1B3764"/>
                            </svg>
                            
                        </button>
                    </form>
                      </div>
                </div>
            </div>
            
            <!-- Book Cover Image -->
            <div class="md:w-1/3 p-4">
                <img src="{{ asset('storage/' . $book->coverImage()->path) }}" alt="Placeholder Image" class="w-full h-full object-cover  mx-auto mb-2" />
            </div>
        </div>
    </div>
      <div class="max-w-6xl mx-auto p-4">
        <!-- Book Overview Section -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <!-- Date Badge -->
            <div class="mb-4">
                <span class="bg-purple-500 text-white text-xs px-2 py-1 rounded">20 × 20.05</span>
            </div>
            
            <!-- Book Excerpt Heading -->
            <h2 class="text-right text-xl text-[#1B3764] font-bold border-b border-gray-200 pb-2 mb-4"> {{__('messages.about the book')}} </h2>
            
            <!-- Book Excerpt Content -->
            <p class="text-[#646E79] text-m leading-relaxed mb-4 ">
                {{$book->description}}
            </p>

            
            <!-- Social Share -->
            <div class="flex items-center justify-between border-t border-gray-200 pt-4">
                <div class="text-sm text-red-500">شارك الكتاب مع الأصدقاء</div>
                <div class="flex space-x-3 space-x-reverse">
                    <a href="#" class="text-gray-600 hover:text-gray-800">
                        <i class="fab fa-whatsapp text-green-500"></i>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-gray-800">
                        <i class="fab fa-facebook text-blue-600"></i>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-gray-800">
                        <i class="fab fa-twitter text-blue-400"></i>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-gray-800">
                        <i class="fab fa-vimeo-v text-blue-900"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Reviews Section -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <h2 class="text-right text-lg font-bold border-b border-gray-200 pb-2 mb-6">التقييمات</h2>
          
            @foreach ($book->reviews as $review)
              <div class="border-b border-gray-100 pb-6 mb-6">
                <div class="flex flex-row-reverse justify-between mb-2 items-start">
                  <!-- الصورة -->
                  <div class="flex-shrink-0">
                    <img src="{{ $review->user->profile_image }}" class="w-12 h-12 rounded-full object-cover border" />
                  </div>
          
                  <!-- الاسم + الريفيو + النجوم -->
                  <div class="flex-grow text-right pr-3">
                    <!-- الاسم والتاريخ -->
                    <div class="flex justify-between items-center mb-1">
                      <div class="text-xs text-gray-500">{{ $review->created_at->diffForHumans() }}</div>
                      <h3 class="font-semibold text-blue-900">{{ $review->user->name }}</h3>

                    </div>
          
                    <!-- نص التقييم -->
                    <p class="text-x text-[#646E79] mb-2">{{ $review->review }}</p>
          
                    <!-- النجوم -->
                    <div class="flex justify-end items-center text-sm text-blue-900">
                      <span class="ml-2  text-[#EBBB3F] text-x">({{ $review->user->reviews_count }} {{__('messages.review')}})</span>

                      <x-star-rating :rating="$review->user->average_rating ?? 0" />
                    </div>
          
                    @if(isset($review->body))
                      <p class="mt-2 text-gray-700">{{ $review->body }}</p>
                    @endif
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          

        <!-- Related Books Section -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8 ">
            <h1 class="text-2xl font-bold text-right mb-4">{{ __('messages.ralated') }}</h1>
        
            <div class="grid grid-cols-5 gap-4 text-right">
                @foreach ($relatedBooks as $relatedBook)
                    <div class="p-4 bg-white rounded-lg  text-center flex flex-col items-center">
                        <a href="{{ route('books.show', $relatedBook->id) }}" class="block w-full">
                            <img 
                                src="{{ $user->profile_image }}" 
                                alt="Book Cover" 
                                class="w-full h-64 object-cover mx-auto mb-3 rounded-md" 
                            />
        
                            <h2 class="text-md text-[#646E79] mt-2">{{ $relatedBook->auth_name }}</h2>
                            <p class="text-lg font-semibold mt-1">{{ $relatedBook->title }}</p>
                        </a>
        
                        <x-star-rating :rating="$relatedBook->ratings_avg_rating ?? 0"  />

                    </div>
                @endforeach
            </div>
        </div>
        
        <!-- Gray line separator after the entire related books section -->
        <div class="w-full h-px bg-gray-400 my-20"></div>

            <!-- قسم الكتب من نفس المؤلف -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                <h1 class="text-xl text-right">{{__('messages.same author')}}</h1>
                <div class="grid grid-cols-5 gap-4 text-right">
                    @foreach ($booksByAuthor as $bookByAuthor)
                    <div class="p-4 rounded">
                        <a href="{{ route('books.show', $bookByAuthor->id) }}">
                            <img src="{{ asset('storage/' . ($bookByAuthor->coverImage()->path ?? 'default.jpg')) }}" alt="Book Cover" class="w-full h-64 object-cover mx-auto mb-3 rounded-md" />
                            <h1 class="text-lg text-[#646E79]">{{ $bookByAuthor->auth_name }}</h1>
                            <p class="text-xl font-semibold">{{ $bookByAuthor->title }}</p>
                        </a>
                        <!-- Rating Section -->
                        <x-star-rating :rating="$relatedBook->ratings_avg_rating ?? 0"  />

                      </div>  
                    @endforeach
                </div>
            </div>
              
        </div>
    </div>
</x-app-layout>