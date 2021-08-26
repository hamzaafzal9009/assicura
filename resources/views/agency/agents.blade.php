@extends('layouts.master')

@section('title') @lang('translation.Agents') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') @lang('translation.Dashboards') @endslot
@slot('title') @lang('translation.Agents') @endslot
@endcomponent

<div class="row">
    @if (Auth::user()->hasRole('admin'))
    @livewire('agency.agents', ['user' => null])
    @else
    @livewire('agency.agents', ['user' => Auth::user()])
    @endif
</div>
@endsection
@section('script')
@endsection