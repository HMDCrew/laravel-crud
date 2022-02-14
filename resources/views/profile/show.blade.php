<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="container-fluid my-3 py-3">
        <div class="row mb-5">
            <div class="col-lg-3">
                <div class="card position-sticky top-1">
                <ul class="nav flex-column bg-white border-radius-lg p-3">
                    <li class="nav-item">
                    <a class="nav-link text-dark d-flex" data-scroll="" href="#profile">
                        <i class="material-icons text-lg me-2">person</i>
                        <span class="text-sm">Profile</span>
                    </a>
                    </li>
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
                    <li class="nav-item pt-2">
                    <a class="nav-link text-dark d-flex" data-scroll="" href="#2fa">
                        <i class="material-icons text-lg me-2">security</i>
                        <span class="text-sm">2FA</span>
                    </a>
                    </li>
                    <li class="nav-item pt-2">
                    <a class="nav-link text-dark d-flex" data-scroll="" href="#accounts">
                        <i class="material-icons text-lg me-2">badge</i>
                        <span class="text-sm">Accounts</span>
                    </a>
                    </li>
                    <li class="nav-item pt-2">
                    <a class="nav-link text-dark d-flex" data-scroll="" href="#notifications">
                        <i class="material-icons text-lg me-2">campaign</i>
                        <span class="text-sm">Notifications</span>
                    </a>
                    </li>
                    <li class="nav-item pt-2">
                    <a class="nav-link text-dark d-flex" data-scroll="" href="#sessions">
                        <i class="material-icons text-lg me-2">settings_applications</i>
                        <span class="text-sm">Sessions</span>
                    </a>
                    </li>
                    <li class="nav-item pt-2">
                    <a class="nav-link text-dark d-flex" data-scroll="" href="#delete">
                        <i class="material-icons text-lg me-2">delete</i>
                        <span class="text-sm">Delete Account</span>
                    </a>
                    </li>
                </ul>
                </div>
            </div>
          <div class="col-lg-9 mt-lg-0 mt-4">
            <!-- Card Profile -->
            <div class="card card-body" id="profile">
                <div class="row justify-content-center align-items-center">
                    <div class="col-sm-auto col-4">
                        <div class="avatar avatar-xl position-relative">
                            <img src="../../../assets/img/bruce-mars.jpg" alt="bruce" class="w-100 rounded-circle shadow-sm">
                        </div>
                    </div>
                    <div class="col-sm-auto col-8 my-auto">
                        <div class="h-100">
                            <h5 class="mb-1 font-weight-bolder">Richard Davis</h5>
                            <p class="mb-0 font-weight-normal text-sm">CEO / Co-Founder</p>
                        </div>
                    </div>
                    <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
                        <label class="form-check-label mb-0">
                            <small id="profileVisibility">Switch to invisible</small>
                        </label>
                        <div class="form-check form-switch ms-2 my-auto">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault23" checked onchange="visible()">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Basic Info -->
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <h5>Profile Information</h5>
                    <p class="mt-1 text-sm text-gray-600">
                        Update your account's profile information and email address.
                    </p>
                </div>
                <div class="card-body pt-0">

                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                        @livewire('profile.update-profile-information-form')

                        <x-jet-section-border />
                    @endif

                    <div class="row">
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>First Name</label>
                                <input type="text" class="form-control" placeholder="Alec" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="example@email.com" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Change Password -->
            <div class="card mt-4" id="password">
              <div class="card-header">
                <h5>Change Password</h5>
              </div>
              <div class="card-body pt-0">
                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.update-password-form')
                    </div>

                    <x-jet-section-border />
                @endif

                <div class="input-group input-group-outline">
                  <label class="form-label">Current password</label>
                  <input type="password" class="form-control">
                </div>
                <div class="input-group input-group-outline my-4">
                  <label class="form-label">New password</label>
                  <input type="password" class="form-control">
                </div>
                <div class="input-group input-group-outline">
                  <label class="form-label">Confirm New password</label>
                  <input type="password" class="form-control">
                </div>
                <h5 class="mt-5">Password requirements</h5>
                <p class="text-muted mb-2">
                  Please follow this guide for a strong password:
                </p>
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
                <button class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Update password</button>
              </div>
            </div>
            <!-- Card Change Password -->
            <div class="card mt-4" id="2fa">
                @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                    <div class="mt-4">
                        @livewire('profile.two-factor-authentication-form')
                    </div>

                    <x-jet-section-border />
                @endif
            </div>
            <!-- Card Sessions -->
            <div class="card mt-4" id="sessions">
              <div class="card-header pb-3">
                <h5>Sessions</h5>
                <p class="text-sm">This is a list of devices that have logged into your account. Remove those that you do not recognize.</p>
              </div>
              <div class="card-body pt-0">

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>

                
                <div class="d-flex align-items-center">
                  <div class="text-center w-5">
                    <i class="fas fa-desktop text-lg opacity-6"></i>
                  </div>
                  <div class="my-auto ms-3">
                    <div class="h-100">
                      <p class="text-sm mb-1">
                        Bucharest 68.133.163.201
                      </p>
                      <p class="mb-0 text-xs">
                        Your current session
                      </p>
                    </div>
                  </div>
                  <span class="badge badge-success badge-sm my-auto ms-auto me-3">Active</span>
                  <p class="text-secondary text-sm my-auto me-3">EU</p>
                  <a href="javascript:;" class="text-primary text-sm icon-move-right my-auto">See more
                    <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                  </a>
                </div>
                <hr class="horizontal dark">
                <div class="d-flex align-items-center">
                  <div class="text-center w-5">
                    <i class="fas fa-desktop text-lg opacity-6"></i>
                  </div>
                  <p class="my-auto ms-3">Chrome on macOS</p>
                  <p class="text-secondary text-sm ms-auto my-auto me-3">US</p>
                  <a href="javascript:;" class="text-primary text-sm icon-move-right my-auto">See more
                    <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                  </a>
                </div>
                <hr class="horizontal dark">
                <div class="d-flex align-items-center">
                  <div class="text-center w-5">
                    <i class="fas fa-mobile text-lg opacity-6"></i>
                  </div>
                  <p class="my-auto ms-3">Safari on iPhone</p>
                  <p class="text-secondary text-sm ms-auto my-auto me-3">US</p>
                  <a href="javascript:;" class="text-primary text-sm icon-move-right my-auto">See more
                    <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
            <!-- Card Delete Account -->
            <div class="card mt-4" id="delete">
              <div class="card-body">
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
                <div class="d-flex align-items-center mb-sm-0 mb-4">
                  <div class="w-50">
                    <h5>Delete Account</h5>
                    <p class="text-sm mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                  </div>
                  <div class="w-50 text-end">
                    <button class="btn btn-outline-secondary mb-3 mb-md-0 ms-auto" type="button" name="button">Deactivate</button>
                    <button class="btn bg-gradient-danger mb-0 ms-2" type="button" name="button">Delete Account</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</x-app-layout>
