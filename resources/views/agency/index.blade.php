@extends('layouts.master')

@section('title') @lang('translation.Dashboards') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') @lang('translation.Dashboards') @endslot
@slot('title') @lang('translation.Dashboards') @endslot
@endcomponent

<div class="row">
    <div class="col-lg-6">
        <div class="card overflow-hidden">
            <div class="bg-primary bg-soft">
                <img src="{{ !empty(Auth::user()->profile) ? ( isset(Auth::user()->profile->cover_image) ? URL::asset('storage/'.Auth::user()->profile->cover_image) : URL::asset('/assets/images/wave.svg')) : URL::asset('/assets/images/wave.svg')}}"
                    class="small-cover" />
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-4" style=" margin-top:-70px">
                            <img src="{{ isset(Auth::user()->avatar) ? asset('storage/'.Auth::user()->avatar) : asset('/assets/images/users/avatar-1.jpg') }}"
                                alt="" class="img-thumbnail rounded-circle mt-n2" style="width:100%; height:150px;">
                        </div>
                        <h5 class="font-size-15 text-truncate mt-n3 ms-2">{{ Str::ucfirst(Auth::user()->name) }}</h5>
                        <p class="text-truncate mb-1">
                            <span class="text-primary">89</span> @lang('translation.Followers')
                        </p>
                        <p class="text-danger mb-1">
                            <span class="text-primary">23</span> @lang('translation.Comments')
                        </p>
                        <p class="text-warning mb-1">
                            <i class="mdi mdi-star fs-6"></i>
                            <i class="mdi mdi-star fs-6"></i>
                            <i class="mdi mdi-star fs-6"></i>
                            <i class="mdi mdi-star fs-6"></i>
                            <i class="bx bx-star fs-6"></i>
                            <p class="text-primary mt-n2">
                                @lang('translation.Average_Ratings')
                            </p>
                        </p>
                    </div>

                    <div class="col-sm-8">
                        <div class="pt-4">
                            <div class="mt-4">
                                <p class="text-truncate mb-1">
                                    <span class="fw-bold">@lang('translation.Address'):</span>
                                    {{ !empty(Auth::user()->profile) ? Auth::user()->profile->address : 'No Address Found' }}
                                </p>
                                <p class="text-truncate">
                                    <span class="fw-bold">@lang('translation.Contact'):</span>
                                    {{ !empty(Auth::user()->profile) ? Auth::user()->profile->phone_number : 'No Phone Number Found' }}
                                </p>
                                <p class="text-truncate">
                                    <p class="fw-bold mb-2">@lang('translation.Description'):</p>
                                    {{ !empty(Auth::user()->profile) ? substr(Auth::user()->profile->description, 0, 300) : 'No Description Found' }}
                                </p>
                                <a href="{{ route('profile.show', ['id'=> Auth::user()->id]) }}"
                                    class="btn btn-primary waves-effect waves-light btn-sm">@lang('translation.View_Profile')<i
                                        class="mdi mdi-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="row">
            <p class="text-truncate fs-4">
                @lang('translation.Followers')
            </p>
            <div class="col-md-6">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">@lang('translation.This_Week')</p>
                                <h4 class="mb-0">135</h4>
                            </div>
                            <div class="flex-shrink-0 align-self-center">
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                    <span class="avatar-title">
                                        <i class="bx bx-copy-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">@lang('translation.This_Month')</p>
                                <h4 class="mb-0">135</h4>
                            </div>
                            <div class="flex-shrink-0 align-self-center">
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                    <span class="avatar-title">
                                        <i class="bx bx-copy-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <p class="text-truncate fs-4">
                @lang('translation.Visit')
            </p>
            <div class="col-md-6">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">@lang('translation.This_Week')</p>
                                <h4 class="mb-0">135</h4>
                            </div>
                            <div class="flex-shrink-0 align-self-center">
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                    <span class="avatar-title">
                                        <i class="bx bx-copy-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">@lang('translation.This_Month')</p>
                                <h4 class="mb-0">135</h4>
                            </div>
                            <div class="flex-shrink-0 align-self-center">
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                    <span class="avatar-title">
                                        <i class="bx bx-copy-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <hr>
    <h4 class="mb-sm-3 font-size-18">@lang('translation.Agents')</h4>
    @if (Auth::user()->hasRole('admin'))
    @livewire('agency.agents', ['user' => null])
    @else
    @livewire('agency.agents', ['user' => Auth::user()])
    @endif

</div>
@endsection
@section('script')
@endsection
