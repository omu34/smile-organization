@extends('components.layouts.about-layout')

@section('content')
    <livewire:slider-show slug="about-page-slider" />
    <div class="mx-auto ">
        <livewire:dynamic-navbar />
        <livewire:about-us />
        <livewire:featured-articles-section />
        <livewire:why-us-section />
        <livewire:visit-us-section />
    </div>
    <livewire:footer-section />
@endsection
