@extends('layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('account') }}
@endsection


@section('content')
    <form method="POST" class="form" action="{{ route('client-user.update')}}">
        @csrf
        @method('put')

        <div class="form__group">
            <label class="label">Name</label>
            <input type="text" name="name" value="{{ $user->name }}" disabled/>
        </div>

        <div class="form__group">
            <label class="label">Role</label>
            <input type="text" name="name" value="{{ $user->role->name }}" disabled/>
        </div>

        <div class="form__group">
            <label class="label">Email</label>
            <input type="text" name="email" class="{{ $errors->has('email') ? 'validation--error' : '' }}" value="{{ $user->email }}" autofocus/>
            @error('email')
                <div class="form__notification form__notification--error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form__group">
            <label class="label">Current password</label>
            <input type="password" name="current_password" class="{{ $errors->has('current_password') ? 'validation--error' : '' }}" autofocus/>
            @error('current_password')
                <div class="form__notification form__notification--error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form__group">
            <label class="label">New password</label>
            <input type="password" name="new_password" class="{{ $errors->has('new_password') ? 'validation--error' : '' }}" autofocus/>
            @error('new_password')
                <div class="form__notification form__notification--error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form__group">
            <label class="label">Confirm new password</label>
            <input type="password" name="new_password_confirmation" class="{{ $errors->has('new_password_confirmation') ? 'validation--error' : '' }}" autofocus/>
            @error('new_password_confirmation')
                <div class="form__notification form__notification--error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form__group form__group--space-between-h">
            @can('can-self-delete')
                <button type="button" id="delete-btn" class="btn btn-danger">Delete</button>
            @endcan
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @can('can-sefl-delete')
            <form id="delete-form" method="POST" action="{{ route('client-user.delete', ['id'=>$user->id])}}">
                @csrf
                @method('delete')
            </form>
        @endcan
    </form>
@endsection

@can('can-sefl-delete')
    @push('scripts')

        <script>
            const deleteButton = document.querySelector('#delete-btn');
            const deleteForm = document.querySelector('#delete-form');

            deleteButton.addEventListener('click', function(e) {
                e.preventDefault();
                deleteForm.submit();
            });

        </script>

    @endpush
@endcan