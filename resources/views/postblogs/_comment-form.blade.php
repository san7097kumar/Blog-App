
                    @auth
                    <form method="POST" action="/posts/comments">
                        @csrf
            
                        <header class="flex items-center">
                            <img src="https://i.pravatar.cc/60?u={{auth()->id()}}"
                                 alt=""
                                 width="40"
                                 height="40"
                                 class="rounded-full">
            
                            <h2 class="ml-4">Want to participate?</h2>
                        </header>
            
                        <div class="mt-6">
                            <textarea
                                name="body"
                                class="w-full text-sm focus:outline-none focus:ring"
                                rows="5"
                                placeholder="Quick, thing of something to say!"
                                required></textarea>
                              <input type="hidden" name="post_id" value="{{$post->id}}">
                            @error('body')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
            
                        <x-submit-button>Post</x-submit-button>
                    </form> 
                    @else 
                    {{-- <a href="/register" class="text-xs font-bold ml-2 uppercase">Register</a> --}}
                    <a href="/login" class="text-xs font-bold ml-2 ">Login to leave comment !</a>
                  
                    @endauth