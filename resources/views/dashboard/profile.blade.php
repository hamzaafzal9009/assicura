@extends('layouts.master')

@section('title')@lang('translation.Profile') @lang('translation.Dashboards') @endsection
@section('css')
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

@component('components.breadcrumb')
@slot('li_1') @lang('translation.Dashboards') @endslot
@slot('title') @lang('translation.Profile') @endslot
@endcomponent


<div class="container-fluid">
    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <p class="mb-2">{{ $error }}</li>
            @endforeach
    </div>
    @endif
    @if (Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
    @endif
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif

    <form method="POST" class="mt-3" action="{{ route('profile.update', ['id' => $user->id]) }}"
        enctype='multipart/form-data'>
        @csrf
        @method("put")
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 mb-3">
                <label for="">@lang('translation.Name')</label>
                <div class="input-group">
                    <input class="form-control border-end-0 border text-capitalize" name="name"
                        placeholder="@lang('translation.Name')" value="{{ old('name') ? old('name') : $user->name }}"
                        type="text" id="name">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="">@lang('translation.Email')</label>
                <div class="input-group">
                    <input class="form-control border-end-0 border" name="email"
                        placeholder="@lang('translation.Email')"
                        value="{{ old('email') ? old('email') : $user->email }}" type="text" id="email" disabled>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="">@lang('translation.DOB')</label>
                <div class="input-group">
                    <input class="form-control border-end-0 border" name="dob" placeholder="@lang('translation.DOB')"
                        value="{{ old('dob') ? old('dob') : $user->dob }}" type="date" id="dob">
                    @error('dob')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="">@lang('translation.Phone')</label>
                <div class="input-group">
                    <input class="form-control border-end-0 border" name="phone"
                        placeholder="@lang('translation.Phone')"
                        value="{{ old('phone') ? old('phone') : (!empty($user->profile) ? $user->profile->phone_number : '') }}"
                        type="text" id="phone">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-8 mb-3">
                <label for="">@lang('translation.Address')</label>
                <div class="input-group">
                    <input class="form-control border-end-0 border" name="address"
                        placeholder="@lang('translation.Address')"
                        value="{{ old('address') ? old('address') : (!empty($user->profile) ? $user->profile->address : '') }}"
                        type="text" id="location">
                    <input type="hidden" name="lat" id="lat" />
                    <input type="hidden" name="lng" id="lng" />
                    @error('location')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">@lang('translation.Description')</label>
                <div class="input-group">
                    <textarea name="description" id="description" class="form-control" rows="7"
                        placeholder="@lang('translation.Description')">{{ old('description') ? old('description') : (!empty($user->profile) ? $user->profile->description : '') }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="">@lang('translation.Avatar')</label>
                <div class="row">
                    <img id="profileImage"
                        src="{{ $user->avatar != null ? URL::asset('storage/'.$user->avatar) : URL::asset('/assets/images/logo.png') }}"
                        class="img-thumbnail profile-image" />
                    <input type="file" name="profile_image" id="profile_image_field">
                </div>
            </div>

            <div class="col-md-3 mb-3">
                @if($user->hasRole('agency'))
                <label for="">@lang('translation.Cover_Photo')</label>
                <div class="row">
                    <img id="coverImage"
                        src="{{ !empty($user->profile) ? ($user->profile->cover_image != null ? URL::asset('storage/'.$user->profile->cover_image) : URL::asset('/assets/images/logo.png')) : URL::asset('/assets/images/logo.png') }}"
                        class="img-thumbnail profile-image" />
                    <input type="file" name="cover_image" id="cover_image_field">
                </div>
                @endif
                @if ($user->hasRole('agent'))
                <label>@lang('translation.Specialities')</label>
                @if(!empty($user->profile))
                @php
                $specialities = explode(',', $user->profile->speciality);
                @endphp
                <div class="row">
                    <select class="form-control select2" name="specialities[]" multiple
                        data-placeholder="@lang('translation.Select_Speciality')">
                        <option {{ in_array("cars", $specialities) ? 'selected' : '' }} value="cars">Cars</option>
                        <option {{ in_array("life", $specialities) ? 'selected' : '' }} value="life">Life</option>
                        <option {{ in_array("health", $specialities) ? 'selected' : '' }} value="health">Health</option>
                        <option {{ in_array("company", $specialities) ? 'selected' : '' }} value="company">Company</option>
                    </select>
                </div>
                @else
                <div class="row">
                    <select class="form-control select2" name="specialities[]" multiple
                        data-placeholder="@lang('translation.Select_Speciality')">
                        <option value="cars">Cars</option>
                        <option value="life">Life</option>
                        <option value="health">Health</option>
                        <option value="company">Company</option>
                    </select>
                </div>
                @endif
                @endif
            </div>
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-md-2 mb-3">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn  btn-primary">@lang('translation.Update')</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- <div class="d-none" id="map"></div> --}}
</div>
@endsection

@section('css')
<style>
    .img-thumbnail.profile-image {
        width: 100%;
        height: 125px;
        object-fit: cover;
    }

</style>
@endsection
@section('scripts')

<script>
    function readProfileURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profileImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readCoverURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#coverImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile_image_field").change(function () {
        readProfileURL(this);
    });
    $("#cover_image_field").change(function () {
        readCoverURL(this);
    });

</script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMa4UoywiD3Bb-C3Gu7v90QbEQOc28qmo&libraries=places&callback=initMap"
    async defer></script>
<script>
    function initMap() {
        var input = document.getElementById('location');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('location').value = place.formatted_address;
            document.getElementById('lat').value = place.geometry.location.lat();
            document.getElementById('lng').value = place.geometry.location.lng();

        });
    }

</script>
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>
@endsection
