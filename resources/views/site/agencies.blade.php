@extends('layouts.site.master')

@section('title') @lang('translation.Agencies') @endsection

@section('css')
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="container-fluid autosearch-div">

    <div class="row">
        <div class="col-md-7  height-100 ">
            <div class="container mt-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <img src="{{ !empty($agency->profile) ? ( isset($agency->profile->cover_image) ? URL::asset('storage/'.$agency->profile->cover_image) : URL::asset('/assets/images/wave.svg')) : URL::asset('/assets/images/wave.svg')}}"
                            class="small-cover" />
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-4 d-flex flex-column justify-content-center">
                                
                                <div class="mb-4" style=" margin-top:-70px">
                                    <img src="{{ isset($agency->avatar) ? asset('storage/'.$agency->avatar) : asset('/assets/images/logo.png') }}"
                                        alt="" class="img-thumbnail rounded-circle mt-n2" style="width:100%; height:200px;">
                                </div>
                                <h5 class="font-size-15 text-truncate mt-n3 ms-2">{{ Str::ucfirst($agency->name) }}</h5>
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
                                            {{ !empty($agency->profile) ? ($agency->profile->address != null ? $agency->profile->address : 'No Data Available') : 'No Data Available' }}
                                        </p>
                                        {{-- <p class="text-truncate">
                                            <span class="fw-bold">@lang('translation.Contact'):</span> +12323123111
                                        </p> --}}
                                        <p class="text-truncate">
                                            <p class="fw-bold mb-2">@lang('translation.Description'):</p>
                                            {{substr('Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                            Duis vel convallis erat. Maecenas est magna, semper at eros vel, tincidunt 
                                            vestibulum erat. Mauris a nisi purus. Etiam quis urna pellentesque, euismod 
                                            purus ut, porttitor lacus. In fringilla massa ac vestibulum congue. 
                                            Vestibulum non nisi lacinia, interdum arcu vitae, lobortis eros. Sed mi 
                                            dolor, ultrices quis maximus et, vestibulum et nulla. Sed tempor, purus at 
                                            elementum posuere, est dui lacinia arcu, vitae volutpat ante tellus in diam. 
                                            Sed scelerisque, ipsum sed condimentum pellentesque, nunc arcu facilisis sem, 
                                            nec euismod ex leo non est. Nulla sodales arcu id tortor lobortis, eu tempor 
                                            velit hendrerit. Mauris aliquet velit nisi, nec ultricies dolor dictum nec. 
                                            Vivamus varius dolor et rutrum ultricies. Curabitur lacinia justo id finibus 
                                            tincidunt. Suspendisse iaculis congue ullamcorper. Vestibulum nisi diam, 
                                            hendrerit non placerat et, scelerisque eu ex.', 0, 300)}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 mt-md-5">
            @if (sizeof($agency->agents) > 0)
            @foreach ($agency->agents as $agent)
            @if(!empty($agent->profile))
            <div class="card card-shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ isset($agent->avatar) ? URL::asset('storage/'.$agent->avatar) : URL::asset('/assets/images/logo.png') }}"
                                alt="..." class="img-thumbnail agent-img rounded-pill" />
                        </div>
                        <div class="col-8">
                            <p class="fs-5 mx-2 mt-3 text-capitalize">{{ $agent->name }}</p>
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
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('agentdetails', ['id'=> $agent->id]) }}" class="btn btn-danger btn-sm align-self-center">@lang('translation.Contect')</a>
                                <span class="text-warning">
                                    <i class="mdi mdi-star fs-6"></i>
                                    <i class="mdi mdi-star fs-6"></i>
                                    <i class="mdi mdi-star fs-6"></i>
                                    <i class="mdi mdi-star fs-6"></i>
                                    <i class="bx bx-star fs-6"></i>

                                    <p class="text-danger mb-1">
                                        <span class="text-primary">{{ rand(1,10) }}</span> @lang('translation.Comments')
                                    </p>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @else
            <div class="card card-shadow">
                <div class="card-body">
                    <h4 class="fw-light">
                        No Agent Found
                    </h4>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>


@endsection
@section('style')
<style>
    .border-end {
        border-right: 1px solid #7a7a7a !important;
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

</style>
@endsection

@section('scripts')
@endsection
