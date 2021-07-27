@extends('components/layout')

@section('content')

<section class="px-6 py-8">
   <main class="max-w-lg mx-auto mt-10 bg-gray-100 border-gray-200 p-6 rounded-xl">
       <h1 class="text-center font-bold text-xl">Login !</h1>

       <form method="post" action="/login" class="mt-10">
        @csrf

         <div class="mb-6">
             
             <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
               email
             </label>   

             <input class="border border-gray-400 p-2 w-full"
              type="text"
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
             value="Login"
             >
        </div> 


        </form>
   </main>
</section>    






@endsection