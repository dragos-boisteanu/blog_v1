<x-dashboard-layout>
    <x-slot name="breadcrumb">
        {{ Breadcrumbs::render('admin-categories') }}
    </x-slot>

    <h1>
        Categories list
    </h1>

    <div class="dashboard-card">
        <form id="filter-form" class="filter" method="GET" action="{{ route('admin-categories.index') }}">

            <input type="text" name="id" placeholder="Category id" value="{{ old('id') }}"/>
            <input type="text" name="name" placeholder="Category name" value="{{ old('name') }}"/>
        
            <div class="form__group form__group--center form__group--38-heigt">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>

            <div class="form__group form__group--center form__group--38-heigt">
                <button id="reset-btn" type="button" class="btn btn-danger">Reset</button>
            </div>

            <input id="orderBy-filter" name="order_by" type="hidden"/>
           
        </form>
        <form id="reset-form" method="GET" method="GET" action="{{ route('admin-categories.index')}} ">
            <input id="orderBy-reset" name="order_by" type="hidden"/>
        </form>
    </div>

    <div class="dashboard-card table-container">
        <div class="before-table-div">
            <div style="text-align: right; margin: 10px 0">
                <select id="orderBy" style="padding: 2px">
                    <option value="0" disabled>Order by</option>    
                    <option value="1" {{ old('order_by') == 1 || $order_by == 1 ? 'selected' : ''}}>Name asc</option>
                    <option value="2" {{ old('order_by') == 2 ? 'selected' : ''}}>Name desc</option>
                    <option value="3" {{ old('order_by') == 3 ? 'selected' : ''}}>Posts count asc</option>
                    <option value="4" {{ old('order_by') == 4 ? 'selected' : ''}}>Posts count desc</option>
                </select>
            </div>
            {{ $categories->appends(request()->all())->links() }}
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
                        Posts Count
                    </th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            {{ $loop->index + 1 }}
                        </td>
                        <td>
                            {{ $category->id }}
                        </td>
                        <td>
                            {{ $category->name }}
                        </td>
                        <td class="center">
                           
                            {{ $category->postsCount }}
                          
                        </td>
                        <td>
                            <a href="{{ route('admin-categories.show', ['id'=>$category->id]) }}">Show</a> 

                        </td>
                        <td>
                            <a href="{{ route('admin-categories.edit', ['id'=>$category->id]) }}">Edit</a>  
                        </td>
                    </tr>
    
                @endforeach
            </tbody>
        </table>
        {{ $categories->appends(request()->all())->links() }}
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
