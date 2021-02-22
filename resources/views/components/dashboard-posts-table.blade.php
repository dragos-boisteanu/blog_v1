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
                    {{ $loop->index + 1 }}
                </td>
                <td>
                    {{ $post->id }}
                </td>
                <td class="fixed-with">
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