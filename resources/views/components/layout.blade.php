<!doctype html>

<title>Laravel From Scratch Blog</title>

<meta name="csrf-token" content="{{ csrf_token() }}">

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script src="https://kit.fontawesome.com/a11c3ec0b6.js" crossorigin="anonymous"></script>

<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

<link rel="stylesheet" href="{{asset('css/dropdown.css')}}">
<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center fw">
                @auth
                   {{-- <span class="uppercase"> Welcome ,</span> --}}
                   <form action="/logout" method="post" class="text-xs font-bold text-blue-500 ml-6">
                     @csrf
                      <button type="submit">Logout</button>
                   </form>

                   <div class="dropdown pl-4">
                    <button class="dropbtn uppercase"> <span class="d-flex"> {{auth()->user()->name}}
                       </span>
                    </button>
                    <div class="dropdown-content">
                      <a href="/userprofile">Profile</a>
                      <a href="/add_post">Add post</a>
                      <a href="/user_posts">your posts</a>
                    </div>

                  </div>

                 @else 
                 <a href="/register" class="text-xs font-bold ml-2 uppercase">Register</a>
                 <a href="/login" class="text-xs font-bold ml-2 uppercase">Login</a>
                   
                @endauth
               
              
                <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

@yield('content')

        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div  class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form id="newsletter" method="POST" action="newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" name="email" type="email" placeholder="Your email address"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">

                                   @error('email')
                                   <span class="text-xs text-red-500">{{ $message }}</span>
                               @enderror
                        </div>

                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>

    @if(session()->has('success'))
       <div class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
           <p>{{session()->get('success')}}</p>
       </div>    
    @endif
</body>
