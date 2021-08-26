@extends('layouts.site.master')

@section('title') @lang('translation.Dashboards') @endsection

@section('css')
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-7 px-4">
            <h3 class="fw-light py-3">Agencies in {{ $data['search_location'] }}</h3>
            <hr>
            @if (!empty($data['agencies']))
            @foreach ($data['agencies'] as $agency)
                <div class="row mb-3">
                    <div class="col-md-4">
                        <img src="{{ isset($agency->avatar) ? asset('storage/'.$agency->avatar) : asset('/assets/images/logo.png') }}"
                        class="img-thumbnail img-card img-agencies" />
                    </div>
                    <div class="col-md-6">
                        <p class="text-md-start text-center mb-0 mt-md-0 mt-3">{{ !empty($agency->profile) ? $agency->profile->address : '' }}</p>
                        <p class="fs-4 fw-light text-md-start text-center text-capitalize">{{ $agency->name }}</p>
                        <div class="row">
                            <div class="col-md-12 col-6">

                                {{-- <p class="fw-light text-capitalize  mb-1">
                                    <strong>@lang('translation.Contact'):</strong> {{ !empty($agency->profile) ? $agency->profile->phone_number : 'No Data Found' }}
                                </p> --}}
                                <p class="fw-light text-capitalize text-danger  mb-1">
                                    {{ rand(3,30) }} @lang('translation.Comments')
                                </p>
                            </div>
                            <div class="col-md-12 col-6">
                                <p class="fw-light text-capitalize mt-n2 mb-1">
                                    <p class="text-warning mb-n1">
                                        <i class="mdi mdi-star fs-4"></i>
                                        <i class="mdi mdi-star fs-4"></i>
                                        <i class="mdi mdi-star fs-4"></i>
                                        <i class="mdi mdi-star fs-4"></i>
                                        <i class="bx bx-star fs-4"></i>
                                    </p>
                                    <p class="">@lang('translation.Average_Ratings')</p>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 ">
                        <p class="fw-light text-center fs-3 text-capitalize text-danger ">
                            {{ $agency->distance }} KM
                        </p>
                        <div class="mt-md-5 d-flex justify-content-center">
                            <a href="{{ route('agencydetails', ['id'=>$agency->id]) }}" class="btn btn-primary btn-sm">
                               <p class="d-inline fs-5">@lang('translation.Visit')</p> 
                               
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
            @endif
        </div> 
        <div class="col-md-5 position-relative mt-4 heihgt-100">
            <div id="bgMap" class=""></div>
        </div>
    </div>
</div>

@endsection
@section('style')
<style>
  
    #bgMap {
        min-height: 100vh;
        width: 40%;
        position: fixed !important;
    }

    .img-thumbnail.img-card.img-agencies{
        width: 100%;
        height: 200px;
        object-fit: cover;
        border: 1px solid #cecece;
        border-radius: 20px
    }

</style>
@endsection

@section('scripts')
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMa4UoywiD3Bb-C3Gu7v90QbEQOc28qmo&libraries=places&callback=initMap"
    async defer></script>
<script>
    function initMap() {
        let coordinates = {lat: {{ $data['search_lat'] }}, lng:{{ $data['search_lng'] }}}
        let map = new window.google.maps.Map(
            document.querySelector("#bgMap"),
            {
            zoom: 11,
            center: coordinates,
            scrolwheel: false
            }
        );
        var marker = new google.maps.Marker({
            position: new window.google.maps.LatLng({{ $data['search_lat'] }}, {{ $data['search_lng'] }}),
            map: map,
            icon: {
                url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png",
                labelOrigin: new google.maps.Point(75, 32),
                size: new google.maps.Size(32,32),
                anchor: new google.maps.Point(16,32)
            },
        });
        let positions = [
            @foreach ($data['agencies'] as $agency)
                {lat: {{ $agency->lat }}, lng:{{ $agency->lng }}, title: "{{ $agency->name }}"},
            @endforeach
        ];

        positions.forEach((position) => {
            var agencyMarkers = new google.maps.Marker({
                position: new google.maps.LatLng(position.lat, position.lng),
                map: map,
                icon: {
                    url: "{{ URL::asset('/assets/images/agencies.png') }}",
                    labelOrigin: new google.maps.Point(75, 32),
                    size: new google.maps.Size(32,32),
                    scaledSize: new google.maps.Size(30, 30),
                    anchor: new google.maps.Point(16,32)
                },
            });
            google.maps.event.addListener(agencyMarkers,'click',function() {
                map.setZoom(14);
                map.setCenter(agencyMarkers.getPosition());
            });
        });
    }
    
</script>
@endsection