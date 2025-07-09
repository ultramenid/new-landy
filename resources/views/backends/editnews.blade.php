@extends('layouts.dashboardLayouts')

@section('content')
    @include('partials.backendHeader')
    @include('partials.backendNav')
    <livewire:edit-news-component :id="$idNews" />
@endsection
