@extends('layouts.dashboardLayouts')

@section('content')
    @include('partials.backendHeader')
    @include('partials.backendNav')
    <livewire:edit-faq-component :id="$idFaq" />
@endsection
