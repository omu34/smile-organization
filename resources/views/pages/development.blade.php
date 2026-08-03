@extends('components.layouts.pages-layout')

@section('content')
    <livewire:slider-show slug="development-page-slider" />
    <div class="mx-auto ">
        <livewire:dynamic-navbar />
        <livewire:featured-articles-section />
        <livewire:why-us-section />
    </div>
    <livewire:footer-section />
@endsection