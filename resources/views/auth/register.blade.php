<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <img src="{{asset('storage/logo.png')}}"/>
        </x-slot>    

        <form method="POST" class="form" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form__group">
                <x-label for="name" :value="__('Name')" />
                <x-input id="name"  class="{{ $errors->has('name') ? 'validation--error' : ''}}" type="text" name="name" :value="old('name')" autofocus />
                @error('name')
                    <div class="form__notification form__notification--error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="form__group">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="{{ $errors->has('email') ? 'validation--error' : ''}}" type="text" name="email" :value="old('email')" />
                @error('email')
                    <div class="form__notification form__notification--error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="form__group" >
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="{{ $errors->has('password') ? 'validation--error' : ''}}" type="password" name="password" autocomplete="new-password" />
                @error('password')
                    <div class="form__notification form__notification--error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="form__group">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" class="{{ $errors->has('password_confirmation') ? 'validation--error' : ''}}" type="password" name="password_confirmation"/>
                @error('password_confirmation')
                    <div class="form__notification form__notification--error">{{ $message }}</div>
                @enderror
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
