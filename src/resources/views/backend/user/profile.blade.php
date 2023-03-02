@extends('backend.layouts.app')
@section('title', 'Stand Eagle | ' . $user->name)

@section('content')
    <div class="profile-foreground position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg">
            <img src="{{ asset('backend/') }}/assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
        </div>
    </div>
    <div class="mb-lg-3 pb-lg-4 mb-4 pt-4">
        <div class="row g-4">
            <div class="col-auto">
                <div class="avatar-lg">
                    <img src="{{ auth()->user()->photo ? getAssetUrl($user->photo,'profile') : asset('backend/assets/images/users/avatar-1.jpg') }}" alt="user-img"
                        class="img-thumbnail rounded-circle" />
                </div>
            </div>
            <!--end col-->
            <div class="col">
                <div class="p-2">
                    <h3 class="mb-1 text-white">{{ $user->name }}</h3>
                    <p class="text-white-75">Owner & Founder</p>
                    <div class="hstack text-white-50 gap-1">
                        <div class="me-2"><i
                                class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>{{ $user->city . ', ' . $user->country }}
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->


        </div>
        <!--end row-->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div>
                <div class="d-flex">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills animation-nav profile-nav gap-lg-3 flex-grow-1 gap-2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                    class="d-none d-md-inline-block">Overview</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#activities" role="tab">
                                <i class="ri-list-unordered d-inline-block d-md-none"></i> <span
                                    class="d-none d-md-inline-block">Activities</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#projects" role="tab">
                                <i class="ri-price-tag-line d-inline-block d-md-none"></i> <span
                                    class="d-none d-md-inline-block">Projects</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#documents" role="tab">
                                <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span
                                    class="d-none d-md-inline-block">Documents</span>
                            </a>
                        </li>
                    </ul>
                    <div class="flex-shrink-0">

                        @if (auth()->user()->hasRole('SuperAdmin') || $user->id == auth()->user()->id)
                            <a href="{{ route('user.edit', lock($user->id)) }}" class="btn btn-success"><i
                                    class="ri-edit-box-line align-bottom"></i> Edit Profile</a>
                        @endif


                    </div>
                </div>
                <!-- Tab panes -->
                <div class="tab-content text-muted pt-4">
                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-xxl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-5">Complete Your Profile</h5>

                                        <div class="progress animated-progress custom-progress progress-label">
                                            <div class="progress-bar bg-danger" role="progressbar"
                                                style="width: {{ profileComplete() }}%"
                                                aria-valuenow="{{ profileComplete() }}" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="label">{{ profileComplete() }}%</div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Info</h5>
                                        <div class="table-responsive">
                                            <table class="table-borderless mb-0 table">
                                                <tbody>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Name :</th>
                                                        <td class="text-muted">{{ $user->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Phone :</th>
                                                        <td class="text-muted">{{ $user->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">E-mail :</th>
                                                        <td class="text-muted">{{ $user->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Location :</th>
                                                        <td class="text-muted">
                                                            {{ $user->city . ', ' . $user->country }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Joining Date</th>
                                                        <td class="text-muted">
                                                            {{ Carbon\Carbon::createFromDate($user->joining_date)->isoFormat('Do MMMM, YYYY') }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->

                            </div>
                            <!--end col-->
                            <div class="col-xxl-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">About</h5>
                                        {!! $user->description !!}
                                        <div class="row">
                                            @if ($user->designation)
                                                <div class="col-6 col-md-4">
                                                    <div class="d-flex mt-4">
                                                        <div class="avatar-xs align-self-center me-3 flex-shrink-0">
                                                            <div
                                                                class="avatar-title bg-light rounded-circle fs-16 text-primary shadow">
                                                                <i class="ri-user-2-fill"></i>
                                                            </div>
                                                        </div>

                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="mb-1">Designation :</p>
                                                            <h6 class="text-truncate mb-0">
                                                                {{ $user->designation }}
                                                            </h6>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endif
                                            <!--end col-->
                                            <div class="col-6 col-md-4">
                                                <div class="d-flex mt-4">
                                                    <div class="avatar-xs align-self-center me-3 flex-shrink-0">
                                                        <div
                                                            class="avatar-title bg-light rounded-circle fs-16 text-primary shadow">
                                                            <i class="ri-global-line"></i>
                                                        </div>
                                                    </div>
                                                    @if ($user->website)
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="mb-1">Website :</p>
                                                            <a target="_blank" href="{{ $user->website }}"
                                                                class="fw-semibold">{{ $user->website }}</a>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div><!-- end card -->



                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Projects</h5>
                                        <!-- Swiper -->
                                        <div class="swiper project-swiper mt-n4">
                                            <div class="d-flex justify-content-end mb-2 gap-2">
                                                <div class="slider-button-prev">
                                                    <div class="avatar-title fs-18 rounded px-1 shadow">
                                                        <i class="ri-arrow-left-s-line"></i>
                                                    </div>
                                                </div>
                                                <div class="slider-button-next">
                                                    <div class="avatar-title fs-18 rounded px-1 shadow">
                                                        <i class="ri-arrow-right-s-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="card profile-project-card profile-project-success mb-0">
                                                        <div class="card-body p-4">
                                                            <div class="d-flex">
                                                                <div class="flex-grow-1 text-muted overflow-hidden">
                                                                    <h5 class="fs-14 text-truncate mb-1">
                                                                        <a href="#" class="text-dark">ABC
                                                                            Project Customization</a>
                                                                    </h5>
                                                                    <p class="text-muted text-truncate mb-0">
                                                                        Last Update : <span class="fw-semibold text-dark">4
                                                                            hr Ago</span></p>
                                                                </div>
                                                                <div class="ms-2 flex-shrink-0">
                                                                    <div class="badge badge-soft-warning fs-10">
                                                                        Inprogress</div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex mt-4">
                                                                <div class="flex-grow-1">
                                                                    <div class="d-flex align-items-center gap-2">
                                                                        <div>
                                                                            <h5 class="fs-12 text-muted mb-0">
                                                                                Members :</h5>
                                                                        </div>
                                                                        <div class="avatar-group">
                                                                            <div class="avatar-group-item shadow">
                                                                                <div class="avatar-xs">
                                                                                    <img src="{{ asset('backend/') }}/assets/images/users/avatar-4.jpg"
                                                                                        alt=""
                                                                                        class="rounded-circle img-fluid" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="avatar-group-item shadow">
                                                                                <div class="avatar-xs">
                                                                                    <img src="{{ asset('backend/') }}/assets/images/users/avatar-5.jpg"
                                                                                        alt=""
                                                                                        class="rounded-circle img-fluid" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="avatar-group-item shadow">
                                                                                <div class="avatar-xs">
                                                                                    <div
                                                                                        class="avatar-title rounded-circle bg-light text-primary">
                                                                                        A
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="avatar-group-item shadow">
                                                                                <div class="avatar-xs">
                                                                                    <img src="{{ asset('backend/') }}/assets/images/users/avatar-2.jpg"
                                                                                        alt=""
                                                                                        class="rounded-circle img-fluid" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end card body -->
                                                    </div>
                                                    <!-- end card -->
                                                </div>
                                                <!-- end slide item -->
                                                <div class="swiper-slide">
                                                    <div class="card profile-project-card profile-project-danger mb-0">
                                                        <div class="card-body p-4">
                                                            <div class="d-flex">
                                                                <div class="flex-grow-1 text-muted overflow-hidden">
                                                                    <h5 class="fs-14 text-truncate mb-1">
                                                                        <a href="#" class="text-dark">Client -
                                                                            John</a>
                                                                    </h5>
                                                                    <p class="text-muted text-truncate mb-0">
                                                                        Last Update : <span class="fw-semibold text-dark">1
                                                                            hr Ago</span></p>
                                                                </div>
                                                                <div class="ms-2 flex-shrink-0">
                                                                    <div class="badge badge-soft-success fs-10">
                                                                        Completed</div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex mt-4">
                                                                <div class="flex-grow-1">
                                                                    <div class="d-flex align-items-center gap-2">
                                                                        <div>
                                                                            <h5 class="fs-12 text-muted mb-0">
                                                                                Members :</h5>
                                                                        </div>
                                                                        <div class="avatar-group">
                                                                            <div class="avatar-group-item shadow">
                                                                                <div class="avatar-xs">
                                                                                    <img src="{{ asset('backend/') }}/assets/images/users/avatar-2.jpg"
                                                                                        alt=""
                                                                                        class="rounded-circle img-fluid" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="avatar-group-item shadow">
                                                                                <div class="avatar-xs">
                                                                                    <div
                                                                                        class="avatar-title rounded-circle bg-light text-primary">
                                                                                        C
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- end card body -->
                                                    </div><!-- end card -->
                                                </div><!-- end slide item -->
                                                <div class="swiper-slide">
                                                    <div class="card profile-project-card profile-project-info mb-0">
                                                        <div class="card-body p-4">
                                                            <div class="d-flex">
                                                                <div class="flex-grow-1 text-muted overflow-hidden">
                                                                    <h5 class="fs-14 text-truncate mb-1">
                                                                        <a href="#" class="text-dark">Brand logo
                                                                            Design</a>
                                                                    </h5>
                                                                    <p class="text-muted text-truncate mb-0">
                                                                        Last Update : <span class="fw-semibold text-dark">2
                                                                            hr Ago</span></p>
                                                                </div>
                                                                <div class="ms-2 flex-shrink-0">
                                                                    <div class="badge badge-soft-warning fs-10">
                                                                        Inprogress</div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex mt-4">
                                                                <div class="flex-grow-1">
                                                                    <div class="d-flex align-items-center gap-2">
                                                                        <div>
                                                                            <h5 class="fs-12 text-muted mb-0">
                                                                                Members :</h5>
                                                                        </div>
                                                                        <div class="avatar-group">
                                                                            <div class="avatar-group-item shadow">
                                                                                <div class="avatar-xs">
                                                                                    <img src="{{ asset('backend/') }}/assets/images/users/avatar-5.jpg"
                                                                                        alt=""
                                                                                        class="rounded-circle img-fluid" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- end card body -->
                                                    </div><!-- end card -->
                                                </div><!-- end slide item -->
                                                <div class="swiper-slide">
                                                    <div class="card profile-project-card profile-project-danger mb-0">
                                                        <div class="card-body p-4">
                                                            <div class="d-flex">
                                                                <div class="flex-grow-1 text-muted overflow-hidden">
                                                                    <h5 class="fs-14 text-truncate mb-1">
                                                                        <a href="#" class="text-dark">Project
                                                                            update</a>
                                                                    </h5>
                                                                    <p class="text-muted text-truncate mb-0">
                                                                        Last Update : <span class="fw-semibold text-dark">4
                                                                            hr Ago</span></p>
                                                                </div>
                                                                <div class="ms-2 flex-shrink-0">
                                                                    <div class="badge badge-soft-success fs-10">
                                                                        Completed</div>
                                                                </div>
                                                            </div>

                                                            <div class="d-flex mt-4">
                                                                <div class="flex-grow-1">
                                                                    <div class="d-flex align-items-center gap-2">
                                                                        <div>
                                                                            <h5 class="fs-12 text-muted mb-0">
                                                                                Members :</h5>
                                                                        </div>
                                                                        <div class="avatar-group">
                                                                            <div class="avatar-group-item shadow">
                                                                                <div class="avatar-xs">
                                                                                    <img src="{{ asset('backend/') }}/assets/images/users/avatar-4.jpg"
                                                                                        alt=""
                                                                                        class="rounded-circle img-fluid" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="avatar-group-item shadow">
                                                                                <div class="avatar-xs">
                                                                                    <img src="{{ asset('backend/') }}/assets/images/users/avatar-5.jpg"
                                                                                        alt=""
                                                                                        class="rounded-circle img-fluid" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end card body -->
                                                    </div>
                                                    <!-- end card -->
                                                </div>
                                                <!-- end slide item -->
                                                <div class="swiper-slide">
                                                    <div class="card profile-project-card profile-project-warning mb-0">
                                                        <div class="card-body p-4">
                                                            <div class="d-flex">
                                                                <div class="flex-grow-1 text-muted overflow-hidden">
                                                                    <h5 class="fs-14 text-truncate mb-1">
                                                                        <a href="#" class="text-dark">Chat
                                                                            App</a>
                                                                    </h5>
                                                                    <p class="text-muted text-truncate mb-0">
                                                                        Last Update : <span class="fw-semibold text-dark">1
                                                                            hr Ago</span></p>
                                                                </div>
                                                                <div class="ms-2 flex-shrink-0">
                                                                    <div class="badge badge-soft-warning fs-10">
                                                                        Inprogress</div>
                                                                </div>
                                                            </div>

                                                            <div class="d-flex mt-4">
                                                                <div class="flex-grow-1">
                                                                    <div class="d-flex align-items-center gap-2">
                                                                        <div>
                                                                            <h5 class="fs-12 text-muted mb-0">
                                                                                Members :</h5>
                                                                        </div>
                                                                        <div class="avatar-group">
                                                                            <div class="avatar-group-item shadow">
                                                                                <div class="avatar-xs">
                                                                                    <img src="{{ asset('backend/') }}/assets/images/users/avatar-4.jpg"
                                                                                        alt=""
                                                                                        class="rounded-circle img-fluid" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="avatar-group-item shadow">
                                                                                <div class="avatar-xs">
                                                                                    <img src="{{ asset('backend/') }}/assets/images/users/avatar-5.jpg"
                                                                                        alt=""
                                                                                        class="rounded-circle img-fluid" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="avatar-group-item shadow">
                                                                                <div class="avatar-xs">
                                                                                    <div
                                                                                        class="avatar-title rounded-circle bg-light text-primary">
                                                                                        A
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end card body -->
                                                    </div>
                                                    <!-- end card -->
                                                </div>
                                                <!-- end slide item -->
                                            </div>

                                        </div>

                                    </div>
                                    <!-- end card body -->
                                </div><!-- end card -->

                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <div class="tab-pane fade" id="activities" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Activities</h5>
                                <div class="acitivity-timeline">
                                    <div class="acitivity-item d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset('backend/') }}/assets/images/users/avatar-1.jpg"
                                                alt="" class="avatar-xs rounded-circle acitivity-avatar shadow" />
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">Oliver Phillips <span
                                                    class="badge bg-soft-primary text-primary align-middle">New</span>
                                            </h6>
                                            <p class="text-muted mb-2">We talked about a project on
                                                linkedin.</p>
                                            <small class="text-muted mb-0">Today</small>
                                        </div>
                                    </div>
                                    <div class="acitivity-item d-flex py-3">
                                        <div class="avatar-xs acitivity-avatar flex-shrink-0">
                                            <div class="avatar-title bg-soft-success text-success rounded-circle shadow">
                                                N
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">Nancy Martino <span
                                                    class="badge bg-soft-secondary text-secondary align-middle">In
                                                    Progress</span></h6>
                                            <p class="text-muted mb-2"><i class="ri-file-text-line ms-2 align-middle"></i>
                                                Create new project Buildng product</p>
                                            <div class="avatar-group mb-2">
                                                <a href="javascript: void(0);" class="avatar-group-item shadow"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                    data-bs-original-title="Christi">
                                                    <img src="{{ asset('backend/') }}/assets/images/users/avatar-4.jpg"
                                                        alt="" class="rounded-circle avatar-xs" />
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item shadow"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                    data-bs-original-title="Frank Hook">
                                                    <img src="{{ asset('backend/') }}/assets/images/users/avatar-3.jpg"
                                                        alt="" class="rounded-circle avatar-xs" />
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item shadow"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                    data-bs-original-title=" Ruby">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title rounded-circle bg-light text-primary">
                                                            R
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="javascript: void(0);" class="avatar-group-item shadow"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                    data-bs-original-title="more">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title rounded-circle">
                                                            2+
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <small class="text-muted mb-0">Yesterday</small>
                                        </div>
                                    </div>
                                    <div class="acitivity-item d-flex py-3">
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset('backend/') }}/assets/images/users/avatar-2.jpg"
                                                alt="" class="avatar-xs rounded-circle acitivity-avatar shadow" />
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">Natasha Carey <span
                                                    class="badge bg-soft-success text-success align-middle">Completed</span>
                                            </h6>
                                            <p class="text-muted mb-2">Adding a new event with
                                                attachments</p>
                                            <div class="row">
                                                <div class="col-xxl-4">
                                                    <div class="row gx-2 mb-2 border border-dashed p-2">
                                                        <div class="col-4">
                                                            <img src="{{ asset('backend/') }}/assets/images/small/img-2.jpg"
                                                                alt="" class="img-fluid rounded shadow" />
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-4">
                                                            <img src="{{ asset('backend/') }}/assets/images/small/img-3.jpg"
                                                                alt="" class="img-fluid rounded shadow" />
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-4">
                                                            <img src="{{ asset('backend/') }}/assets/images/small/img-4.jpg"
                                                                alt="" class="img-fluid rounded shadow" />
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                            </div>
                                            <small class="text-muted mb-0">25 Nov</small>
                                        </div>
                                    </div>
                                    <div class="acitivity-item d-flex py-3">
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset('backend/') }}/assets/images/users/avatar-6.jpg"
                                                alt="" class="avatar-xs rounded-circle acitivity-avatar shadow" />
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">Bethany Johnson</h6>
                                            <p class="text-muted mb-2">added a new member to velzon
                                                dashboard</p>
                                            <small class="text-muted mb-0">19 Nov</small>
                                        </div>
                                    </div>
                                    <div class="acitivity-item d-flex py-3">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-xs acitivity-avatar">
                                                <div class="avatar-title rounded-circle bg-soft-danger text-danger shadow">
                                                    <i class="ri-shopping-bag-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">Your order is placed <span
                                                    class="badge bg-soft-danger text-danger ms-1 align-middle">Out
                                                    of Delivery</span></h6>
                                            <p class="text-muted mb-2">These customers can rest assured
                                                their order has been placed.</p>
                                            <small class="text-muted mb-0">16 Nov</small>
                                        </div>
                                    </div>
                                    <div class="acitivity-item d-flex py-3">
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset('backend/') }}/assets/images/users/avatar-7.jpg"
                                                alt="" class="avatar-xs rounded-circle acitivity-avatar shadow" />
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">Lewis Pratt</h6>
                                            <p class="text-muted mb-2">They all have something to say
                                                beyond the words on the page. They can come across as
                                                casual or neutral, exotic or graphic. </p>
                                            <small class="text-muted mb-0">22 Oct</small>
                                        </div>
                                    </div>
                                    <div class="acitivity-item d-flex py-3">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-xs acitivity-avatar">
                                                <div class="avatar-title rounded-circle bg-soft-info text-info shadow">
                                                    <i class="ri-line-chart-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">Monthly sales report</h6>
                                            <p class="text-muted mb-2">
                                                <span class="text-danger">2 days left</span>
                                                notification to submit the monthly sales report. <a
                                                    href="javascript:void(0);"
                                                    class="link-warning text-decoration-underline">Reports
                                                    Builder</a>
                                            </p>
                                            <small class="text-muted mb-0">15 Oct</small>
                                        </div>
                                    </div>
                                    <div class="acitivity-item d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset('backend/') }}/assets/images/users/avatar-8.jpg"
                                                alt="" class="avatar-xs rounded-circle acitivity-avatar shadow" />
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">New ticket received <span
                                                    class="badge bg-soft-success text-success align-middle">Completed</span>
                                            </h6>
                                            <p class="text-muted mb-2">User <span class="text-secondary">Erica245</span>
                                                submitted a
                                                ticket.</p>
                                            <small class="text-muted mb-0">26 Aug</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end tab-pane-->
                    <div class="tab-pane fade" id="projects" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xxl-3 col-sm-6">
                                        <div class="card profile-project-card profile-project-warning">
                                            <div class="card-body p-4">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                class="text-dark">Chat
                                                                App Update</a>
                                                        </h5>
                                                        <p class="text-muted text-truncate mb-0">Last
                                                            Update : <span class="fw-semibold text-dark">2 year
                                                                Ago</span></p>
                                                    </div>
                                                    <div class="ms-2 flex-shrink-0">
                                                        <div class="badge badge-soft-warning fs-10">
                                                            Inprogress</div>
                                                    </div>
                                                </div>

                                                <div class="d-flex mt-4">
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div>
                                                                <h5 class="fs-12 text-muted mb-0">
                                                                    Members :</h5>
                                                            </div>
                                                            <div class="avatar-group">
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-1.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-3.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <div
                                                                            class="avatar-title rounded-circle bg-light text-primary">
                                                                            J
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-3 col-sm-6">
                                        <div class="card profile-project-card profile-project-success">
                                            <div class="card-body p-4">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                class="text-dark">ABC
                                                                Project
                                                                Customization</a></h5>
                                                        <p class="text-muted text-truncate mb-0">Last
                                                            Update : <span class="fw-semibold text-dark">2 month
                                                                Ago</span></p>
                                                    </div>
                                                    <div class="ms-2 flex-shrink-0">
                                                        <div class="badge badge-soft-primary fs-10">
                                                            Progress</div>
                                                    </div>
                                                </div>

                                                <div class="d-flex mt-4">
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div>
                                                                <h5 class="fs-12 text-muted mb-0">
                                                                    Members :</h5>
                                                            </div>
                                                            <div class="avatar-group">
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-8.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-7.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-6.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <div
                                                                            class="avatar-title rounded-circle bg-primary">
                                                                            2+
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-3 col-sm-6">
                                        <div class="card profile-project-card profile-project-info">
                                            <div class="card-body p-4">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                class="text-dark">Client
                                                                - Frank
                                                                Hook</a></h5>
                                                        <p class="text-muted text-truncate mb-0">Last
                                                            Update : <span class="fw-semibold text-dark">1 hr
                                                                Ago</span></p>
                                                    </div>
                                                    <div class="ms-2 flex-shrink-0">
                                                        <div class="badge badge-soft-info fs-10">New
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex mt-4">
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div>
                                                                <h5 class="fs-12 text-muted mb-0">
                                                                    Members :</h5>
                                                            </div>
                                                            <div class="avatar-group">
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-4.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <div
                                                                            class="avatar-title rounded-circle bg-light text-primary">
                                                                            M
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-3.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-3 col-sm-6">
                                        <div class="card profile-project-card profile-project-primary">
                                            <div class="card-body p-4">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                class="text-dark">Velzon
                                                                Project</a>
                                                        </h5>
                                                        <p class="text-muted text-truncate mb-0">Last
                                                            Update : <span class="fw-semibold text-dark">11 hr
                                                                Ago</span></p>
                                                    </div>
                                                    <div class="ms-2 flex-shrink-0">
                                                        <div class="badge badge-soft-success fs-10">
                                                            Completed</div>
                                                    </div>
                                                </div>

                                                <div class="d-flex mt-4">
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div>
                                                                <h5 class="fs-12 text-muted mb-0">
                                                                    Members :</h5>
                                                            </div>
                                                            <div class="avatar-group">
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-7.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-5.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-3 col-sm-6">
                                        <div class="card profile-project-card profile-project-danger">
                                            <div class="card-body p-4">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                class="text-dark">Brand
                                                                Logo Design</a>
                                                        </h5>
                                                        <p class="text-muted text-truncate mb-0">Last
                                                            Update : <span class="fw-semibold text-dark">10 min
                                                                Ago</span></p>
                                                    </div>
                                                    <div class="ms-2 flex-shrink-0">
                                                        <div class="badge badge-soft-info fs-10">New
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex mt-4">
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div>
                                                                <h5 class="fs-12 text-muted mb-0">
                                                                    Members :</h5>
                                                            </div>
                                                            <div class="avatar-group">
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-7.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-6.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <div
                                                                            class="avatar-title rounded-circle bg-light text-primary">
                                                                            E
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-3 col-sm-6">
                                        <div class="card profile-project-card profile-project-primary">
                                            <div class="card-body p-4">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                class="text-dark">Chat
                                                                App</a></h5>
                                                        <p class="text-muted text-truncate mb-0">Last
                                                            Update : <span class="fw-semibold text-dark">8 hr
                                                                Ago</span></p>
                                                    </div>
                                                    <div class="ms-2 flex-shrink-0">
                                                        <div class="badge badge-soft-warning fs-10">
                                                            Inprogress</div>
                                                    </div>
                                                </div>

                                                <div class="d-flex mt-4">
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div>
                                                                <h5 class="fs-12 text-muted mb-0">
                                                                    Members :</h5>
                                                            </div>
                                                            <div class="avatar-group">
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <div
                                                                            class="avatar-title rounded-circle bg-light text-primary">
                                                                            R
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-3.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-8.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-3 col-sm-6">
                                        <div class="card profile-project-card profile-project-warning">
                                            <div class="card-body p-4">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                class="text-dark">Project Update</a>
                                                        </h5>
                                                        <p class="text-muted text-truncate mb-0">Last
                                                            Update : <span class="fw-semibold text-dark">48 min
                                                                Ago</span></p>
                                                    </div>
                                                    <div class="ms-2 flex-shrink-0">
                                                        <div class="badge badge-soft-warning fs-10">
                                                            Inprogress</div>
                                                    </div>
                                                </div>

                                                <div class="d-flex mt-4">
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div>
                                                                <h5 class="fs-12 text-muted mb-0">
                                                                    Members :</h5>
                                                            </div>
                                                            <div class="avatar-group">
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-6.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-5.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-4.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-3 col-sm-6">
                                        <div class="card profile-project-card profile-project-success">
                                            <div class="card-body p-4">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                class="text-dark">Client
                                                                - Jennifer</a>
                                                        </h5>
                                                        <p class="text-muted text-truncate mb-0">Last
                                                            Update : <span class="fw-semibold text-dark">30 min
                                                                Ago</span></p>
                                                    </div>
                                                    <div class="ms-2 flex-shrink-0">
                                                        <div class="badge badge-soft-primary fs-10">
                                                            Process</div>
                                                    </div>
                                                </div>

                                                <div class="d-flex mt-4">
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div>
                                                                <h5 class="fs-12 text-muted mb-0">
                                                                    Members :</h5>
                                                            </div>
                                                            <div class="avatar-group">
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-1.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-3 col-sm-6">
                                        <div class="card profile-project-card mb-xxl-0 profile-project-info">
                                            <div class="card-body p-4">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                class="text-dark">Bsuiness Template -
                                                                UI/UX design</a></h5>
                                                        <p class="text-muted text-truncate mb-0">Last
                                                            Update : <span class="fw-semibold text-dark">7 month
                                                                Ago</span></p>
                                                    </div>
                                                    <div class="ms-2 flex-shrink-0">
                                                        <div class="badge badge-soft-success fs-10">
                                                            Completed</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex mt-4">
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div>
                                                                <h5 class="fs-12 text-muted mb-0">
                                                                    Members :</h5>
                                                            </div>
                                                            <div class="avatar-group">
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-2.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-3.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-4.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <div
                                                                            class="avatar-title rounded-circle bg-primary">
                                                                            2+
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-3 col-sm-6">
                                        <div class="card profile-project-card mb-xxl-0 profile-project-success">
                                            <div class="card-body p-4">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                class="text-dark">Update
                                                                Project</a>
                                                        </h5>
                                                        <p class="text-muted text-truncate mb-0">Last
                                                            Update : <span class="fw-semibold text-dark">1 month
                                                                Ago</span></p>
                                                    </div>
                                                    <div class="ms-2 flex-shrink-0">
                                                        <div class="badge badge-soft-info fs-10">New
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex mt-4">
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div>
                                                                <h5 class="fs-12 text-muted mb-0">
                                                                    Members :</h5>
                                                            </div>
                                                            <div class="avatar-group">
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-7.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid">
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <div
                                                                            class="avatar-title rounded-circle bg-light text-primary">
                                                                            A
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-3 col-sm-6">
                                        <div class="card profile-project-card mb-sm-0 profile-project-danger">
                                            <div class="card-body p-4">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                class="text-dark">Bank
                                                                Management
                                                                System</a></h5>
                                                        <p class="text-muted text-truncate mb-0">Last
                                                            Update : <span class="fw-semibold text-dark">10 month
                                                                Ago</span></p>
                                                    </div>
                                                    <div class="ms-2 flex-shrink-0">
                                                        <div class="badge badge-soft-success fs-10">
                                                            Completed</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex mt-4">
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div>
                                                                <h5 class="fs-12 text-muted mb-0">
                                                                    Members :</h5>
                                                            </div>
                                                            <div class="avatar-group">
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-7.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-6.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-5.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <div
                                                                            class="avatar-title rounded-circle bg-primary">
                                                                            2+
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-3 col-sm-6">
                                        <div class="card profile-project-card profile-project-primary mb-0">
                                            <div class="card-body p-4">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                class="text-dark">PSD to
                                                                HTML
                                                                Convert</a></h5>
                                                        <p class="text-muted text-truncate mb-0">Last
                                                            Update : <span class="fw-semibold text-dark">29 min
                                                                Ago</span></p>
                                                    </div>
                                                    <div class="ms-2 flex-shrink-0">
                                                        <div class="badge badge-soft-info fs-10">New
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex mt-4">
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div>
                                                                <h5 class="fs-12 text-muted mb-0">
                                                                    Members :</h5>
                                                            </div>
                                                            <div class="avatar-group">
                                                                <div class="avatar-group-item shadow">
                                                                    <div class="avatar-xs">
                                                                        <img src="{{ asset('backend/') }}/assets/images/users/avatar-7.jpg"
                                                                            alt=""
                                                                            class="rounded-circle img-fluid" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mt-4">
                                            <ul class="pagination pagination-separated justify-content-center mb-0">
                                                <li class="page-item disabled">
                                                    <a href="javascript:void(0);" class="page-link"><i
                                                            class="mdi mdi-chevron-left"></i></a>
                                                </li>
                                                <li class="page-item active">
                                                    <a href="javascript:void(0);" class="page-link">1</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="javascript:void(0);" class="page-link">2</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="javascript:void(0);" class="page-link">3</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="javascript:void(0);" class="page-link">4</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="javascript:void(0);" class="page-link">5</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="javascript:void(0);" class="page-link"><i
                                                            class="mdi mdi-chevron-right"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--end row-->
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end tab-pane-->
                    <div class="tab-pane fade" id="documents" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <h5 class="card-title flex-grow-1 mb-0">Documents</h5>
                                    <div class="flex-shrink-0">
                                        <input class="form-control d-none" type="file" id="formFile">
                                        <label for="formFile" class="btn btn-danger"><i
                                                class="ri-upload-2-fill me-1 align-bottom"></i> Upload
                                            File</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table-borderless mb-0 table align-middle">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col">File Name</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Size</th>
                                                        <th scope="col">Upload Date</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm">
                                                                    <div
                                                                        class="avatar-title bg-soft-primary text-primary fs-20 rounded shadow">
                                                                        <i class="ri-file-zip-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-3 flex-grow-1">
                                                                    <h6 class="fs-15 mb-0"><a
                                                                            href="javascript:void(0)">Artboard-documents.zip</a>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>Zip File</td>
                                                        <td>4.57 MB</td>
                                                        <td>12 Dec 2021</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-light btn-icon" id="dropdownMenuLink15"
                                                                    data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="ri-equalizer-fill"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                    aria-labelledby="dropdownMenuLink15">
                                                                    <li><a class="dropdown-item"
                                                                            href="javascript:void(0);"><i
                                                                                class="ri-eye-fill me-2 text-muted align-middle"></i>View</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item"
                                                                            href="javascript:void(0);"><i
                                                                                class="ri-download-2-fill me-2 text-muted align-middle"></i>Download</a>
                                                                    </li>
                                                                    <li class="dropdown-divider"></li>
                                                                    <li><a class="dropdown-item"
                                                                            href="javascript:void(0);"><i
                                                                                class="ri-delete-bin-5-line me-2 text-muted align-middle"></i>Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm">
                                                                    <div
                                                                        class="avatar-title bg-soft-danger text-danger fs-20 rounded shadow">
                                                                        <i class="ri-file-pdf-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-3 flex-grow-1">
                                                                    <h6 class="fs-15 mb-0"><a
                                                                            href="javascript:void(0);">Bank
                                                                            Management System</a></h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>PDF File</td>
                                                        <td>8.89 MB</td>
                                                        <td>24 Nov 2021</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-light btn-icon" id="dropdownMenuLink3"
                                                                    data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="ri-equalizer-fill"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                    aria-labelledby="dropdownMenuLink3">
                                                                    <li><a class="dropdown-item"
                                                                            href="javascript:void(0);"><i
                                                                                class="ri-eye-fill me-2 text-muted align-middle"></i>View</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item"
                                                                            href="javascript:void(0);"><i
                                                                                class="ri-download-2-fill me-2 text-muted align-middle"></i>Download</a>
                                                                    </li>
                                                                    <li class="dropdown-divider"></li>
                                                                    <li><a class="dropdown-item"
                                                                            href="javascript:void(0);"><i
                                                                                class="ri-delete-bin-5-line me-2 text-muted align-middle"></i>Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm">
                                                                    <div
                                                                        class="avatar-title bg-soft-secondary text-secondary fs-20 rounded shadow">
                                                                        <i class="ri-video-line"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-3 flex-grow-1">
                                                                    <h6 class="fs-15 mb-0"><a
                                                                            href="javascript:void(0);">Tour-video.mp4</a>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>MP4 File</td>
                                                        <td>14.62 MB</td>
                                                        <td>19 Nov 2021</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-light btn-icon" id="dropdownMenuLink4"
                                                                    data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="ri-equalizer-fill"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                    aria-labelledby="dropdownMenuLink4">
                                                                    <li><a class="dropdown-item"
                                                                            href="javascript:void(0);"><i
                                                                                class="ri-eye-fill me-2 text-muted align-middle"></i>View</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item"
                                                                            href="javascript:void(0);"><i
                                                                                class="ri-download-2-fill me-2 text-muted align-middle"></i>Download</a>
                                                                    </li>
                                                                    <li class="dropdown-divider"></li>
                                                                    <li><a class="dropdown-item"
                                                                            href="javascript:void(0);"><i
                                                                                class="ri-delete-bin-5-line me-2 text-muted align-middle"></i>Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm">
                                                                    <div
                                                                        class="avatar-title bg-soft-success text-success fs-20 rounded shadow">
                                                                        <i class="ri-file-excel-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-3 flex-grow-1">
                                                                    <h6 class="fs-15 mb-0"><a
                                                                            href="javascript:void(0);">Account-statement.xsl</a>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>XSL File</td>
                                                        <td>2.38 KB</td>
                                                        <td>14 Nov 2021</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-light btn-icon" id="dropdownMenuLink5"
                                                                    data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="ri-equalizer-fill"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                    aria-labelledby="dropdownMenuLink5">
                                                                    <li><a class="dropdown-item"
                                                                            href="javascript:void(0);"><i
                                                                                class="ri-eye-fill me-2 text-muted align-middle"></i>View</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item"
                                                                            href="javascript:void(0);"><i
                                                                                class="ri-download-2-fill me-2 text-muted align-middle"></i>Download</a>
                                                                    </li>
                                                                    <li class="dropdown-divider"></li>
                                                                    <li><a class="dropdown-item"
                                                                            href="javascript:void(0);"><i
                                                                                class="ri-delete-bin-5-line me-2 text-muted align-middle"></i>Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm">
                                                                    <div
                                                                        class="avatar-title bg-soft-info text-info fs-20 rounded shadow">
                                                                        <i class="ri-folder-line"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-3 flex-grow-1">
                                                                    <h6 class="fs-15 mb-0"><a
                                                                            href="javascript:void(0);">Project
                                                                            Screenshots Collection</a>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>Floder File</td>
                                                        <td>87.24 MB</td>
                                                        <td>08 Nov 2021</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-light btn-icon" id="dropdownMenuLink6"
                                                                    data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="ri-equalizer-fill"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                    aria-labelledby="dropdownMenuLink6">
                                                                    <li><a class="dropdown-item"
                                                                            href="javascript:void(0);"><i
                                                                                class="ri-eye-fill me-2 align-middle"></i>View</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                            href="javascript:void(0);"><i
                                                                                class="ri-download-2-fill me-2 align-middle"></i>Download</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item"
                                                                            href="javascript:void(0);"><i
                                                                                class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm">
                                                                    <div
                                                                        class="avatar-title bg-soft-danger text-danger fs-20 rounded shadow">
                                                                        <i class="ri-image-2-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-3 flex-grow-1">
                                                                    <h6 class="fs-15 mb-0">
                                                                        <a href="javascript:void(0);">Velzon-logo.png</a>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>PNG File</td>
                                                        <td>879 KB</td>
                                                        <td>02 Nov 2021</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-light btn-icon" id="dropdownMenuLink7"
                                                                    data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="ri-equalizer-fill"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                    aria-labelledby="dropdownMenuLink7">
                                                                    <li><a class="dropdown-item"
                                                                            href="javascript:void(0);"><i
                                                                                class="ri-eye-fill me-2 align-middle"></i>View</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item"
                                                                            href="javascript:void(0);"><i
                                                                                class="ri-download-2-fill me-2 align-middle"></i>Download</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                            href="javascript:void(0);"><i
                                                                                class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="mt-3 text-center">
                                            <a href="javascript:void(0);" class="text-success"><i
                                                    class="mdi mdi-loading mdi-spin fs-20 me-2 align-middle"></i>
                                                Load more </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end tab-pane-->
                </div>
                <!--end tab-content-->
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

@endsection
