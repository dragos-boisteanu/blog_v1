<x-dashboard-layout>
    <x-slot name="breadcrumb">
        {{ Breadcrumbs::render('admin-posts') }}
    </x-slot>

    <h1>
        Posts list
    </h1>

    <div class="dashboard-card">
        <form id="filter-form" class="filter" method="GET" action="{{ route('admin-post.index') }}">

            <input type="text" name="id" placeholder="Post id" value="{{ old('id') }}"/>
            <input type="text" name="title" placeholder="Post title" value="{{ old('title') }}"/>

            <select name="author_id">
                <option value="0" selected disabled>Select an author</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                @endforeach
            </select>

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
        <form id="reset-form" method="GET" method="GET" action="{{ route('admin-post.index')}} ">
            <input id="orderBy-reset" name="order_by" type="hidden"/>
        </form>
    </div>

    <div class="dashboard-card table-container">
        <div style="text-align: right; margin: 10px 0">
            <select id="orderBy" style="padding: 2px">
                <option value="0" selected disabled>Order by</option>    
                <option value="1" {{ old('order_by') == 1 ? 'selected' : ''}}>Title asc</option>
                <option value="2" {{ old('order_by') == 2 ? 'selected' : ''}}>Title desc</option>
                <option value="3" {{ old('order_by') == 3 ? 'selected' : ''}}>Views asc</option>
                <option value="4" {{ old('order_by') == 4 ? 'selected' : ''}}>Views desc</option>
                <option value="5" {{ old('order_by') == 5 ? 'selected' : ''}}>Created at asc</option>
                <option value="6" {{ old('order_by') == 6 ? 'selected' : ''}}>Created at desc</option>
            </select>
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
                        Author
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
                            0
                        </td>
                        <td>
                            {{ $post->id }}
                        </td>
                        <td>
                            {{ $post->title }}
                        </td>
                        <td>
                            {{ $post->user->name }}
                        </td>
                        <td>
                            {{ $post->category->name }}
                        </td>
                        <td>
                            {{ $post->created_at }}
                        </td>
                        <td>
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
        {{ $posts->appends(request()->all())->onEachSide(2)->links() }}
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
