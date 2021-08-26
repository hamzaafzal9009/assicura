@extends('layouts.site.master')

@section('title') @lang('translation.Agents') @endsection

@section('css')
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="container-fluid autosearch-div">

    <div class="row">
        <div class="col-md-6  height-100 ">
            <div class="container mt-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <img src="{{ !empty($agent->agency->profile) ? ( isset($agent->agency->profile->cover_image) ? URL::asset('storage/'.$agent->agency->profile->cover_image) : URL::asset('/assets/images/wave.svg')) : URL::asset('/assets/images/wave.svg')}}"
                            class="small-cover" />
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-4" style=" margin-top:-70px">
                                    <img src="{{ isset($agent->agency->avatar) ? asset('storage/'.$agent->agency->avatar) : asset('/assets/images/logo.png') }}"
                                        alt="" class="img-thumbnail rounded-circle mt-n2"
                                        style="width:100%; height:200px;">
                                </div>
                                <h5 class="font-size-15 text-truncate mt-n3 ms-2">
                                    {{ Str::ucfirst($agent->agency->name) }}</h5>
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
                                <a class="btn btn-primary btn-sm">Follow</a>
                            </div>

                            <div class="col-sm-8">
                                <div class="pt-4">
                                    <div class="mt-4">
                                        <p class="text-truncate mb-1">
                                            <span class="fw-bold">@lang('translation.Address'):</span>
                                            {{ !empty($agent->agency->profile) ? ($agent->agency->profile->address != null ? $agent->agency->profile->address : 'No Data Available') : 'No Data Available' }}
                                        </p>
                                        {{-- <p class="text-truncate">
                                            <span class="fw-bold">@lang('translation.Contact'):</span> +12323123111
                                        </p> --}}
                                        <p class="text-truncate">
                                            <p class="fw-bold mb-2">@lang('translation.Description'):</p>
                                            {{substr( (!empty($agent->agency->profile) ? $agent->agency->profile->description : ''), 0, 300)}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 height-100 ">
            <div class="container mt-md-5">
                <div class="card card-shadow">
                    <div class="card-body">
                        <div class="row border-bottom pb-4 d-flex justify-content-center">
                            <div class="col-md-3">
                                <img src="{{ isset($agent->avatar) ? asset('storage/'.$agent->avatar) : asset('/assets/images/logo.png') }}"
                                    alt="" class="profile-image">
                            </div>
                            <div class="col-md-2 align-self-center">
                                <p class="fs-4 fw-light mb-0">{{ $agent->name }}</p>
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
                        </div>
                        <div class="row border-bottom ">
                            <p class="text-truncate">
                                <p class="fw-bold mb-2">@lang('translation.Description'):</p>
                                <p class="fw-light mb-2">
                                    {{substr( (!empty($agent->profile) ? $agent->profile->description : ''), 0, 300)}}
                                </p>
                            </p>
                        </div>
                        <div class="row text-truncate mt-3">
                            <p class="fw-bold">@lang('translation.Specialities'):</p>
                            @php
                            $specialities = isset($agent->profile->speciality) ? explode(',',
                            $agent->profile->speciality) : null;
                            @endphp
                            <ul class="list-group list-group-flush">
                                @if($specialities != null)
                                @foreach ($specialities as $speciality)
                                <li class="list-group-item border-0 mt-n3 text-uppercase">{{ $speciality }}</li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="row text-truncate">
                            <p class="fs-5">@lang('translation.Talk') {{ $agent->name }} or <a href=""
                                    class="text-underline text-truncate">@lang('translation.Ask_Quotation')</a></p>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="position-relative">
                                    <input type="text" class="form-control chat-input"
                                        placeholder="@lang('translation.Enter_Message')">
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit"
                                    class="btn btn-primary btn-rounded chat-send w-md waves-effect waves-light"><span
                                        class="d-none d-sm-inline-block me-2">@lang('translation.Send')</span> <i
                                        class="mdi mdi-send"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('style')
<style>
    .border-bottom {
        border-bottom: 1px solid #b8b8b8 !important;
    }

    .card-shadow {
        box-shadow: -2px 0px 40px -1px rgba(0, 0, 0, 0.65);
        -webkit-box-shadow: -2px 0px 40px -1px rgba(0, 0, 0, 0.65);
        -moz-box-shadow: -2px 0px 40px -1px rgba(0, 0, 0, 0.65);
    }

    .agent-img {
        width: 100%;
        height: 150px;
        object-fit: cover;
    }

    .profile-image {
        width: 100%;
        height: 140px;
        border-radius: 50%
    }

    @media screen and (max-width: 991px) {
        .profile-image {
            border-radius: 5px
        }
    }

</style>
@endsection

@section('scripts')
@endsection
