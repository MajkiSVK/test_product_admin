<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(trans('product.create_new')) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-guest-layout>



                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <x-success-message />

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

                    </x-guest-layout>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
