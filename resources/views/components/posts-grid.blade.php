@props(['posts'])
          {{-- post grid    --}}
          @if($posts->count())
          <x-post-featured-card :post="$posts[0]"/>

         @if($posts->count()>1)
         <div class="lg:grid lg:grid-cols-6">
             @foreach($posts->skip(1) as $post)
             <x-post-card :post="$post" class="{{$loop->iteration < 3 ? 'col-span-3' : 'col-span-2'}}"/>
             @endforeach 
         </div>
         @endif


         {{$posts->links()}}

         @else 
         <p>No post yet , not found any post</p>
         @endif
       {{-- post grid    --}}