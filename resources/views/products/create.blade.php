@extends('products.master')
    @section('content')

        <form method="POST" action="{{ route('product.store') }}">
        @csrf

        <!-- Name -->
            <div>
                <x-label for="name" value="{{__('product.name')}}" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="description" value="{{__('product.desc')}}" />

                <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
            </div>

            <div class="mt-4">
             <x-label for="description" value="{{__('product.categories')}}" />
                @forelse($categories as $category)
                    <x-input id="description" class="mt-1 ml-3" type="checkbox" name="categories[]" value="{{$category->id}}"/>{{$category->name}}
                @empty
                    {{__('product.empty_categories')}}
                @endforelse
            </div>
            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('product.save') }}
                </x-button>
            </div>
        </form>
    @stop
