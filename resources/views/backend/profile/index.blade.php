@section('title') {{'Profile'}} @endsection

<x-app-layout>
    <div class="container-fluid my-3 py-3">
        <div class="row mb-5">
            <div class="col-lg-3">
                <div class="card position-sticky top-1">
                <ul class="nav flex-column bg-white border-radius-lg p-3">
                    <li class="nav-item pt-2">
                    <a class="nav-link text-dark d-flex" data-scroll="" href="#basic-info">
                        <i class="material-icons text-lg me-2">receipt_long</i>
                        <span class="text-sm">Basic Info</span>
                    </a>
                    </li>
                    <li class="nav-item pt-2">
                    <a class="nav-link text-dark d-flex" data-scroll="" href="#password">
                        <i class="material-icons text-lg me-2">lock</i>
                        <span class="text-sm">Change Password</span>
                    </a>
                    </li>
                </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <!-- Card Basic Info -->
                <div class="card" id="basic-info">
                    <div class="card-header">
                        <h5>Profile Information</h5>
                        <p class="mt-1 text-sm text-gray-600">
                            Update your account's profile information and email address.
                        </p>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('prof.update_user', $user->id) }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group input-group-static">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Alec" onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group input-group-static">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="example@email.com" onfocus="focused(this)" onfocusout="defocused(this)" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn bg-gradient-dark btn-sm float-end mt-4 mb-0">Update info</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Card Change Password -->
                <div class="card mt-4" id="password">
                    <div class="card-header">
                        <h5>Change Password</h5>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('prof.update_pwd', $user->id) }}" method="POST">
                            @csrf
                            <div class="input-group input-group-outline">
                                <label class="form-label">Current password</label>
                                <input type="password" name="current-password" class="form-control">
                            </div>
                            <div class="input-group input-group-outline my-4">
                                <label class="form-label">New password</label>
                                <input type="password" name="new-password" class="form-control">
                            </div>
                            <div class="input-group input-group-outline">
                                <label class="form-label">Confirm New password</label>
                                <input type="password" name="new-password-confirm" class="form-control">
                            </div>
                            <h5 class="mt-5">Password requirements</h5>
                            <p class="text-muted mb-2">Please follow this guide for a strong password:</p>
                            <ul class="text-muted ps-4 mb-0 float-start">
                                <li>
                                    <span class="text-sm">One special characters</span>
                                </li>
                                <li>
                                    <span class="text-sm">Min 6 characters</span>
                                </li>
                                <li>
                                    <span class="text-sm">One number (2 are recommended)</span>
                                </li>
                                <li>
                                    <span class="text-sm">Change it often</span>
                                </li>
                            </ul>
                            <button type="submit" class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Update password</button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
    </div>
</x-app-layout>
