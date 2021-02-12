<x-dashboard-layout>
    <x-slot name="breadcrumb">
        {{ Breadcrumbs::render('admin-post.create')}}
    </x-slot>

    <h1>
        Create new post
    </h1>

    <div class="post-create">
        <div class="form-container form-container-dashboard">
            <form method="POST" action="{{ route('admin-post.store') }}">
                @csrf
    
                <div class="form__group">
                    <label class="label">Title</label>
                    <x-input id="title" class="{{ $errors->has('title') ? 'validation--error' : ''}}" type="text" name="title" value="{{old('title')}}"  placeholder="Post title" autofocus />
                </div>
    
                <div class="form__group">
                    <label class="label">Image Link</label>
                    <x-input id="image-link" class="{{ $errors->has('image-link') ? 'validation--error' : '' }}" type="text" name="image_url" value="{{old('image_url')}}" placeholder="Post image link"/>
                </div>
    
                <div class="form__group">
                    <label class="label">Preview</label>
                    <textarea id="content" name="preview" class="{{ $errors->has('preview') ? 'validation--error' : '' }}" placeholder="Post preview">{{ old('preview') }}</textarea> 
                </div>

                <div class="form__group">
                    <label class="label">Content</label>
                    <textarea id="content" name="content" class="{{ $errors->has('content') ? 'validation--error' : '' }}" placeholder="Post content">{{ old('content') }}</textarea> 
                </div>
    
                <div class="form__group">
                    <label class="label">Category</label>
                    <select name="category_id">
                        <option selected disabled>Select category</option>
                        @foreach($categories as $category)  
                            <option value="{{ $category->id }}" {{ old('category_id') === $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
    
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="image-container">
            <img id="post-image" src=""/>
        </div>

    </div>
    

</x-dashboard-layout>


<script>
    const imageLinkInput = document.getElementById('image-link');
    const postImage = document.getElementById('post-image');

    const showImageFromLink = () => {
        postImage.src = imageLinkInput.value;
    }

    console.log(imageLinkInput.value)

    if(imageLinkInput.value.length > 0) {
        showImageFromLink();
    }
    imageLinkInput.addEventListener("input", showImageFromLink)
</script>