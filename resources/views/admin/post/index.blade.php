<x-dashboard-layout>
    <x-slot name="breadcrumb">
        {{ Breadcrumbs::render('admin-posts') }}
    </x-slot>

    <h1>
        Posts list
    </h1>

    <div class="dashboard-card">
        <form class="filter">
            @csrf

            <input type="text" name="id" placeholder="Post id"/>
            <input type="text" name="title" placeholder="Post title"/>

            <select name="author_id">
                <option value="0" selected disabled>Select an author</option>
            </select>

            <select name="category_id">
                <option value="0" selected disabled>Select a category</option>
            </select>

            <select name="status">
                <option value="0" selected disabled>Select a status</option>
            </select>

            <div class="form__group">
                <label class="label">From date</label>
                <input type="date" name="from_date"/>
            </div>

            <div class="form__group">
                <label class="label">To date</label>
                <input type="date" name="to_date"/>
            </div>
            
           
            <div class="form__group form__group--center form__group--38-heigt">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
           
        </form>
    </div>

    <div class="dashboard-card table-container">
        <form style="text-align: right; margin: 10px 0">
            @csrf

            <select name="order_by" style="padding: 2px">
                <option value="0" selected disabled>Order by</option>    
                <option value="1" >Title desc</option>
                <option value="2" >Title asc</option>
                <option value="3" >Views desc</option>
                <option value="4" >Views asc</option>
                <option value="5" >Created at desc</option>
                <option value="6" >Created at asc</option>
            </select>
        </form>
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
        {{ $posts->onEachSide(2)->links() }}
    </div>
    
   
</x-dashboard-layout>
