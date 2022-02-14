@section('title') {{'Users'}} @endsection

<x-app-layout>
    <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-danger shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Edit User</h6>
              </div>
            </div>
            <div class="card-body px-4 pb-2">
              <div class="table-responsive p-0">
                <form method="post" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('put')
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                            <tr>
                                <th>Labels</th>
                                <th>Values</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" />
                                    @error('name')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" />
                                    @error('email')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>
                                    <input type="password" name="password" id="password" class="form-control" />
                                    @error('password')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>Roles</td>
                                <td>
                                    <select name="roles[]" id="roles" class="form-control">
                                        @foreach($roles as $id => $role)
                                            <option value="{{ $id }}"{{ in_array($id, old('roles', $user->roles->pluck('id')->toArray())) ? ' selected' : '' }}>
                                                {{ $role }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('roles')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="text-end">
                        <button class="btn btn-danger btn-sm mt-3 me-2" type="submit">Edit</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>
