<x-dashboard-layout>
    <x-slot name="breadcrumb">
        {{ Breadcrumbs::render('admin-categories.create') }}
    </x-slot>

    <h3>
        Category's details
    </h3>
    
    <div class="dashboard-card details-container">
        <form method="POST" action="{{ route('admin-categories.store')}}">
            @csrf
            <div class="form__group">
                <label class="label">Name</label>
                <input type="text" name="name" value="{{ old('name') }}"/>
            </div>
            <div class="form__group form__group--space-between-h">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>   
</x-dashboard-layout>
