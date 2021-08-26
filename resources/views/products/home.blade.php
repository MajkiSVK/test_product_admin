@extends('products.master')
    @section('title')
        {{__('product.homepage')}}
    @stop
    @section('content')

        @forelse($products as $product)
            <a href ="{{route('product.show', $product->unique_hash)}}">
                <div class="p-3 hover:bg-gray-200 transition ease-in-out rounded">
					{{$product->name}}
                    <p class="content-center">
                        {{Str::limit($product->description, 130, ' ...')}}
                    </p>
                </div></a>
            <hr>
        @empty
            {{__('product.nothing')}}
        @endforelse

    @stop
