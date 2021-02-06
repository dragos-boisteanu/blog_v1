<x-app-layout>
    <x-slot name="title">
        Home
    </x-slot>

    <ul class="posts-list">
        @forEach($posts as $post)
            <li class="post">
                <div class="title">
                    <a href="{{ route('post.show', ['category'=>$post->category->name, 'slug'=>$post->slug])}}"> {{ $post->title }}</a>
                </div>
                <div class="preview">

                </div>
            </li>
        @endforEach
    </ul>
    {{$posts->links()}}
       

</x-app-layout>