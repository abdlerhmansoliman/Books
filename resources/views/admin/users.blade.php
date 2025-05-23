<x-dash-layout>
    <table class="table-fixed w-full m-8 text-sm text-left text-gray-700 border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="w-1/6 px-4 py-2">{{ __('messages.name') }}</th>
                <th class="w-1/6 px-4 py-2">{{ __('messages.role') }}</th>
                <th class="w-1/6 px-4 py-2">{{ __('messages.email') }}</th>
                <th class="w-1/6 px-4 py-2">{{ __('messages.status') }}</th>
                <th class="w-1/6 px-4 py-2">{{ __('messages.sign at') }}</th>
                <th class="w-1/6 px-4 py-2">{{ __('messages.rating') }}</th>
                <th class="w-1/6 px-4 py-2">{{ __('messages.control') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $users as $user )
            
            <tr class="border-t">
                <td class="px-4 py-2 flex items-center space-x-3">
                    <img src="{{ $user->profile_image }}" 
                    alt="صورة بروفايل" 
                    class="w-15 h-14 rounded-full object-cover shadow-md">    
                    <span>{{$user->name}} </span>
                </td>                               
                <td class="px-4 py-2">
                        {{-- {{dd($user->roles)}} --}}
                    @foreach($user->roles as $role)
                    {{ $role->role }} 
                @endforeach    
                </td>
                <td class="px-4 py-2 break-all">{{$user->email}} </td>
                <td class="px-4 py-2">
                    @foreach($user->statuse as $status)
                    {{ $status->name }} 
                @endforeach
                </td>
                <td class="px-4 py-2">{{$user->created_at}}</td>
                <td class="px-4 py-2">{{$user->average_rating ?? 0}} </td>
                <td class="px-4 py-2">
                    <div class="relative inline-block text-left" x-data="{ open: false }">
                        <div>
                            <button @click="open = !open" type="button"
                                class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50"
                                id="menu-button" aria-expanded="true" aria-haspopup="true">
                                Options
                                <svg class="-mr-1 size-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    
                        <!-- القائمة المنسدلة -->
                        <div x-show="open" 
                             @click.away="open = false"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5"
                             role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                             
                            <div class="py-1" role="none">
                                <a href="{{route('dashboard.edit', ['type' => 'user', 'id' => $user->id])}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Edit</a>
                                <form method="POST" action="{{route('dashboard.delete', ['type' => 'user', 'id' => $user->id])}} "onsubmit="return confirm('هل أنت متأكد من حذف هذا المستخدم؟');>
                                    @csrf
                                    @method('DELETE')
                                <button  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Delete</button>
                            </form>
                            </div>
                        </div>
                    </div>
                    
                  </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    

</x-dash-layout>