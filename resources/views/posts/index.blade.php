@extends('layouts.app')
@section('content')

<div class="m-auto w-4/5 py-24 ">
    <div class="text-center">

        <h1 class="text-5xl uppercase bold">
            
            MY INDEX POSTS
        </h1>
    </div>
   
    @if(Auth::user())
        <div class="pt-10">
            <a href="posts/create"
            class="border-b-2 italic text-gray-500">
            Add new post 
            </a>
        </div>
        @else
        <p class="py-12">Please login to create post</p>
    @endif
        

        <div class="w-5/6 py-10">
            @foreach($posts as $post)
           
             <div class="m-auto">
                 @if (isset(Auth::user()->id) && Auth::user()->id==$post->user_id)
                     
                
                <div class="float-right">
                    <a class="border-b-2 pb-2 border-dotted italic" href="/posts/{{$post->id  }}/edit">
                        Edit &rarr;
                    </a>
                    <form action="/posts/{{$post->id  }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="border-b-2 vorder-dotted italic">
                            Delete &rarr;
                        </button>

                    </form>
                </div>
                @endif

                <span class="uppercase text-blue-500 font-bold text-xs italic">
                    Founded:  {{ $post->founded }}
                </span>
                <img src="{{ asset('images/'.$post->image) }}"
                class="w-1/4 w-40 mb-4 shadow-xl" alt="">
                <h2 class="text-gray-700 text-5xl hover:text-gray-500">
                   <a href="/posts/{{ $post->id }}">
                    {{ $post->title }}
                   </a>
                </h2>
                <p class="text-lg text-gray-700 py-6">

                    {{ $post->description }}
                </p>
             </div>
             @endforeach
        </div>
    </div>
            
            
        
@endsection