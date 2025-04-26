<div class="max-w-4xl mx-auto mt-14 p-10 bg-[#1B3764] rounded-lg relative overflow-hidden shadow-2xl">

    <div class="relative z-10 flex flex-col items-center text-center">
      <div class="grid grid-cols-2 gap-4">
        <!-- Heading -->
        
        <!-- Search Box -->
        <div class="w-full rounded-lg shadow-sm p-1">
          <div class="flex items-center">
            <!-- Search Input -->
            <div class="flex-grow">
              <div class="relative">
                <input 
                  type="text" 
                  placeholder=" {{ __('messages.email address') }}" 
                  class=" w-72 py-6 px-   focus:outline-none text-lg "
                >
                <!-- Search Icon -->
                <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                  <div class="ml-2">
                    <a href="/login" class="px-1 py-3 bg-amber-400 hover:bg-amber-500 transition text-gray-800 font-medium ">
                      {{ __('messages.login') }}
                    </a>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
  
        <!-- Heading Text -->
        <div>
          <h1 class="text-2xl md:text-3xl font-bold text-white mb-10  w-full">
            {{ __('messages.join us') }}      
            {{ __('messages.publish') }}      
           </h1>
        </div>
      </div>
    </div>
  
  </div>
  
  
  <footer class="text-whit py-8">
    <div class="container mx-auto px-6">
        <div class="flex justify-between items-center mb-4">
            <div class="flex space-x-6">
                <!-- الأيقونات كما هي -->
                <a href="#" class="text-2xl hover:text-blue-400">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22.806 4.76818C23.5252 5.5016 23.76 7.16708 23.76 7.16708C23.76 7.16708 24 9.12336 24 11.0789V12.9128C24 14.8691 23.76 16.8246 23.76 16.8246C23.76 16.8246 23.5252 18.4901 22.806 19.2235C21.9837 20.0911 21.0719 20.1808 20.5565 20.2314C20.4998 20.237 20.4479 20.2421 20.4015 20.2477C17.043 20.4924 12 20.5 12 20.5C12 20.5 5.76 20.4426 3.84 20.2568C3.74903 20.2397 3.63876 20.2264 3.51388 20.2113C2.9057 20.1378 1.95113 20.0225 1.19325 19.2235C0.474 18.4901 0.24 16.8246 0.24 16.8246C0.24 16.8246 0 14.8691 0 12.9128V11.0789C0 9.12336 0.24 7.16708 0.24 7.16708C0.24 7.16708 0.474 5.5016 1.19325 4.76818C2.0174 3.89935 2.93006 3.81067 3.44548 3.7606C3.50136 3.75517 3.55258 3.75019 3.5985 3.74472C6.957 3.5 11.9948 3.5 11.9948 3.5H12.0052C12.0052 3.5 17.043 3.5 20.4015 3.74472C20.4474 3.7502 20.4987 3.75518 20.5546 3.76062C21.0696 3.8107 21.9827 3.89949 22.806 4.76818ZM9.52125 8.34387L9.522 15.135L16.0057 11.7511L9.52125 8.34387Z" fill="#0A142F"/>
                    </svg>
                </a>
                <a href="#" class="text-2xl hover:text-blue-400">
                    <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M23.9879 5.35527C23.8835 7.72196 22.2494 10.9572 19.0969 15.0624C15.8344 19.3551 13.07 21.5 10.8107 21.5C9.4137 21.5 8.22975 20.195 7.26312 17.5765C6.61541 15.174 5.97193 12.7716 5.32563 10.3763C4.60595 7.7563 3.83547 6.44703 3.01137 6.44703C2.83215 6.44703 2.20702 6.82908 1.12891 7.59461L0 6.11936C1.18253 5.06766 2.34813 4.01166 3.49821 2.95852C5.07304 1.57628 6.25698 0.850823 7.04722 0.774986C8.90992 0.591832 10.0586 1.88393 10.4918 4.64698C10.9532 7.63038 11.2778 9.48482 11.457 10.2117C11.9961 12.6843 12.5859 13.9177 13.2322 13.9177C13.7332 13.9177 14.4867 13.1193 15.4915 11.521C16.4962 9.91981 17.031 8.70355 17.1044 7.86505C17.2483 6.48281 16.7107 5.79598 15.4915 5.79598C14.9171 5.79598 14.3245 5.91904 13.7163 6.1766C14.9016 2.28601 17.1594 0.394369 20.4954 0.504548C22.9663 0.574662 24.1333 2.19443 23.9879 5.35527Z" fill="#0A142F"/>
                    </svg>
                </a>         
                <a href="#" class="text-2xl hover:text-blue-400">
                    <svg width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24 2.36764C23.1182 2.76923 22.1687 3.04081 21.1727 3.16215C22.1898 2.5381 22.9702 1.54857 23.3379 0.369808C22.3856 0.947635 21.3333 1.368 20.2092 1.59335C19.3133 0.612495 18.0328 0 16.6156 0C13.8982 0 11.6936 2.26074 11.6936 5.04875C11.6936 5.44457 11.7359 5.82882 11.8204 6.19863C7.72812 5.98772 4.10072 3.97978 1.67072 0.921633C1.2467 1.66992 1.0044 2.5381 1.0044 3.46262C1.0044 5.21343 1.87357 6.75912 3.19493 7.66486C2.38915 7.6403 1.62846 7.41062 0.96355 7.03503V7.09715C0.96355 9.54424 2.66103 11.5854 4.91495 12.0477C4.5022 12.1661 4.06691 12.2254 3.61754 12.2254C3.30058 12.2254 2.99067 12.195 2.69061 12.1358C3.31749 14.1408 5.13471 15.6013 7.29002 15.6403C5.60521 16.9953 3.48089 17.8028 1.17485 17.8028C0.777601 17.8028 0.384575 17.7797 0 17.7335C2.17926 19.1636 4.76845 20 7.54781 20C16.6057 20 21.5573 12.3077 21.5573 5.63525C21.5573 5.41567 21.5531 5.1961 21.5446 4.98086C22.5068 4.26869 23.3421 3.38028 24 2.36764Z" fill="#0A142F"/>
                    </svg>
                </a>            
                <a href="#" class="text-2xl hover:text-blue-400">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.8192 24H1.32462C0.592836 24 0 23.4068 0 22.6753V1.32461C0 0.592925 0.592929 0 1.32462 0H22.6755C23.407 0 24 0.592925 24 1.32461V22.6753C24 23.4069 23.4069 24 22.6755 24H16.5597V14.7059H19.6793L20.1464 11.0838H16.5597V8.77132C16.5597 7.72264 16.8509 7.00801 18.3546 7.00801L20.2727 7.00717V3.76755C19.9409 3.7234 18.8024 3.62478 17.4778 3.62478C14.7124 3.62478 12.8192 5.31276 12.8192 8.4126V11.0838H9.69156V14.7059H12.8192V24Z" fill="#0A142F"/>
                    </svg>
                </a>
            </div>

            <!-- نقل الروابط إلى أقصى اليمين -->
            <div class="flex space-x-6 ml-auto">
                <a href="#" class="hover:text-blue-400">{{__('messages.categories')}}</a>
                <a href="#" class="hover:text-blue-400"> {{__('messages.authors')}}</a>
                <a href="#" class="hover:text-blue-400">{{__('messages.most rated')}} </a>
                <a href="#" class="hover:text-blue-400"> {{__('messages.about us')}}</a>
            </div>
        </div>

        <!-- القسم الثاني: روابط شروط الخدمة وسياسة الخصوصية -->
        <div class="border-t-2 border-gray-300 mt-2 mb-8  w-1/2 mx-auto"></div>    
        <div class="flex justify-between items-center mb-4 mt-6 space-x-10">
            <div>
                <a href=""> {{ __('messages.Terms of Service') }}</a>
                <a href=""> {{ __('messages.Privacy Policy') }}</a>
            </div>
            <p class="text-center text-sm">  {{ __('messages.rights') }}  </p>
        </div>
    </div>
    
</footer>