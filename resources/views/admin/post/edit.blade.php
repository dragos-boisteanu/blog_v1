@extends('layouts.dashboard')

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin-posts.edit', $post) }}
@endsection

@section('content')
    <h1>
        Edit post
    </h1>

    <div class="post-create">
        <div class="dashboard-card form-container form-container-dashboard">
            <form method="POST" action="{{ route('admin-post.update', ['id'=>$post->id]) }}">
                @csrf
                @method('PUT')

                <div class="form__group">
                    <label class="label">Title</label>
                    <x-input id="title" class="{{ $errors->has('title') ? 'validation--error' : ''}}" type="text" name="title" value="{{ $post->title }}"  placeholder="Post title" autofocus />
                    @error('title')
                        <div class="form__notification form__notification--error">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form__group">
                    <label class="label">Image Link</label>
                    <x-input id="image-link" class="{{ $errors->has('image_url') ? 'validation--error' : '' }}" type="text" name="image_url" value="{{ $post->image_url}}" placeholder="Post image link"/>
                    @error('image_url')
                        <div class="form__notification form__notification--error">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form__group">
                    <label class="label">Preview</label>
                    <textarea  name="preview" class="{{ $errors->has('preview') ? 'validation--error' : '' }}" placeholder="Post preview">{{ $post->preview }}</textarea> 
                    @error('preview')
                        <div class="form__notification form__notification--error">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form__group">
                    <label class="label">Content</label>
                    <textarea id="content" name="content" class="{{ $errors->has('content') ? 'validation--error' : '' }}" placeholder="Post content"> {{ $post->content }}</textarea> 
                    @error('content')
                        <div class="form__notification form__notification--error">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form__group">
                    <label class="label">Category</label>
                    <select name="category_id">
                        <option selected disabled>Select category</option>
                        @foreach($categories as $category)  
                            <option value="{{ $category->id }}" {{ $post->category_id === $category->id ? 'selected' : ''}}> {{ $category->name }} </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="form__notification form__notification--error">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form__group form__group--space-between-h">
                    @if($post->isSoftDeleted)
                        <button type="button" id="restore-btn" class="btn btn-primary">Restore</button>
                    @else 
                        <button type="button" id="delete-btn" class="btn btn-danger">Delete</button>
                    @endif
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
               
            </form>
            <form id="delete-form" method="POST" action="{{ route('admin-post.delete', ['id'=>$post->id])}}" style="display: none">
                @csrf
                @method('DELETE')
            </form>
            <form id="restore-form" method="POST" action="{{ route('admin-post.restore', ['id'=>$post->id])}}" style="display: none">
                @csrf
            </form>
        </div>
        <div class="dashboard-card image-container" style="display: none">
            <img id="post-image" src=""/>
        </div>
    </div>
@endsection

@push('scripts')
    <script>

        CKEDITOR.replace( 'content');

        const imageLinkInput = document.querySelector('#image-link');
        const postImage = document.querySelector('#post-image');
        const imageContainer = document.querySelector('.image-container');


        const showImageFromLink = () => {
            postImage.src = imageLinkInput.value;
            if(imageContainer.style.display === 'none') {
                imageContainer.style.display = 'block';
            }else {
                imageContainer.style.display = 'none';
            }
        }

        if(imageLinkInput.value.length > 0) {
            showImageFromLink();
        }

        imageLinkInput.addEventListener("input", showImageFromLink);

    </script>
@endpush


@if($post->isSoftDeleted)

    @push('scripts')
        <script>
            const restoreBtn = document.querySelector('#restore-btn');
            const restoreForm = document.querySelector('#restore-form');

            restoreBtn.addEventListener('click', function(e) {
                e.preventDefault();
                restoreForm.submit();
            })
        </script>
    @endpush

@else 

    @push('scripts')
        <script>
            
            const deleteBtn = document.querySelector('#delete-btn');
            const deleteForm = document.querySelector('#delete-form');

            
            deleteBtn.addEventListener('click', function(e) {
                e.preventDefault;
                deleteForm.submit();
            })
        </script>   
    @endpush


@endif 