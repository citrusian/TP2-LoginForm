<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-slot name="header">
        <div>
{{--            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">--}}
{{--                {{ __('Profile') }}--}}
{{--            </h1>--}}
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <x-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-nav-link>
                <x-nav-link href="{{ route('profile.security') }}" :active="request()->routeIs('profile.security')">
                    {{ __('Security') }}
                </x-nav-link>

{{--                Disable, use mailpit--}}
{{--                <x-nav-link href="{{ route('password.reset') }}" :active="request()->routeIs('password.reset')">--}}
{{--                    {{ __('Reset') }}--}}
{{--                </x-nav-link>--}}
            </h1>
        </div>
    </x-slot>
    <body class="font-sans antialiased">
    </body>
</html>
