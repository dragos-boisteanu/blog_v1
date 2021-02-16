<x-dashboard-layout>
    <x-slot name="breadcrumb">
        {{ Breadcrumbs::render('admin-users.edit', $user) }}
    </x-slot>

    <div class="dashboard-card" style="width: 40%">
        <form method="POST" action="{{ route('admin-users.update', ['id'=>$user->id]) }}">
            @csrf
            @method('put')
            <div class="form__group">
                <label class="label">Name</label>
                <input type="text" name="name" value="{{ $user->name }}"/>
            </div>

            <div class="form__group">
                <label class="label">Email</label>
                <input type="text" name="email" value="{{ $user->email }}"/>
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
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" id="delete-btn" class="btn btn-danger">Delete</button>
            </div>
        </form>
        <form id="delete-form" method="POST" action="{{ route('admin-users.delete', ['id'=>$user->id])}}">
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
