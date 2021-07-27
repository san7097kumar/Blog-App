@extends('components/layout')

@section('content')
    
 {{-- <article class="container">
   <h1>  {{$post->title}}</h1>
   <p>By <a href="">{{$post->author->name}}</a> in <a href="#">{{$post->category->name}}</a></p>
   <div>
    {!! $post->body !!}
   </div>
 </article> --}}

 
         <main class="max-w-6xl mx-auto mt-5 lg:mt-4 space-y-6">
             <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                 <div class="col-span-12  lg:pt-14 mb-10">
                     <img src="{{ $post->image!="" ? url($post->image) :  url('storage/images/posts/1627116393.jpg')}}" alt="" class="rounded-xl">
 
                     <p class="mt-4 lg:text-left block text-gray-400 text-sm">
                         Published <time>{{$post->created_at->diffForHumans()}}</time>
                     </p>

                     <p class="mt-4 lg:text-right block text-gray-400 text-sm">
                         <input type="hidden" id="post_id" value="{{$post->id}}" />
                        &nbsp;<span id="like_counts"></span> Likes &nbsp; <i id="like_user" style="cursor: pointer" class="far fa-heart fa-1x"></i> 
                        &nbsp; Views &nbsp; <i class="far fa-eye fa-1x"></i>
                    </p>

                    
 
                     <div class="flex items-center  text-sm mt-4">
                         <img src="/images/lary-avatar.svg" alt="Lary avatar">
                         <div class="ml-3 text-left">
                             <h5 class="font-bold">{{$post->author->name}}</h5>
                             <h6>Mascot at Laracasts</h6>
                         </div>
                     </div>
                 </div>
 
                 <div class="col-span-12">
                     <div class="hidden lg:flex justify-between mb-6">
                         <a href="/"
                             class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                             <svg wdth="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                 <g fill="none" fill-rule="evenodd">
                                     <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                     </path>
                                     <path class="fill-current"
                                         d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                     </path>
                                 </g>
                             </svg>
 
                             Back to Posts
                         </a>
 
                       <x-category-button :category="$post->category"/>
                           
                     </div>
 
                     <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                         {{$post->title}}
                     </h1>
 
                     <div class="space-y-4 lg:text-lg leading-loose">
                         {!!$post->body!!}
                     </div>
                 </div>
                 {{-- //post comments --}}
                 
                  <section class="col-span-8 col-end-5 mt-10 space-y-6">
                       @include('postblogs._comment-form')
                      @foreach($post->comments as $comment)
                         <x-post-comment :comment="$comment"/>
                       @endforeach  
                  </section>
             </article>
         </main>

<script >

var post_id = $("#post_id").val();
get_likes();

function get_likes()
{
    $.ajax({
    url:"/user_get_post_like",
    method:"GET",
    data: {
        post_id:post_id
      },
    success:function(data)
    {   
        togglelikes(data)
    }
    
            });
}  



$('#like_user').click(function(e){
   e.preventDefault();

   /*Ajax Request Header setup*/
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    /* Submit form data using ajax*/
    $.ajax({
      url: "/user_post_like",
      method: 'post',
      data: {
        post_id:post_id
      },
      success: function(data){
        togglelikes(data)
             }

      });

    });

function togglelikes(data)
{
    $("#like_counts").html(data.post_count)

    if(data.like==1)
    {
        $('#like_user').removeClass('far').addClass('fas');
        $('#like_user').css("color", "rgba(59, 130, 246, 0.8)");
        $("#like_user").fadeIn("slow");
    }
    else
    {
        $('#like_user').removeClass('fas').addClass('far'); 
    }
}


</script>





@endsection