@section('title') {{'Users'}} @endsection

<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-12 text-end">
                            <a class="btn bg-gradient-dark mb-0" href="{{ route('users.create') }}"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New User</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email Verified At</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Roles</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-xs font-weight-bold">{{ $user->email_verified_at }}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @foreach ($user->roles as $role)
                                                <span class="badge badge-sm bg-gradient-success">{{ $role->title }}</span>
                                            @endforeach
                                        </td>
                                        <td class="align-middle">
                                            <div class="float-right">
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-link text-dark px-3 mb-0">
                                                    <i class="material-icons text-sm me-2">edit</i>
                                                    Edit
                                                </a>
                                                <form class="d-inline" action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0">
                                                        <i class="material-icons text-sm me-2">delete</i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
