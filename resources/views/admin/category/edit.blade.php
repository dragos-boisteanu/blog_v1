<x-dashboard-layout>
    <x-slot name="breadcrumb">
        {{ Breadcrumbs::render('admin-categories.edit', $category) }}
    </x-slot>

    <h3>
        Category's details
    </h3>
    
    <div class="dashboard-card details-container">
        <form method="POST" action="{{ route('admin-categories.update', ['id'=>$category->id]) }}">
            @csrf
            @method('put')
            <div class="form__group">
                <label class="label">Name</label>
                <input type="text" name="name" value="{{ $category->name }}"/>
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
</x-dashboard-layout>

<script>
    const deleteBtn = document.querySelector('#delete-btn');
    const deleteForm = document.querySelector('#delete-form');

    deleteBtn.addEventListener('click', function(e) {
        e.preventDefault();

        deleteForm.submit();
    })
</script>
