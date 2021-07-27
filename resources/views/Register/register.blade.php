@extends('components/layout')

@section('content')

<section class="px-6 py-8">
   <main class="max-w-lg mx-auto mt-10 bg-gray-100 border-gray-200 p-6 rounded-xl">
       <h1 class="text-center font-bold text-xl">Register !</h1>

       <form method="post" action="" class="mt-10">
        @csrf
        <div class="mb-6">
             
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
              name
            </label>   

            <input class="border border-gray-400 p-2 w-full"
             type="text"
             name="name"
             id="name"
             value="{{old('name')}}"
             autocomplete="off"
             required
             
            >
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
        </div> 


         <div class="mb-6">
             
             <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
               username
             </label>   

             <input class="border border-gray-400 p-2 w-full"
              type="text"
              name="username"
              id="username"
              value="{{old('username')}}"
              required
              autocomplete="off"
             >
            @error('username')
             <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
         </div>   


         <div class="mb-6">
             
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
              Email
            </label>   

            <input class="border border-gray-400 p-2 w-full"
             type="email"
             name="email"
             id="email"
             value="{{old('email')}}"
             required
             autocomplete="off"
            >
            @error('email')
             <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

        </div> 
         
        <div class="mb-6">
             
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
              Password
            </label>   

            <input class="border border-gray-400 p-2 w-full"
             type="password"
             name="password"
             id="password"
             required
             autocomplete="off"
            >
            @error('password')
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