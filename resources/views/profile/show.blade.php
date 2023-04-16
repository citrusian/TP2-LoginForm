<x-app-layout>
    @include('layouts/profilehead')
    {{--    <x-slot name="header">--}}
    {{--        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">--}}
    {{--            {{ __('Profile') }}--}}
    {{--        </h2>--}}
    {{--    </x-slot>--}}

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @livewire('profile.update-profile-information-form')

            <x-section-border />
        </div>
    </div>
</x-app-layout>
