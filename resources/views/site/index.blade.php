@extends('layouts.site.master')

@section('title') @lang('translation.HomePage') @endsection

@section('css')
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="container-fluid autosearch-div">
    
    <div class="row">
        <h3 class="fs-1 position-absolute fw-light z-index-1 text-center">
            @lang('translation.Home_Title')
        </h3>
        <div class="col-md-8 height-100 pt-5">
            <div class="container px-md-5 mt-5">
                <div class="card card-shadow mx-md-5 pt-5">
                    <div class="card-body">
                        <form method="get" action="{{ route('search') }}">
                            <div class="mb-2">
                            <input type="text" name="location" required placeholder="@lang('translation.Type_to_search')"
                                class="form-control autosearch-field" id="location" />
                                <input type="hidden" id="lat" name="lat" />
                                <input type="hidden" id="lng" name="lng" />
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <select class="form-control select2" name="company" multiple data-placeholder="@lang('translation.Insurance_company')">
                                        <option disabled>Select</option>
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select class="form-control select2 " name="branch" multiple data-placeholder="@lang('translation.Insurance_Brunch')">
                                        <option disabled>Select</option>
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select class="form-control select2 " name="rating" multiple data-placeholder="@lang('translation.Rating')">
                                        <option disabled>Select</option>
                                        <option value="1">1 Star</option>
                                        <option value="2">2 Star</option>
                                        <option value="3">3 Star</option>
                                        <option value="4">4 Star</option>
                                        <option value="5">5 Star</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn d-block m-auto btn-primary col-4">@lang('translation.Search')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 d-none d-md-block height-100 pt-5 bg-img"></div>
    </div>
</div>


@endsection
@section('style')
    <style>
        .layout-wrapper {
            min-height: 780px;
            background-image: url("{{ URL::asset('/assets/images/wave.svg') }}");
        }

        #bgMap {
            height: 100%;
            width: 100%;
            display: block;
            margin: auto;
            z-index: 1;

        }
        .pac-container.pac-logo.hdpi{
            z-index: 99999;
        }

        .select2{
            border: none !important;
        }

        .w-100 {
            width: 100%
        }

        .autosearch-field {
            border-radius: 0;
            height: 50px;
            border: none;
            background-color: #f1f1f1;
            transition: .5s;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px

        }

        .card.card-shadow{
            border-radius: 15px;
            padding: 20px 0
        }
        .card-shadow{

            box-shadow: -2px 0px 40px -1px rgba(0, 0, 0, 0.65);
            -webkit-box-shadow: -2px 0px 40px -1px rgba(0, 0, 0, 0.65);
            -moz-box-shadow: -2px 0px 40px -1px rgba(0, 0, 0, 0.65);

        }

        .bg-img{
            background-image: url("{{ asset('assets/images/bg.jpg') }}");
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .bg-light {
            background-color: #fff !important;

            box-shadow: 0px 28px 39px -1px rgba(0, 0, 0, 0.64);
            -webkit-box-shadow: 0px 28px 39px -1px rgba(0, 0, 0, 0.64);
            -moz-box-shadow: 0px 28px 39px -1px rgba(0, 0, 0, 0.64);
        }

        .col-md-7.bg-light {
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px
        }

        .autosearch-btn {
            position: absolute;
            top: 0;
            right: 20px;
            border-radius: 7px;
            margin-top: 6px
        }
        .z-index-1{
            z-index: 1;
        }
        h3.fs-1.z-index-1{
            top: 100px
        }
    </style>
@endsection

@section('scripts')
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMa4UoywiD3Bb-C3Gu7v90QbEQOc28qmo&libraries=places&callback=initMap"
    async defer></script>
<script>
    function initMap() {
        
        var input = document.getElementById('location');

        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            document.getElementById('location').value = place.formatted_address;
            document.getElementById('lat').value = place.geometry.location.lat();
            document.getElementById('lng').value = place.geometry.location.lng();
            console.log(`Lat => ${place.geometry.location.lat()} Lng => ${place.geometry.location.lng()}`);

        });
    }

</script>
@endsection