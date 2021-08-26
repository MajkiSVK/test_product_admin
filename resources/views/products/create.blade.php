@extends('products.master')
    @section('content')

        <form method="POST" action="{{ route('product.store') }}">
        @csrf

        <!-- Name -->
            <div>
                <x-label for="name" value="{{trans('product.name')}}" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="description" value="{{trans('product.desc')}}" />

                <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
            </div>



            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __(trans('product.save')) }}
                </x-button>
            </div>
        </form>
    @stop
