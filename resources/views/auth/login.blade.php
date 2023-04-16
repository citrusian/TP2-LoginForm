{{--<script src="https://www.google.com/recaptcha/api.js"></script>--}}
{{--<script>--}}
{{--    function onSubmit(token) {--}}
{{--        document.getElementById("capcha").submit();--}}
{{--    }--}}
{{--</script>--}}
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="form-group row">
                <div class="col-md-4"></div>
                <div class="col-md-6">
                    {!! NoCaptcha::display() !!}
                    {!! NoCaptcha::renderJs() !!}
                    @error('g-recaptcha-response')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
{{--            <form action="?" method="POST" id="capcha">--}}
{{--                <div class="g-recaptcha" data-sitekey="6LfG_JElAAAAAEVxjZ0Q2pgQR7esg9DqdghHBXXp"></div>--}}
{{--                <br/>--}}
{{--                <input type="submit" value="{{ __('Log in') }}">--}}
{{--            </form>--}}
        </form>
        <script>
            var exist = '{{Session::has('blocked')}}';
            if(exist){
                alert("Too many Login attempt, disabled for 30s");
            }
        </script>


    </x-authentication-card>
</x-guest-layout>
