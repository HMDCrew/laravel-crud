@section('title') {{'Roles'}} @endsection

<x-app-layout>
    <div class="card mt-4">
        <div class="card-header p-3">
          <h5 class="mb-0 text-center mt-3">Edit role</h5>
        </div>
        <div class="card-body p-3">
          <div class="row">
            <form method="post" action="{{ route('roles.update', $role->id) }}">
                @csrf
                @method('put')

                <div class="row">
                    <div class="col-md-8 col-12 mx-auto">
                        <div class="input-group input-group-outline mb-4 is-filled">
                            <label class="form-label">Role name</label>
                            <input type="text" name="role" id="role" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" value="{{ old('role', $role->title) }}">
                        </div>
                        @error('role')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <h6>Permices</h6>
                        @foreach($permissions as $key => $value)
                            <div class="form-check form-switch my-auto is-filled">
                                <input class="form-check-input mt-2" name="permission[]" id="permission-{{$key}}" type="checkbox" value="{{ $key }}" {{ (permice_chacked( $role->permissions, $key ) ? 'checked' : '' ) }} />
                                <label for="permission-{{$key}}"> {{ $value }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn bg-gradient-danger mb-0 toast-btn" type="submit" data-target="dangerToast">Edit</button>
                </div>
            </form>
          </div>
        </div>
    </div>
</x-app-layout>
