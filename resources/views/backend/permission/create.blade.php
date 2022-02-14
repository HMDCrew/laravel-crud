@section('title') {{'Permission'}} @endsection

<x-app-layout>
    <div class="card mt-4">
        <div class="card-header p-3">
          <h5 class="mb-0 text-center mt-3">Create new permice</h5>
        </div>
        <div class="card-body p-3">
          <div class="row">
            <form method="post" action="{{ route('permission.store') }}">
                @csrf

                <div class="row">
                    <div class="col-md-8 col-12 mx-auto">
                        <div class="input-group input-group-outline mb-4">
                            <label class="form-label">Permice name</label>
                            <input type="text" name="permission" id="permission" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" value="{{ old('permission', '') }}">
                        </div>
                        @error('permission')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn bg-gradient-danger mb-0 toast-btn" type="submit" data-target="dangerToast">Create</button>
                </div>
            </form>
          </div>
        </div>
    </div>
</x-app-layout>
