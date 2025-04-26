<x-app-layout>  
  <x-page-header subpage="{{ __('messages.best books') }}" />
    <div class="container ">

      <div class="grid grid-cols-5 gap-4 ">
  
        @foreach ($topRatedBooks as $book )
        <x-book-card :book="$book" />
          
        @endforeach


      </div>
    </div>
</x-app-layout>