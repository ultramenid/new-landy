@extends('layouts.dashboardLayouts')

@section('content')
    @include('partials.backendHeader')
    @include('partials.backendNav')
    <livewire:edit-mural-component :id="$idMural" />
@endsection
