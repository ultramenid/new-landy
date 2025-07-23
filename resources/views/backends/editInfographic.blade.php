@extends('layouts.dashboardLayouts')

@section('content')
    @include('partials.backendHeader')
    @include('partials.backendNav')
    <livewire:edit-infographic-component :id="$idInfographic" />
@endsection
