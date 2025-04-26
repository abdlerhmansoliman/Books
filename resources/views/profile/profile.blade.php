<x-app-layout>  

<div class="bg-white mt-4 border border-blue-200 rounded-md p-6 max-w-4xl mx-auto ">
    <h1 class="text-xl font-bold mb-10 text-[#1B3764]" >{{__('messages.profile')}} </h1> 
    <div class="grid grid-cols-3 gap-4 mb-10">
        <div class="border border-[#EFEFEF] rounded-md p-4 gap-2 flex flex-col items-center justify-center text-center">
            <a href="{{route('profile',['type'=>'downloads'])}}" class="mb-2">
                {{ __('messages.my downloads') }}
            </a>
            <div class="flex items-center space-x-2 justify-center">
                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.5835 8.49175H15.1752C13.2002 8.49175 11.5918 6.88341 11.5918 4.90841V2.50008C11.5918 2.04175 11.2168 1.66675 10.7585 1.66675H7.22516C4.6585 1.66675 2.5835 3.33342 2.5835 6.30841V13.6917C2.5835 16.6667 4.6585 18.3334 7.22516 18.3334H13.7752C16.3418 18.3334 18.4168 16.6667 18.4168 13.6917V9.32508C18.4168 8.86675 18.0418 8.49175 17.5835 8.49175ZM10.7335 13.1501L9.06683 14.8167C9.0085 14.8751 8.9335 14.9251 8.8585 14.9501C8.7835 14.9834 8.7085 15.0001 8.62516 15.0001C8.54183 15.0001 8.46683 14.9834 8.39183 14.9501C8.32516 14.9251 8.2585 14.8751 8.2085 14.8251C8.20016 14.8167 8.19183 14.8167 8.19183 14.8084L6.52516 13.1417C6.2835 12.9001 6.2835 12.5001 6.52516 12.2584C6.76683 12.0167 7.16683 12.0167 7.4085 12.2584L8.00016 12.8667V9.37508C8.00016 9.03341 8.2835 8.75008 8.62516 8.75008C8.96683 8.75008 9.25016 9.03341 9.25016 9.37508V12.8667L9.85016 12.2667C10.0918 12.0251 10.4918 12.0251 10.7335 12.2667C10.9752 12.5084 10.9752 12.9084 10.7335 13.1501Z" fill="#1B3764"/>
                    <path d="M15.0251 7.34158C15.8167 7.34991 16.9167 7.34991 17.8584 7.34991C18.3334 7.34991 18.5834 6.79158 18.2501 6.45825C17.0501 5.24991 14.9001 3.07491 13.6667 1.84158C13.3251 1.49991 12.7334 1.73325 12.7334 2.20825V5.11658C12.7334 6.33325 13.7667 7.34158 15.0251 7.34158Z" fill="#1B3764"/>
                    </svg>
                    
                <p>{{ $downloadsCount }}{{__('messages.download')}} </p>
            </div>
        </div>
    
        <div class="border border-[#EFEFEF] rounded-md  p-4 flex flex-col items-center justify-center text-center">
            <a href="{{route('profile',['type'=>'reviews'])}}" class="mb-2">
                {{ __('messages.review') }}
            </a>
            <div class="flex items-center space-x-2 justify-center">
                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.0847 17.1621L15.9731 2.3684C15.9227 2.12654 15.8251 1.89702 15.6857 1.69303C15.5463 1.48904 15.368 1.3146 15.161 1.17974C14.9541 1.04488 14.7224 0.952255 14.4795 0.90719C14.2366 0.862126 13.9872 0.865509 13.7456 0.917145L9.35719 1.86027C8.95372 1.94775 8.59089 2.1671 8.32594 2.48371C8.156 2.22022 7.9227 2.00355 7.64739 1.85353C7.37208 1.70351 7.06354 1.62492 6.75 1.62496H2.25C1.75272 1.62496 1.27581 1.8225 0.924175 2.17413C0.572544 2.52576 0.375 3.00268 0.375 3.49996V18.5C0.375 18.9972 0.572544 19.4742 0.924175 19.8258C1.27581 20.1774 1.75272 20.375 2.25 20.375H6.75C7.24728 20.375 7.72419 20.1774 8.07583 19.8258C8.42746 19.4742 8.625 18.9972 8.625 18.5V7.4609L11.0269 18.8815C11.1144 19.3027 11.3441 19.681 11.6775 19.9529C12.0109 20.2248 12.4276 20.3738 12.8578 20.375C12.9911 20.3748 13.124 20.3607 13.2544 20.3328L17.6428 19.3896C18.1283 19.2835 18.5522 18.9899 18.8223 18.5727C19.0923 18.1555 19.1866 17.6485 19.0847 17.1621ZM10.8928 7.3109L14.5491 6.52527L14.7863 7.65027L11.13 8.4359L10.8928 7.3109ZM11.5922 10.639L15.2484 9.8534L16.1072 13.939L12.4509 14.7246L11.5922 10.639ZM13.8478 3.19621L14.085 4.32121L10.4288 5.10683L10.1916 3.98183L13.8478 3.19621ZM2.625 7.24996H6.375V14.75H2.625V7.24996ZM6.375 3.87496V4.99996H2.625V3.87496H6.375ZM2.625 18.125V17H6.375V18.125H2.625ZM13.1522 18.0537L12.915 16.9287L16.5712 16.1431L16.8084 17.2681L13.1522 18.0537Z" fill="#1B3764"/>
                    </svg>
                    
                <p>{{ $reviewCount }}{{__('messages.reviews') }}</p>
            </div>
        </div>
    
        <div class="border  border-[#EFEFEF] rounded-md  p-4 flex flex-col items-center justify-center text-center">
            <a href="{{route('profile',['type'=>'books'])}}" class="mb-2">
                {{ __('messages.library') }}
            </a>
            <div class="flex items-center space-x-2 justify-center">
                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.0847 17.1621L15.9731 2.3684C15.9227 2.12654 15.8251 1.89702 15.6857 1.69303C15.5463 1.48904 15.368 1.3146 15.161 1.17974C14.9541 1.04488 14.7224 0.952255 14.4795 0.90719C14.2366 0.862126 13.9872 0.865509 13.7456 0.917145L9.35719 1.86027C8.95372 1.94775 8.59089 2.1671 8.32594 2.48371C8.156 2.22022 7.9227 2.00355 7.64739 1.85353C7.37208 1.70351 7.06354 1.62492 6.75 1.62496H2.25C1.75272 1.62496 1.27581 1.8225 0.924175 2.17413C0.572544 2.52576 0.375 3.00268 0.375 3.49996V18.5C0.375 18.9972 0.572544 19.4742 0.924175 19.8258C1.27581 20.1774 1.75272 20.375 2.25 20.375H6.75C7.24728 20.375 7.72419 20.1774 8.07583 19.8258C8.42746 19.4742 8.625 18.9972 8.625 18.5V7.4609L11.0269 18.8815C11.1144 19.3027 11.3441 19.681 11.6775 19.9529C12.0109 20.2248 12.4276 20.3738 12.8578 20.375C12.9911 20.3748 13.124 20.3607 13.2544 20.3328L17.6428 19.3896C18.1283 19.2835 18.5522 18.9899 18.8223 18.5727C19.0923 18.1555 19.1866 17.6485 19.0847 17.1621ZM10.8928 7.3109L14.5491 6.52527L14.7863 7.65027L11.13 8.4359L10.8928 7.3109ZM11.5922 10.639L15.2484 9.8534L16.1072 13.939L12.4509 14.7246L11.5922 10.639ZM13.8478 3.19621L14.085 4.32121L10.4288 5.10683L10.1916 3.98183L13.8478 3.19621ZM2.625 7.24996H6.375V14.75H2.625V7.24996ZM6.375 3.87496V4.99996H2.625V3.87496H6.375ZM2.625 18.125V17H6.375V18.125H2.625ZM13.1522 18.0537L12.915 16.9287L16.5712 16.1431L16.8084 17.2681L13.1522 18.0537Z" fill="#1B3764"/>
                    </svg>
                    
                <p>{{ $bookCount }} {{__('messages.books')}}</p>
            </div>
        </div>
    </div>

            @if($section=='books')
        <div class="grid grid-cols-3 gap-4">

                @forelse ($items as $book )
          <x-book-card :book="$book" />
                    
                @empty
               <div>
                <svg width="150" height="150" viewBox="0 0 150 150" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="150" height="150" fill="url(#pattern0_34_3877)"/>
                    <rect width="150" height="150" fill="url(#pattern1_34_3877)"/>
                    <defs>
                    <pattern id="pattern0_34_3877" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_34_3877" transform="scale(0.00666667)"/>
                    </pattern>
                    <pattern id="pattern1_34_3877" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_34_3877" transform="scale(0.00666667)"/>
                    </pattern>
                    <image id="image0_34_3877" width="150" height="150" preserveAspectRatio="none" xlink:href="data:image/png;base64,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"/>
                    </defs>
                    </svg>
                    
               </div>
                @endforelse
                @elseif ($section=='reviews')
        <div class="grid grid-cols-3 gap-4">

                @forelse ($items as $review )
                <div class="p-2 border mb-2 rounded">
                    <p>{{ $review->content }}</p>
                    <span class="text-sm text-gray-500">تاريخ المراجعة: {{ $review->created_at->format('Y-m-d') }}</span>
                </div>
                @empty
                <div class="col-span-3 text-center py-10 text-gray-500">
                    <svg viewBox="0 0 200 150" xmlns="http://www.w3.org/2000/svg">
                        <!-- Outer border -->
                        <rect x="1" y="1" width="198" height="148" stroke="#333" stroke-width="1" fill="none" />
                        
                        <!-- Magnifying glass -->
                        <g transform="translate(100, 70) scale(0.7)">
                          <!-- Glass circle -->
                          <circle cx="0" cy="0" r="35" stroke="#9999cc" stroke-width="5" fill="white" />
                          
                          <!-- Handle -->
                          <path d="M25,25 L60,60" stroke="#9999cc" stroke-width="10" stroke-linecap="round" />
                          
                          <!-- Face inside glass -->
                          <circle cx="-8" cy="-5" r="4" fill="black" />
                          <circle cx="8" cy="-5" r="4" fill="black" />
                          <path d="M-12,10 H12" stroke="black" stroke-width="2" stroke-linecap="round" />
                          
                          <!-- Small horizontal line below -->
                          <line x1="-15" y1="65" x2="15" y2="65" stroke="#9999cc" stroke-width="2" />
                        </g>
                        
                        <!-- Arabic text "لا يوجد أي بيانات" (No data found) -->
                        <text x="100" y="120" font-family="Arial, sans-serif" font-size="12" text-anchor="middle" fill="#cccccc" direction="rtl" xml:lang="ar">لا يوجد أي بيانات</text>
                      </svg>
                </div>
                @endforelse
                @elseif ($section=='downloads')
        <div class="grid grid-cols-3 gap-4">

                @forelse ($items as $download )

                @if ($download->book)
                    <x-book-card :book="$download->book" />
                @endif                  
                @empty
                <div class="col-span-3 text-center py-10 text-gray-500">
                    <svg viewBox="0 0 200 150" xmlns="http://www.w3.org/2000/svg">
                        <!-- Outer border -->
                        <rect x="1" y="1" width="198" height="148" stroke="#333" stroke-width="1" fill="none" />
                        
                        <!-- Magnifying glass -->
                        <g transform="translate(100, 70) scale(0.7)">
                          <!-- Glass circle -->
                          <circle cx="0" cy="0" r="35" stroke="#9999cc" stroke-width="5" fill="white" />
                          
                          <!-- Handle -->
                          <path d="M25,25 L60,60" stroke="#9999cc" stroke-width="10" stroke-linecap="round" />
                          
                          <!-- Face inside glass -->
                          <circle cx="-8" cy="-5" r="4" fill="black" />
                          <circle cx="8" cy="-5" r="4" fill="black" />
                          <path d="M-12,10 H12" stroke="black" stroke-width="2" stroke-linecap="round" />
                          
                          <!-- Small horizontal line below -->
                          <line x1="-15" y1="65" x2="15" y2="65" stroke="#9999cc" stroke-width="2" />
                        </g>
                        
                        <!-- Arabic text "لا يوجد أي بيانات" (No data found) -->
                        <text x="100" y="120" font-family="Arial, sans-serif" font-size="12" text-anchor="middle" fill="#cccccc" direction="rtl" xml:lang="ar">لا يوجد أي بيانات</text>
                      </svg>
                </div>
                @endforelse
            @endif
        </div>

</div>

</x-app-layout>