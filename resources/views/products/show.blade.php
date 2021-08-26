@extends('products.master')
    @section('title')
        {{__('product.show')}}
    @stop
    @section('content')


        <article>
            <!-- Name -->

           <header>
               <h1>
                   <strong>
                       {{$product->name}}
                   </strong>
               </h1>
               <hr>
           </header>

            <!-- ID -->
            <strong class="text-sm">ID:</strong>
            <p>
                {{$product->id}}
            </p>

            <!-- Unique hash code -->
            <strong class="text-sm text">{{__('product.unique_hash')}}:</strong>
            <p>
                {{$product->unique_hash}}
            </p>

            <!-- Description -->
            <strong class="text-sm">{{__('product.desc')}}</strong>
            <p>
                {{$product->description}}
            </p>

            <!-- created at -->
            <strong class="text-sm">{{__('product.created_at')}}</strong>
            <p>
                {{$product->created_at}}
            </p>

            <!-- updated at -->
            <strong class="text-sm">{{__('product.updated_at')}}</strong>
            <p>
                {{$product->updated_at}}
            </p>

            <!-- Categories list -->
            <strong class="text-sm">{{__('product.categories')}}</strong>
            <p>
                @forelse($product->categories as $category)
                    {{$category['name']}} |
                @empty
                    {{__('product.empty_categories')}}
                @endforelse
            </p>

            <!-- Edit button -->
            <div class="flex items-center justify-end mt-4">

                <a href="{{route('product.edit', $product->unique_hash)}}">
                    <x-button class="ml-4 bg-blue-200">
                      {{ __('product.edit') }}
                    </x-button>
               </a>
            </div>

            <!-- Delete button -->
            <div class="flex items-center justify-end mt-4">

                <form method="POST" action="{{ route('product.destroy', $product->unique_hash) }}">
                    @csrf
                    {{method_field('DELETE')}}
                <x-button class="ml-4 bg-blue-200">
                    {{ __('product.destroy') }}
                </x-button>
                </form>
            </div>

        </article>

    @stop
