<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <img src="{{asset('storage/logo.png')}}"/>
        </x-slot>

        <form method="POST" class="form" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form__group">
                <x-label for="email" class="label" value="Email"/>
                <x-input id="email" class="{{ $errors->has('email') ? 'validation--error' : ''}}" type="text" name="email" value="{{old('email')}}" autofocus />
                @error('email')
                    <div class="form__notification form__notification--error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="form__group">
                <x-label for="password" value="Password" />
                <x-input id="password" class="{{ $errors->has('password') ? 'validation--error' : ''}}" type="password" name="password" />
                @error('password')
                    <div class="form__notification form__notification--error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember Me -->
            <div >
                <label for="remember_me" >
                    <input id="remember_me" type="checkbox"  name="remember">
                    <span >{{ __('Remember me') }}</span>
                </label>
            </div>

            <button type="submit" class="btn btn-auth">
                Login
            </button>

            <div class="form__links">
                @if (Route::has('password.request'))
                    <a  href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                
                <a href="{{ route('register') }}">
                    Not a member ? Join now !
                </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
