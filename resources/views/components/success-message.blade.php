@if (session('message'))
    <div>
        <div class="font-medium text-green-600">
            {{ __('validation.success_message_title') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-green-600">
            {{session('message')}}
        </ul>
    </div>
@endif
