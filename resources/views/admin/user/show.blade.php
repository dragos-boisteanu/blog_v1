<x-dashboard-layout>
    <x-slot name="breadcrumb">
        {{ Breadcrumbs::render('admin-users.edit', $user) }}
    </x-slot>

    <h3>
        User's details
    </h3>

    <div class="dashboard-card details-container">
        <div class="detail">
            <div class="detail__name">
                Name
            </div>
            <div class="details__value">
                {{ $user->name}}
            </div>
        </div>
        <div class="detail">
            <div class="detail__name">
                Email
            </div>
            <div class="details__value">
                {{ $user->email}}
            </div>
        </div>
        <div class="detail">
            <div class="detail__name">
                Role
            </div>
            <div class="details__value">
                {{ $user->role->name}}
            </div>
        </div>
        <div class="detail">
            <div class="detail__name">
                Posts count
            </div>
            <div class="details__value">
                {{ $user->postsCount }}
            </div>
        </div>
        <div class="detail">
            <div class="detail__name">
                Registered on
            </div>
            <div class="details__value">
                {{ $user->created_at}}
            </div>
        </div>
        @can('see-users')
            <div class="detail">
                <div class="detail__name">
                </div>
                <div class="details__value">
                    <a href="{{ route('admin-users.edit', ['id'=>$user->id])}}">Edit</a>
                </div>
            </div>
        @endcan
    </div>   

    <h3>
        User's posts
    </h3>

    <div class="dashboard-card">
        <form id="filter-form" class="filter" method="GET" action="{{ route('admin-users.show', ['id'=>$user->id]) }}">

            <input type="text" name="post_id" placeholder="Post id" value="{{ old('id') }}"/>
            <input type="text" name="title" placeholder="Post title" value="{{ old('title') }}"/>

            <select name="category_id">
                <option value="0" selected disabled>Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
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
        <form id="reset-form" method="GET" method="GET" action="{{ route('admin-users.show', ['id'=>$user->id])}} ">
            <input id="orderBy-reset" name="order_by" type="hidden"/>
        </form>
    </div>

    <div class="dashboard-card table-container">
        <div class="before-table-div">
            <div style="text-align: right; margin: 10px 0">
                <select id="orderBy" style="padding: 2px">
                    <option value="0" disabled>Order by</option>    
                    <option value="1" {{ old('order_by') == 1 ? 'selected' : ''}}>Title asc</option>
                    <option value="2" {{ old('order_by') == 2 ? 'selected' : ''}}>Title desc</option>
                    <option value="3" {{ old('order_by') == 3 ? 'selected' : ''}}>Views asc</option>
                    <option value="4" {{ old('order_by') == 4 ? 'selected' : ''}}>Views desc</option>
                    <option value="5" {{ old('order_by') == 5 ? 'selected' : ''}}>Created at asc</option>
                    <option value="6" {{ old('order_by') ==  6 || $order_by == 6  ? 'selected' : ''}}>Created at desc</option>
                </select>
            </div>
            {{ $posts->appends(request()->all())->links() }}
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
                        Title
                    </th>
                    <th>
                        Category
                    </th>
                    <th>
                        Created at
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Views
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>
                            {{ $loop->index + 1 }}
                        </td>
                        <td>
                            {{ $post->id }}
                        </td>
                        <td class="fixed-with">
                            {{ $post->title }}
                        </td>
                        <td>
                            {{ $post->category->name }}
                        </td>
                        <td>
                            {{ $post->created_at }}
                        </td>
                        <td style="width: 100px">
                            @if ( $post->getStatus())
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
                            {{ $post->viewsCount() }}
                        </td>
                        <td>
                            <a href="{{ route('admin-post.edit', ['id'=>$post->id]) }}">Edit</a>  
                        </td>
                    </tr>
    
                @endforeach
            </tbody>
        </table>
        {{ $posts->appends(request()->all())->links() }}
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
