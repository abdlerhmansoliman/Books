<x-app-layout>  
    <title>Home</title>
    <div class="container">
    <div class="py-10">
        <!-- Hero Section -->
        <div class="max-w-4xl mx-auto bg-white rounded-lg  overflow-hidden ">
            <div class="flex flex-col md:flex-row">
                <!-- Author Information -->
                <div class="p-4 md:p-6 flex-grow flex flex-col justify-between">
                    <!-- Author Name and Bio -->
                    <div>
                        <h2 class="text-xl md:text-2xl font-bold text-blue-900 mb-2">{{$user->name}} </h2>
                        <p class="text-gray-600 text-sm leading-relaxed mb-3">
                            كاتب مصري ولد في 30 من مايو عام 1992، له عدد من سلاسل الأدب البوليسية والرعب للأطفال والشباب. ارتبط المشاهدون 
                            المصريون والعرب بمسلساله التي تم تحويلها إلى دراما تلفزيونية. ولد الحلبي في الإسكندرية عام 1992، يعمل حاليًا في قسم السينما بكلية 
                            الفنون والتمثيل أثناء ممارسته لعدد كبير من مسابقات الإلكترونية والتلفزيون وتحرير <span class="text-yellow-500">آراء الهيئة</span>
                        </p>
                    </div>
    
                    <!-- Statistics -->
                    <div class="flex items-center space-x-8 space-x-reverse mt-4 justify-end">
                        <!-- Ratings -->

                    
                        <!-- Publications Stats -->
                        <div class="flex space-x-7 gap-4 space-x-reverse text-sm">
                            <div class="text-center">
                                <p class="text-gray-500"> {{__('messages.review')}} </p>
                                <p class="font-semibold text-gray-700">({{$userReviewsCount}})</p>
                            </div>
                            <div class="text-center">
                                <p class="text-gray-500">{{__('messages.rating')}}</p>
                                <p class="font-semibold text-gray-700">({{$authorRatingCount}})</p>
                            </div>
                        </div>
                    
                        <!-- Follow Button -->
                        <dev class="flex items-center px-4 py-1  text-blue-900 rounded-md text-sm ">
                            <x-star-rating :rating="$authorRating ?? 0"  />

                                
                        </dev>
                    </div>
                    <div>
                    <!-- زر التقييم -->
                    <button id="author-rating-btn"   class="inline-flex w-aut items-center justify-center gap-1 px-2 py-1 border border-blue-900 rounded-md bg-white text-blue-900 hover:bg-blue-50 transition duration-300 ease-in-out">
                        <span class="text-sm font-medium">
                            {{ __('messages.rating') }}
                        </span>
                        <!-- Icon -->
                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-blue-900">
                            <path d="M10 0L13.0095 5.85783L19.5106 6.90983L14.8694 11.5822L15.8779 18.0902L10 15.12L4.12215 18.0902L5.13059 11.5822L0.489435 6.90983L6.99054 5.85783L10 0Z" fill="#1B3764"/>
                        </svg>
                    </button>

                    <!-- نموذج التقييم -->
                    <div id="author-rating-box" class="hidden fixed inset-0 bg-black bg-opacity-50  justify-center items-center z-50">
                        <form action="{{ route('authors.rating.store', $user->id) }}" method="POST">
                            @csrf
                            <div class="rating flex flex-col bg-white p-6 rounded-lg w-96 justify-center gap-3 text-yellow-400 mb-2">
                                <h1 class="text-black  text-lg">{{ __('messages.rating') }}</h1>
                                
                                <!-- نجوم التقييم -->
                                <div class="flex justify-end gap-1">
                                    @for ($i = 5; $i >= 1; $i--)
                                        <input type="radio" id="author-star-{{ $i }}" name="rating" value="{{ $i }}" class="hidden peer" />
                                        <label for="author-star-{{ $i }}" class="cursor-pointer">
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

                                <!-- الأزرار -->
                                <div class="mt-4 flex justify-start gap-2">
                                    <button type="submit" class="bg-[#1B3764] text-white p-2 rounded-lg">إرسال</button>
                                    <button type="button" id="close-author-rating" class="text-[#1B3764] border border-[#1B3764] p-2 rounded-lg">إغلاق</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            // زر التقييم
                            const ratingBtn = document.getElementById('author-rating-btn');

                            // المودال اللي فيه النجوم
                            const ratingBox = document.getElementById('author-rating-box');

                            // زر الإغلاق داخل المودال
                            const closeBtn = document.getElementById('close-author-rating');

                            // لما يضغط على زر التقييم
                            ratingBtn.addEventListener('click', function () {
                                ratingBox.classList.remove('hidden');
                            });

                            // لما يضغط على زر الإغلاق
                            closeBtn.addEventListener('click', function () {
                                ratingBox.classList.add('hidden');
                            });
                        });
                    </script>

</div>
                </div>
    
                <!-- Author Image - Fixed for circular display -->
                <div class="md:flex md:items-center">
                    <div class="w-24 h-24 md:w-32 md:h-32 overflow-hidden rounded-full">
                        <img src="https://images.pexels.com/photos/694740/pexels-photo-694740.jpeg?w=300&h=300&auto=compress&cs=tinysrgb" 
                             class="w-full h-full object-cover" 
                             alt="علاء الحلبي" />
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="max-w-4xl mx-auto bg-white rounded-lg overflow-hidden ">
        @if($user->books->isEmpty())
            <p class="text-gray-600 flex justify-center">{{ __('messages.no books') }}</p>
        @else
            <div class="grid grid-cols-4 gap-4 justify-items-center ">
                @foreach ($user->books as $book)
                    <x-book-card :book="$book" />
                @endforeach
            </div>
        @endif
    </div>
    
    
          
    </div>
</x-app-layout>