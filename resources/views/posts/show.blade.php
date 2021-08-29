@extends('layouts.app')
@section('content')

<div class="m-auto w-4/5 py-24 ">
    <div class="text-center">
        <img src="{{ asset('images/'.$post->image) }}"
        class="w-8/12 w-40 mb-8 shadow-xl" alt="">
        <h1 class="text-5xl uppercase bold">
            
           {{ $post->title }} 
        </h1>

        <span class="uppercase text-blue-500 font-bold text-xs italic">
            Founded:  {{ $post->founded }}
        </span>
        
        <p class="text-lg text-gray-700 py-6">

            {{ $post->description }}
        </p>

        <table class="table-auto">
            <tr class="bg-blue-100">
                <th class="w-1/4 border-4 border-gray-500">
                    Model

                </th>
                <th class="w-1/4 border-4 border-gray-500">
                    Engines

                </th>
                <th class="w-1/4 border-4 border-gray-500">
                    Production Date

                </th>

            </tr>
            @forelse ($post->postmodels as $model)
            <tr>
                <td class="border-2 border-gray-500">
                    {{ $model->model_name }}
                </td>
                <td class="border-2 border-gray-500">
                   
                    @foreach ($post->engines as $engine)
                        @if($model->id ==$engine->model_id)
                        {{ $engine->engine_name}}
                        @endif
                   
                    @endforeach
                </td>
                <td class="border-2 border-gray-500">
                    {{ date('d-m-y',strtotime($post->productionDate->created_at)) }}

                </td>
            </tr>
                
            @empty
                <p>
                    No post model found!
                </p>
            @endforelse


        </table>
        <p class="text-left">
            <br>
            Product type<br>
            @forelse ($post->products as $product)
                {{ $product->name }}
                
            @empty
            <p>No car product description</p>
                
            @endforelse
            
        </p>
       
    </div>

    
</div>
        
        