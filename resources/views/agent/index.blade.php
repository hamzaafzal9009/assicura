@extends('layouts.master')

@section('title') @lang('translation.Dashboards') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Dashboard @endslot
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
                        <div class="row mt-4 ms-1">
                            <div class="form-check form-switch form-switch-md mb-3">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Online</label>
                            </div>
                        </div>
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


@endsection
@section('script')
@endsection
