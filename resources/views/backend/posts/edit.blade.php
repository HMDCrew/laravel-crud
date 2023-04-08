@section('title') {{'Posts'}} @endsection

<x-app-layout>
    <div class="card">
        <div class="card-body">
          <form method="post" action="{{ route('posts.update', $post->id) }}">
              @csrf
              @method('put')
              <h5 class="font-weight-bolder">Post information</h5>
              <div class="multisteps-form__content">
                <div class="row mt-3">
                  <div class="col-12 col-sm-6">
                    <div class="input-group input-group-dynamic">
                      <label for="exampleFormControlInput1" class="form-label">Title</label>
                      <input class="multisteps-form__input form-control" name="title" id="title" type="text" onfocus="focused(this)" onfocusout="defocused(this)" value="{{ old('title', $post->title) }}">
                      @error('name')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                      @enderror
                    </div>

                    <input class="multisteps-form__input form-control" name="slug" id="slug" type="text" value="{{ old('slug', $post->slug) }}" placeholder="slug">
                    @error('slug')
                      <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <label class="mt-4">Description</label>
                    <p class="form-text text-muted text-xs ms-1 d-inline">
                      (optional)
                    </p>
                    <textarea name="post_content" id="post_content" onfocus="focused(this)" onfocusout="defocused(this)">{{ old('post_content', $post->post_content) }}</textarea>
                    @error('post_content')
                      <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="button-row d-flex mt-0 mt-md-4">
                <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Send">Save</button>
              </div>
          </form>
        </div>
    </div>
</x-app-layout>