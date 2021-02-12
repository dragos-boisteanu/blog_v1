<x-dashboard-layout>
    <x-slot name="breadcrumb">
        {{ Breadcrumbs::render('admin-posts') }}
    </x-slot>

    <h1>
        Posts list
    </h1>

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
                    Views
                </th>
                <th></th>
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
                        {{ $post->viewsCount() }}
                    </td>
                    <td>
                        <a href="{{ route('admin-post.edit', ['id'=>$post->id]) }}">Edit</a>
                           
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
    {{ $posts->links()}}
   
</x-dashboard-layout>
