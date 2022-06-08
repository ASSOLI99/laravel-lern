@props(['listing'])

@php

$tags= explode(' ',$listing['tags'])

@endphp
<div class="bg-gray-700 rounded p-6 text-gray-200">
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$listing->logo ? asset('storage/' . $listing->logo) :asset('/images/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl  mb-5">
                <a class=" bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="/listings/{{$listing['id']}}">Watch Now</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$listing['title']}} <small class="text-gray-300">{{$listing['company']}}</small></div>
            <ul class="flex">
                @foreach ($tags as $tag)
                    
                
                <li
                    class="flex items-center justify-center bg-black text-gray-300 rounded-xl py-1 px-3 mr-2 text-xs"
                >
                    <a href="listings/?tag={{$tag}}">{{$tag}}</a>
                </li>
                @endforeach
            </ul>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> 
                {{$listing['location']}}
            </div>
        </div>
    </div>
</div>