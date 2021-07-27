

<div x-data="{show:false}" @click.away="show = false">
    <div @click="{show =! show}">
        <button 
        class="py-2 pl-3 pr-9 text-sm w-full font-semibold lg:inline-flex text-left">
      
        {{isset($currentcategory) ? ucwords($currentcategory->name) : 'Category'}}

        <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
             height="22" viewBox="0 0 22 22">
            <g fill="none" fill-rule="evenodd">
                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                </path>
                <path fill="#222"
                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
            </g>
        </svg>

        </button>
    </div>


    <div x-show="show " class="py-2 absolute bg-gray-100  mt-2 rounded-xl w-32 z-500 md:drop-shadow-xl overflow-auto max-h-52" style="display:none;">
        <a href="/" class="block text-left px-3 text-sm leading-6 hover:bg-blue-500 hover:text-white focus:text-white">All</a>
        @php
           if(request('search'))
           {
            $search="&search=".request('search');
           }
           else {
            $search="";
            
           }
           
        @endphp
        @foreach ($categories as $item)
        <a href="/?category={{$item->slug}}&{{http_build_query(request()->except('category','page'))}}"
         class="block text-left px-3 text-sm leading-6 hover:bg-blue-500 hover:text-white focus:text-white
                {{ isset($currentcategory) && $currentcategory->id===$item->id ? 'bg-blue-500 text-white' : ''  }}"
         >{{$item->name}}</a>
        @endforeach
    </div>


</div>

