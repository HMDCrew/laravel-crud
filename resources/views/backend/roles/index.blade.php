@section('title') {{'Roles'}} @endsection

<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-12 text-end">
                            <a class="btn bg-gradient-dark mb-0" href="{{ route('roles.create') }}"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Role</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $role->title }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="float-right">
                                                <div class="float-right">
                                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-link text-dark px-3 mb-0">
                                                        <i class="material-icons text-sm me-2">edit</i>
                                                        Edit
                                                    </a>
                                                    <form class="d-inline" action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0">
                                                            <i class="material-icons text-sm me-2">delete</i>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
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
