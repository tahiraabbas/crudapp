@extends('layouts.app')
@section('content')
<div class="m-auto">
    <div class="text-center">
       <h1 class="text-5xl uppercase bold">
       </br>  </br>
        Create POST
    </h1>
    </div>
</div>
<div class="flex justify-center pt-20">
    <form action="/posts" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="block">
            <input type="file"
            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
            name="image">

            <input type="text"
            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
            name="title"
            placeholder="Post brand name">
            <input type="text"
            class="block shadow-5xl mb-10  p-2 w-80 italic placeholder-gray-400"
            name="founded"
            placeholder="founded">
            <input type="text"
            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
            name="description"
            placeholder="description">
            <button type="submit" class="bg-green-500 black mb-10 p-2 w-80 shadow-5xl uppercase font-bold">
                Submit
            </button>

        </div>
    </form>
  
</div>
@if ($errors->any())
<div class="w-4/8 m-auto text-center">
    @foreach ($errors->all() as $error )
        <li class="text-red-500 list-none">
            {{ $error }}
        </li>
    @endforeach
</div>
    
@endif
@endsection