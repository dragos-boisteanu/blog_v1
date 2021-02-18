@extends('layouts.dashboard')


@section('breadcrumb')
    {{ Breadcrumbs::render('admin-users.edit', $user) }}
@endsection


@section('content')

    <h3>
        User's details
    </h3>
    
    <div class="dashboard-card details-container">
        <form method="POST" class="form" action="{{ route('admin-users.update', ['id'=>$user->id]) }}">
            @csrf
            @method('put')
            <div class="form__group">
                <label class="label">Name</label>
                <input type="text" name="name" class="{{ $errors->has('name') ? 'validation--error' : '' }}" value="{{ $user->name }}"/>
                @error('name')
                    <div class="form__notification form__notification--error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form__group">
                <label class="label">Email</label>
                <input type="text" name="email" class="{{ $errors->has('email') ? 'validation--error' : '' }}" value="{{ $user->email }}"/>
                @error('email')
                    <div class="form__notification form__notification--error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form__group">
                <label class="label">Role</label>
                <select name="role_id">
                    @foreach($roles as $role)
                        <option value="{{ $role->id}}" {{ $role->id === $user->role_id ? 'selected' : ''}}>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form__group form__group--space-between-h">
                <button type="button" id="delete-btn" class="btn btn-danger">Delete</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <form id="delete-form" method="POST" action="{{ route('admin-users.delete', ['id'=>$user->id])}}">
            @csrf
            @method('delete')
        </form>
    </div>   

@endsection

@push('scrips')
    <script>
        const deleteBtn = document.querySelector('#delete-btn');
        const deleteForm = document.querySelector('#delete-form');

        deleteBtn.addEventListener('click', function(e) {
            e.preventDefault();

            deleteForm.submit();
        })
    </script>
@endpush

