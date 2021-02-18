@extends('layouts.dashboard')


@section('breadcrumbs')
    {{ Breadcrumbs::render('admin-categories.create') }}
@endsection

@section('content')
    <div class="dashboard-card details-container">
        <form method="POST" class="form" action="{{ route('admin-categories.store')}}">
            @csrf

            <div class="form__group">
                <label class="label">Name</label>
                <input type="text" name="name" class="{{ $errors->has('name') ? 'validation--error' : '' }}" value="{{ old('name') }}"/>
                @error('name')
                    <div class="form__notification form__notification--error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form__group form__group--space-between-h">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>   
@endsection

