@extends('layouts.dashboard')

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin-categories.edit', $category) }}
@endsection

@section('content')
    <div class="dashboard-card details-container">
        <form method="POST" class="form" action="{{ route('admin-categories.update', ['id'=>$category->id]) }}">
            @csrf
            @method('put')
            <div class="form__group">
                <label class="label">Name</label>
                <input type="text" name="name" class="{{ $errors->has('name') ? 'validation--error' : '' }}" value="{{ $category->name }}"/>
                @error('name')
                    <div class="form__notification form__notification--error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form__group form__group--space-between-h">
                <button type="button" id="delete-btn" class="btn btn-danger">Delete</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <form id="delete-form" method="POST" action="{{ route('admin-categories.delete', ['id'=>$category->id])}}">
            @csrf
            @method('delete')
        </form>
    </div>   
@endsection

@push('scripts')
    <script>
        const deleteBtn = document.querySelector('#delete-btn');
        const deleteForm = document.querySelector('#delete-form');

        deleteBtn.addEventListener('click', function(e) {
            e.preventDefault();

            deleteForm.submit();
        })
    </script>
@endpush
