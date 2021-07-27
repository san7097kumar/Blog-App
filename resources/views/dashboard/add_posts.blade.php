
@extends('components/layout')

@section('content')
<link rel="stylesheet" href="{{asset('css/img_upload.css')}}">
<script src="{{asset('js/img_upload_js.js')}}"></script>

<section class="px-4 py-8">
    <main class="max-w-lg mx-auto mt-10 bg-gray-100 border-gray-200 p-6 rounded-xl">
        <h1 class="text-center font-bold text-xl">Post !</h1>
 
        <form method="post" action="/add_post_action" class="mt-10" enctype="multipart/form-data">
         @csrf
         <div class="mb-6">
              
             <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
               Title
             </label>   
 
             <input class="border border-gray-400 p-2 w-full"
              type="text"
              name="title"
              id="title"
              value="{{old('title')}}"
              autocomplete="off"
              required
              
             >
             @error('title')
             <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
         </div> 
 
 
          <div class="mb-6">
              
              <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">
                Slug
              </label>   
 
              <input class="border border-gray-400 p-2 w-full"
               type="text"
               name="slug"
               id="slug"
               value="{{old('slug')}}"
               required
               autocomplete="off"
              >
             @error('slug')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
             @enderror
          </div>   


          <div class="mb-6">
              
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
              Excerpt
            </label>   

            <input class="border border-gray-400 p-2 w-full"
             type="text"
             name="excerpt"
             id="excerpt"
             value="{{old('excerpt')}}"
             required
             autocomplete="off"
            >
           @error('excerpt')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
        </div> 
          
 
          <div class="mb-6">
              
             <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category">
               Category
             </label>   
 
             <select name="category" class="border border-gray-400 p-2 w-full" id="">
                @foreach ($categories as $item)
                 <option value="{{$item->id}}" {{$item->id==old('category') ? 'selected':''}}>{{$item->name}}</option>
                @endforeach
             </select> 
             @error('category')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
             @enderror
 
         </div> 
          
         <div class="mb-6">
              
             <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="Post">
               Body
             </label>   
 
             <textarea
             name="post"
             class="w-full text-sm focus:outline-none focus:ring"
             rows="8"
             placeholder="blog content"
             required> {{old('post')}}</textarea>
             @error('post')
             <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
         </div> 
      <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="image">
         Image
        </label>  
        <input type="file" class="" name="photo" >

        @error('photo')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
       @enderror
     </div>    
 
         <div class="mb-6">
             
 
             <input class="border border-gray-400 p-2 "
              type="submit"
              name="submit"
              id="submit"
              value="submit"
              >
         </div> 
 
 
         </form>
    </main>
 </section>    
 
 



@endsection