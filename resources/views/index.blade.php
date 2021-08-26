@extends('layouts.master')

@section('title') @lang('translation.Dashboards') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Dashboards @endslot
        @slot('title') Dashboard @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-4">
            <div class="card overflow-hidden">
                <div class="bg-primary bg-soft">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">@lang('translation.Welcome_Back') !</h5>
                                <p>Assicura @lang('translation.Dashboards')</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="avatar-md profile-user-wid mb-4">
                                <img src="{{ isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('/assets/images/logo.png') }}"
                                    alt="" class="img-thumbnail rounded-circle">
                            </div>
                            <h5 class="font-size-15 text-truncate mt-n3 ms-2">{{ Str::ucfirst(Auth::user()->name) }}</h5>
                            {{-- <p class="text-muted mb-0 text-truncate">UI/UX Designer</p> --}}
                        </div>

                        <div class="col-sm-8">
                            <div class="pt-4">
                                <div class="mt-4">
                                    <a href=""
                                        class="btn btn-primary waves-effect waves-light btn-sm">@lang('translation.View_Profile')<i
                                            class="mdi mdi-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            {{-- <div class="row">
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted fw-medium">Orders</p>
                                    <h4 class="mb-0">1,235</h4>
                                </div>

                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                    <span class="avatar-title">
                                        <i class="bx bx-copy-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted fw-medium">Revenue</p>
                                    <h4 class="mb-0">$35, 723</h4>
                                </div>

                                <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bx-archive-in font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted fw-medium">Average Price</p>
                                    <h4 class="mb-0">$16.2</h4>
                                </div>

                                <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">@lang('translation.Activity')</h4>
                    <ul class="verti-timeline list-unstyled">
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle font-size-18"></i>
                            </div>
                            <div class="">
                                <div class="me-3">
                                    <img src="{{ asset('/assets/images/clients/1.png') }}" alt="..."
                                        class="img-thumbnail mt-n3" />
                                </div>
                                <div class="media-body">
                                    <div>
                                        Responded to need “Volunteer Activities
                                    </div>
                                    <a href="#" class="btn btn-success btn-sm mt-3">@lang('translation.Read_More')</a>
                                </div>
                            </div>
                        </li>
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle font-size-18"></i>
                            </div>
                            <div class="">
                                <div class="me-3">
                                    <img src="{{ asset('/assets/images/clients/2.png') }}" alt="..."
                                        class=" img-thumbnail mt-n3" />
                                </div>
                                <div class="media-body">
                                    <div>
                                        Everyone realizes why a new common language would be desirable...
                                    </div>
                                    <a href="#" class="btn btn-success btn-sm mt-3">@lang('translation.Read_More')</a>
                                </div>
                            </div>
                        </li>
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle font-size-18"></i>
                            </div>
                            <div class="">
                                <div class="me-3"><img src="{{ asset('/assets/images/clients/3.png') }}"
                                        class=" img-thumbnailmt-n3" />
                                </div>
                                <div class="media-body">
                                    <div>
                                        Joined the group “Boardsmanship Forum”
                                    </div>
                                    <a href="#" class="btn btn-success btn-sm mt-3">@lang('translation.Read_More')</a>
                                </div>
                            </div>
                        </li>
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle font-size-18"></i>
                            </div>
                            <div class="">
                                <div class="me-3">
                                    <img src="{{ asset('/assets/images/clients/1.png') }}" class="img-thumbnail mt-n3" />
                                </div>
                                <div class="media-body">
                                    <div>
                                        Responded to need “In-Kind Opportunity”
                                    </div>
                                    <a href="#" class="btn btn-success btn-sm mt-3">@lang('translation.Read_More')</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="text-center mt-4">
                        <a href="" class="btn btn-primary waves-effect waves-light btn-sm">
                            @lang('translation.View_More')
                            <i class="mdi mdi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
@endsection
