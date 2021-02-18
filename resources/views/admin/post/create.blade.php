@extends('layouts.dashboard')


@section('breadcrumbs')
    {{ Breadcrumbs::render('admin-post.create')}}
@endsection

@section('content')
    <h1>
        Create new post
    </h1>

    <div class="post-create">
        <div class="dashboard-card form-container form-container-dashboard">
            <form method="POST" class="form" action="{{ route('admin-post.store') }}">
                @csrf
    
                <div class="form__group">
                    <label class="label">Title</label>
                    <x-input id="title" class="{{ $errors->has('title') ? 'validation--error' : ''}}" type="text" name="title" value="{{old('title')}}"  placeholder="Post title" autofocus />
                    @error('title')
                        <div class="form__notification form__notification--error">{{ $message }}</div>
                    @enderror
                    </div>
    
                <div class="form__group">
                    <label class="label">Image Link</label>
                    <x-input id="image-link" class="{{ $errors->has('image_url') ? 'validation--error' : '' }}" type="text" name="image_url" value="{{old('image_url')}}" placeholder="Post image link"/>
                    @error('image_url')
                        <div class="form__notification form__notification--error">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form__group">
                    <label class="label">Preview</label>
                    <textarea name="preview" class="{{ $errors->has('preview') ? 'validation--error' : '' }}" placeholder="Post preview">{{ old('preview') }}</textarea> 
                    @error('preview')
                        <div class="form__notification form__notification--error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form__group">
                    <label class="label">Content</label>
                    <div class="{{ $errors->has('content') ? 'validation--error' : '' }}">
                        <textarea id="content" name="content"  placeholder="Post content">{{ old('content') }}</textarea> 
                    </div>
                    
                    @error('content')
                        <div class="form__notification form__notification--error">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form__group">
                    <label class="label">Category</label>
                    <select name="category_id" class="{{ $errors->has('category_id') ? 'validation--error' : '' }}">
                        <option selected disabled>Select category</option>
                        @foreach($categories as $category)  
                            <option value="{{ $category->id }}" {{ old('category_id') === $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="form__notification form__notification--error">{{ $message }}</div>
                    @enderror
                </div>
    
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="dashboard-card image-container" style="display: none">
            <img id="post-image" src=""/>
        </div>

    </div>
    
@endsection

@push('scripts')

    <script>
        const imageLinkInput = document.getElementById('image-link');
        const postImage = document.getElementById('post-image');
        const imageContainer = document.querySelector('.image-container');

        const showImageFromLink = () => {
            postImage.src = imageLinkInput.value;
            if(imageContainer.style.display === 'none') {
                imageContainer.style.display = '';
            }else {
                imageContainer.style.display = 'none';
            }
        }

        if(imageLinkInput.value.length > 0) {
            showImageFromLink();
        }
        imageLinkInput.addEventListener("input", showImageFromLink);
        CKEDITOR.replace( 'content' );
    </script>

@endpush