@extends('products.master')
    @section('content')

        <form method="POST" action="{{ route('product.update', $product->unique_hash) }}">
        {{method_field('PATCH')}}
        @csrf
        <!-- Name -->
            <div>
                <x-label for="name" value="{{__('product.name')}}" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{old('name', $product->name)}}" required autofocus />
            </div>

            <!-- ID -->
            <div class="mt-4">
                <x-label for="id" value="ID" />

                <x-input id="ID" class="block mt-1 w-full bg-gray-300" type="text" name="description" value="{{$product->id}}" disabled />
            </div>

            <!-- Unique hash code -->
            <div class="mt-4">
                <x-label for="unique_hash" value="{{__('product.unique_hash')}}" />

                <x-input id="unique_hash" class="block mt-1 w-full bg-gray-300" type="text" name="description" value="{{$product->unique_hash}}" disabled />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-label for="description" value="{{__('product.desc')}}" />

                <x-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{old('description', $product->description)}}" required />
            </div>

            <!-- categories list -->
            <div class="mt-4">
                <x-label for="categories" value="{{trans('product.categories')}}" />

                @forelse($categories as $category)

                @if(in_array($category['id'], $product_categories))
                        <x-input id="categories" class="mt-1 ml-3" type="checkbox" name="categories[]" value="{{$category['id']}}" checked />{{$category['name']}}
                    @else
                        <x-input id="categories" class="mt-1 ml-3" type="checkbox" name="categories[]" value="{{$category['id']}}" />{{$category['name']}}
                    @endif
                @empty
                    {{__('product.empty_categories')}}
                @endforelse


            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('product.edit') }}
                </x-button>
            </div>
        </form>
    @stop
