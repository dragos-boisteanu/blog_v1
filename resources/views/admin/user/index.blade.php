<x-dashboard-layout>
    <x-slot name="breadcrumb">
        {{ Breadcrumbs::render('admin-users') }}
    </x-slot>

    <h1>
        Users list
    </h1>

    <div class="dashboard-card">
        <form id="filter-form" class="filter" method="GET" action="{{ route('admin-users.index') }}">

            <input type="text" name="id" placeholder="User id" value="{{ old('id') }}"/>
            <input type="text" name="name" placeholder="User name" value="{{ old('name') }}"/>
            <input type="text" name="email" placeholder="User email" value="{{ old('email') }}"/>
            
            <select name="role_id">
                <option value="0" selected disabled>Select an role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id || $roleId == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>

            <select name="status">
                <option value="0" selected disabled>Select a status</option>
                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Inactive</option>
            </select>

            <div class="form__group">
                <label class="label">From date</label>
                <input type="date" name="from_date" value="{{ old('from_date') }}"/>
            </div>

            <div class="form__group">
                <label class="label">To date</label>
                <input type="date" name="to_date" value="{{ old('to_date') }}"/>
            </div>
            
           
            <div class="form__group form__group--center form__group--38-heigt">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>

            <div class="form__group form__group--center form__group--38-heigt">
                <button id="reset-btn" type="button" class="btn btn-danger">Reset</button>
            </div>

            <input id="orderBy-filter" name="order_by" type="hidden"/>
           
        </form>
        <form id="reset-form" method="GET" method="GET" action="{{ route('admin-users.index')}} ">
            <input id="orderBy-reset" name="order_by" type="hidden"/>
        </form>
    </div>

    <div class="dashboard-card table-container">
        <div class="before-table-div">
            <div style="text-align: right; margin: 10px 0">
                <select id="orderBy" style="padding: 2px">
                    <option value="0" disabled>Order by</option>    
                    <option value="1" {{ old('order_by') == 1 ? 'selected' : ''}}>Name asc</option>
                    <option value="2" {{ old('order_by') == 2 ? 'selected' : ''}}>Name desc</option>
                    <option value="3" {{ old('order_by') == 3 ? 'selected' : ''}}>Email asc</option>
                    <option value="4" {{ old('order_by') == 4 ? 'selected' : ''}}>Email desc</option>
                    <option value="5" {{ old('order_by') == 3 ? 'selected' : ''}}>Posts count asc</option>
                    <option value="6" {{ old('order_by') == 4 ? 'selected' : ''}}>Posts count desc</option>
                    <option value="7" {{ old('order_by') == 5 ? 'selected' : ''}}>Created at asc</option>
                    <option value="8" {{ old('order_by') ==  6 || $order_by == 8  ? 'selected' : ''}}>Created at desc</option>
                </select>
            </div>
            {{ $users->appends(request()->all())->links() }}
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>
                        Index
                    </th>
                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Role
                    </th>
                    <th>
                        Created at
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Posts
                    </th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            {{ $loop->index + 1 }}
                        </td>
                        <td>
                            {{ $user->id }}
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->role->name }}
                        </td>
                        <td>
                            {{ $user->created_at }}
                        </td>
                        <td style="width: 100px">
                            @if ( $user->status)
                                <div class="status status--active">
                                    active
                                </div>
                            @else
                                <div class="status status--inactive">
                                    inactive
                                </div>
                            @endif                           
                        </td>
                        <td class="center">
                            @if ($user->role_id == 1 || $user->role_id == 2)
                                {{ $user->postsCount }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if ($user->role_id == 1 || $user->role_id == 2)
                                <a href="{{ route('admin-users.show', ['id'=>$user->id]) }}">Show</a> 
                            @else 
                                -
                            @endif
                             
                        </td>
                        <td>
                            <a href="{{ route('admin-users.edit', ['id'=>$user->id]) }}">Edit</a>  
                        </td>
                    </tr>
    
                @endforeach
            </tbody>
        </table>
        {{ $users->appends(request()->all())->links() }}
    </div>
    
   
</x-dashboard-layout>

<script>
    const filterForm = document.getElementById('filter-form');

    const resetBtn = document.getElementById('reset-btn');
    const resetForm = document.getElementById('reset-form');

    const orderBy = document.getElementById('orderBy');
    const orderByFilter  = document.getElementById('orderBy-filter');
    const orderByReset = document.getElementById('orderBy-reset');
    
    resetBtn.addEventListener('click', function(e) {
        e.preventDefault();
        resetForm.submit();
    })

    orderByFilter.value = orderBy.value;
    orderByReset.value = orderBy.value;

    orderBy.addEventListener('change', function() {
        orderByFilter.value = orderBy.value;
        filterForm.submit();
    })
</script>
