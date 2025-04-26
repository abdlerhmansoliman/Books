<x-app-layout>  
    <x-page-header subpage="{{ $category->name}}" />
      <div class="container ">
  
        <div class="grid grid-cols-5 gap-4 ">
    
          @foreach ( $category->books as $book )
          <x-book-card :book="$book" />
            
          @endforeach
  
  
        </div>
      </div>
  </x-app-layout>