<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <img src="{{asset('storage/logo.png')}}"/>
        </x-slot>    

        <!-- Validation Errors -->
        <x-auth-validation-errors  :errors="$errors" />

        <form method="POST" class="form" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form__group">
                <x-label for="name" :value="__('Name')" />

                <x-input id="name"  type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="form__group">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email"  type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="form__group" >
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" 
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="form__group">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" 
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="form__group" >
                <button type="submit" class="btn btn-auth" >
                    {{ __('Register') }}
                </button>
            </div>

            <div class="form__links">
                <a  href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
